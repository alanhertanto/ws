<?php
namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;
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
            'hourlyPayment' => 'nullable'
        ]);
    
        // Upload image
        $projectName = $request->projectName;
        $projectFileName = null;
        if ($request->hasFile('projectFile')) {
            $projectFile = $request->file('projectFile');
            $projectFile->storeAs('public/projects/' . $projectName . '/', $projectFile->hashName());
            $projectFileName = $projectFile->hashName();
        }
    
        // Build the query
        $query = Pekerjaan::query()->create([
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
            'hourlyPayment' => $request->hourlyPayment
        ]);
    
        // Echo the SQL query
        echo $query->toSql();
    
        // Execute the query
        $queryCreate = $query->get();
    
        if ($queryCreate) {
            // Redirect to index
            return redirect()->route('job.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to save data.']);
        }
    }    
}
