<?php
namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\Bids;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PekerjaanController extends Controller
{
    public function index(): View
    {
        return view("post-job");
    }

    public function show(): View
    {
        return view("post-job");
    }

    public function FindJob()
    {
        $userId = auth()->id();
        $jobs = Pekerjaan::latest()->where('status', 'Open')->paginate(10);
        $interviewCounts = [];
        $submittedCounts = [];
        $hasBids = [];
        $i=0;
        // Loop through each job to get the count of interviews
        foreach ($jobs as $job) {
            $interviewCounts[$job->id] = Bids::where("projectId", $job->id)->where("bidStatus", "Interview")->count();
            $submittedCounts[$job->id] = Bids::where("projectId", $job->id)->where("bidStatus", "Submitted")->count();
            $hasBid[$job->id] = Bids::where('userId', $userId)->where('projectId', $job->id)->exists();
            $i++;
        }
        return view("find-job", compact("jobs","interviewCounts","submittedCounts","hasBid"));
    }

    public function PostJob(Request $request): RedirectResponse
    {
        // Validate form
        $request->validate([
            'projectFile' => 'mimes:jpeg,jpg,png,pdf,doc,docx|max:250000',
            'projectName' => 'required|min:5',
            'projectDescription' => 'required|min:10',
            'paymentType' => 'required',
            '25perPayment' => 'nullable',
            '50perPayment' => 'nullable',
            '75perPayment' => 'nullable',
            '100perPayment' => 'nullable',
            'minimumPayment' => 'nullable',
            'maximumPayment' => 'nullable',
            'hourlyPayment' => 'nullable',
            'clientId' => 'required'
        ]);

        // Upload image
        $projectName = $request->projectName;
        $projectName = preg_replace('/[^\p{L}\p{N}\s]/u', '', $projectName);
        $projectFileName = null;
        if ($request->hasFile('projectFile')) {
            $projectFile = $request->file('projectFile');
            $projectFile->storeAs('public/projects/' . $projectName . '/', $projectFile->hashName());
            $projectFileName = $projectFile->hashName();
        }

        // Build the query
        $query = Pekerjaan::create([
            'projectFile' => $projectFileName,
            'projectName' => $request->projectName,
            'projectDescription' => $request->projectDescription,
            'paymentType' => $request->paymentType,
            'per25Payment' => $request->per25Payment,
            'per50Payment' => $request->per50Payment,
            'per75Payment' => $request->per75Payment,
            'per100Payment' => $request->per100Payment,
            'minimumPayment' => $request->minimumPayment,
            'maximumPayment' => $request->maximumPayment,
            'hourlyPayment' => $request->hourlyPayment,
            'clientId' => $request->clientId,
            'status' => 'Open'
        ]);

        if ($query) {
            // Redirect to index
            return redirect()->route('job.index')->with(['success' => 'Project Berhasil Diposting!']);
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal Untuk Posting Project.']);
        }
    }
    public function downloadFile($projectName, $filename)
    {
        // Define the path to the file
        $filePath = 'public/projects/' . $projectName . '/' . $filename;
        echo $filePath;
        // Check if the file exists in the storage
        if (Storage::exists($filePath)) {
            // Return the file as a download response
            return Storage::download($filePath);
        } else {
            // File not found, return a 404 response
            abort(404, 'File not found.');
        }
    }

}
