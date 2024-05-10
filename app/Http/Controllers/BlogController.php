<?php

namespace App\Http\Controllers;

//import model Pekerjaan
use App\Models\Blog; 

//import return type View
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        // //get all products
        // $blog = Blog::latest()->paginate(10);

        //render view with Blog
        return view('blog');
    }
}