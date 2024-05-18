<?php

namespace App\Http\Controllers;

//import model Pekerjaan
use App\Models\Job; 

//import return type View
use Illuminate\View\View;

class JobController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        return view("post-job");
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'projectFile'           => 'mimes:jpeg,jpg,png,pdf,doc,docx|max:25000',
            'projectName'           => 'required|min:5',
            'projectDescription'    => 'required|min:10',
            'paymentType'           => 'required',
            '25perPayment'          => 'nullable',
            '50perPayment'          => 'nullable',
            '75perPayment'          => 'nullable',
            '100perPayment'         => 'nullable',
            'minimumPayment'        => 'nullable',
            'maximumPayment'        => 'nullable',
            'hourlyPayment'         => 'nullable'
        ]);

        //upload image
        $projectName = $request->projectName;
        $projectFile = $request->file('projectFile');
        $projectFile->storeAs('public/projects/'.$projectName.'/', $projectFile->hashName());

        //create Job
        Job::create([
            'image'         => $projectFile->hashName(),
            'projectName'           => $request->projectName,
            'projectDescription'    => $request->projectDescription,
            'paymentType'           => $request->paymentType,
            'per25Payment'          => $request->per25Payment,
            'per50Payment'          => $request->per50Payment,
            'per75Payment'          => $request->per75Payment,
            'per100Payment'         => $request->per100Payment,
            'minimumPayment'        => $request->minimumPayment,
            'maximumPayment'        => $request->maximumPayment,
            'hourlyPayment'         => $request->hourlyPayment
        ]);

        //redirect to index
        return redirect()->route('post-job')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
}