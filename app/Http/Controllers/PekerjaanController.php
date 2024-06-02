<?php
namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\Bids;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Yajra\DataTables\Datatables;
use Mail;

class PekerjaanController extends Controller
{

    public function show(): View
    {
        return view('post-job');
    }
    public function ClientDashboard()
    {
        $userId = auth()->id();
        $jobs = Pekerjaan::latest()->where('clientId', $userId)->paginate(10);
        // Loop through each job to get the count of interviews
        $interviewCounts = [];
        $submittedCounts = [];
        foreach ($jobs as $job) {
            $interviewCounts[$job->id] = Bids::where("projectId", $job->id)->where("bidStatus", "Interview")->count();
            $submittedCounts[$job->id] = Bids::where("projectId", $job->id)->where("bidStatus", "Submitted")->count();
        }
        return view("client-dashboard", compact("jobs", "interviewCounts", "submittedCounts"));
    }
    public function GetBidDetail(Request $request)
    {
        $projectId = $request->route('projectId');
        $projectNames = Bids::query()->join('pekerjaans', 'bids.projectId', '=', 'pekerjaans.id')->where('bids.projectId', $projectId)->first('projectName');
        $projectName = $projectNames->projectName;
        if ($request->ajax()) {
            $participants = Bids::query()->join('users', 'bids.userId', '=', 'users.id')->where('bids.projectId', $projectId);
            $pengalaman = Bids::query()->join('users', 'bids.userId', '=', 'users.id')->join('pekerjaans', 'bids.projectId', '=', 'pekerjaans.id')->where('bids.projectId', $projectId)->where('pekerjaans.status', 'Finished')->count();
            return Datatables::of($participants)
                ->addIndexColumn()
                ->addColumn('pengalaman', $pengalaman)
                ->addColumn('interview', function ($participants) {
                    $btni = '<form action="' . route('interviewTheFreelance') . '" method="post" style="display:inline;">
                        <input type="hidden" name="freelancerId" value="' . $participants->userId . '">
                        <input type="hidden" name="projectId" value="' . $participants->projectId . '">
                        <button class="edit btn btn-danger btn-sm">Interview</button></form>';
                    return $btni;
                })
                ->addColumn('choose', function ($participants) {
                    $btn = '
                    <form action="' . route('chooseTheFreelance') . '" method="post" style="display:inline;">
                        <input type="hidden" name="freelancerId" value="' . $participants->userId . '">
                        <input type="hidden" name="projectId" value="' . $participants->projectId . '">
                        <button class="edit btn btn-success btn-sm"> Pilih</button>
                    </form>
                                    ';
                    return $btn;
                })
                ->rawColumns(['interview','choose'])
                ->make(true);


        }
        return view('bid-detail', compact('projectId', 'projectName'));
    }

    public function InterviewFreelancer(Request $request){

    }

    public function ChooseTheFreelance(Request $request){
    
    }

    public function FindJob()
    {
        $userId = auth()->id();
        $jobs = Pekerjaan::latest()->where('status', 'Open')->paginate(10);
        $interviewCounts = [];
        $submittedCounts = [];
        $hasBids = [];
        // Loop through each job to get the count of interviews
        foreach ($jobs as $job) {
            $interviewCounts[$job->id] = Bids::where("projectId", $job->id)->where("bidStatus", "Interview")->count();
            $submittedCounts[$job->id] = Bids::where("projectId", $job->id)->where("bidStatus", "Submitted")->count();
            $hasBid[$job->id] = Bids::where('userId', $userId)->where('projectId', $job->id)->exists();
        }
        if ($hasBids > 0)
            return view("find-job", compact("jobs", "interviewCounts", "submittedCounts", "hasBid"));
        else
            return view("find-job", compact("jobs", "interviewCounts", "submittedCounts"));
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
            'status' => 'Pending'
        ]);

        if ($query) {
            // Redirect to index
            return redirect()->route('job.clientdashboard')->with(['success' => 'Project Berhasil Diposting!']);
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
