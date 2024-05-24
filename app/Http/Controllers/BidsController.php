<?php
namespace App\Http\Controllers;

use App\Models\Bids;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BidsController extends Controller
{
    public function index(): View
    {
        return view("bid-job");
    }

    public function BidJob(Request $request): RedirectResponse
    {
        // Validate form
        $request->validate([
            'bidPitchFile' => 'mimes:jpeg,jpg,png,pdf,doc,docx|max:250000',
            'bidPitch' => 'nullable',
            'paymentType' => 'required',
            '25perPayment' => 'nullable',
            '50perPayment' => 'nullable',
            '75perPayment' => 'nullable',
            '100perPayment' => 'nullable',
            'minimumPayment' => 'nullable',
            'maximumPayment' => 'nullable',
            'hourlyPayment' => 'nullable'
        ]);
    
        // Retrieve projectId and userId
        $projectId = $request->input('projectId');
        $userId = $request->session()->get('userId');
    
        // Upload image
        $pitchFileName = null;
        if ($request->hasFile('bidPitchFile')) {
            $pitchFile = $request->file('bidPitchFile');
            $pitchFile->storeAs('public/projects/' . $projectId . '/', $pitchFile->hashName());
            $pitchFileName = $pitchFile->hashName();
        }
    
        // Create the bid
        $bid = Bids::create([
            'projectId' => $projectId,
            'userId' => $userId,
            'projectFile' => $pitchFileName,
            'projectName' => $request->input('projectName'),
            'projectDescription' => $request->input('projectDescription'),
            'paymentType' => $request->input('paymentType'),
            'per25Payment' => $request->input('per25Payment'),
            'per50Payment' => $request->input('per50Payment'),
            'per75Payment' => $request->input('per75Payment'),
            'per100Payment' => $request->input('per100Payment'),
            'minimumPayment' => $request->input('minimumPayment'),
            'maximumPayment' => $request->input('maximumPayment'),
            'hourlyPayment' => $request->input('hourlyPayment'),
            'bidPitch' => $request->input('bidPitch'),
            'bidStatus' => 'pending'
        ]);
    
        if ($bid) {
            // Redirect to index with success message
            return redirect()->route('job.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to save data.']);
        }
    }    
}
