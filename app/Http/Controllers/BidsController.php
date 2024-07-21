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
        // Validation rules
        $rules = [
            'bidPitchFile' => 'mimes:jpeg,jpg,png,pdf,doc,docx|max:250000',
            'bidPitch' => 'nullable'
        ];

        // Dynamically add 'rates' validation for any input containing 'rates' in its name
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'rates') !== false) {
                $rules[$key] = 'required';
            }
        }

        // Validate form
        $request->validate($rules);

        // Retrieve projectId and userId
        $projectId = $request->input('projectId');

        // Upload image
        $pitchFileName = null;
        if ($request->hasFile('bidPitchFile')) {
            $pitchFile = $request->file('bidPitchFile');
            $pitchFile->storeAs('public/projects/' . $projectId . '/', $pitchFile->hashName());
            $pitchFileName = $pitchFile->hashName();
        }

        // Prepare bid data
        $bidData = [
            'projectId' => $projectId,
            'userId' => $request->input('userId'),
            'bidPitch' => $request->input('bidPitch'),
            'bidPitchFile' => $pitchFileName,
            'bidStatus' => 'Submitted',
        ];

        // Add all 'rates' fields to bid data
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'rates') !== false) {
                $bidData['rates'] = $value;
            }
        }

        // Create the bid
        $bid = Bids::create($bidData);

        if ($bid) {
            // Redirect to index with success message
            return redirect('find-job')->with(['success' => 'Berhasil Bidding!']);
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal Dalam Melakukan Proses Bidding!']);
        }
    }
}
