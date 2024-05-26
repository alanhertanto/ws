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
            'rates' => 'required'
            
        ]);

        // Retrieve projectId and userId
        $projectId = $request->input('projectId');

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
            'userId' => $request->input('userId'),
            'bidPitch' => $request->input('bidPitch'),
            'bidPitchFile' => $pitchFileName,
            'rates' => $request->input('rates'),
            'bidStatus' => 'Submitted',
        ]);

        if ($bid) {
            // Redirect to index with success message
            return redirect()->route('find-job')->with(['success' => 'Bids Disimpan!']);
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal Dalma Melakukan Proses Bidding!']);
        }
    }
}
