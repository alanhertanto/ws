<?php

namespace App\Http\Controllers;

//import model Pekerjaan
use App\Models\Pekerjaan; 

//import return type View
use Illuminate\View\View;

class PekerjaanController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all products
        $pekerjaans = Pekerjaan::latest()->paginate(10);

        //render view with Pekerjaan
        return view('pekerjaans.index', compact('pekerjaans'));
    }
}