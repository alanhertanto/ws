<?php

namespace App\Http\Controllers;

//import model Pekerjaan
use App\Models\Blog;

//import return type View
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Datatables;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(): View
    {
        // Get all blogs
        $blogs = Blog::latest()->where('isFeatured', false)->paginate(10);

        // Get featured blogs
        $featuredBlogs = Blog::latest()->where('isFeatured', true)->get();

        // Render view with blogs and featuredBlogs
        return view('blog', compact('blogs', 'featuredBlogs'));
    }


    public function GetDetail($id)
    {
        $blog = Blog::findOrFail($id); // Retrieve a single blog by its ID
        return view('blog-detail', compact('blog'));
    }


    public function GetAllBlog(Request $request)
    {
        if ($request->ajax()) {
            $participants = Blog::get();

            return Datatables::of($participants)
                ->addIndexColumn()
                ->addColumn('action', function ($participant) {
                    // Add data attribute with blog ID for edit and delete actions
                    $btn = '<button class="edit btn btn-danger btn-sm" data-id="' . $participant->id . '">Edit Blog</button>';
                    $btn .= '<button class="delete btn btn-success btn-sm" data-id="' . $participant->id . '">Hapus Blog</button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function PostBlog(Request $request): RedirectResponse
    {
        // Validate form
        $request->validate([
            'blogFile' => 'mimes:jpeg,jpg,png|max:250000',
            'blogTitle' => 'required|min:5',
            'blogDescription' => 'required|min:10',
            'isFeatured' => 'required'
        ]);

        // Upload image
        $blogTitle = $request->blogTitle;
        $blogTitle = preg_replace('/[^\p{L}\p{N}\s]/u', '', $blogTitle);
        $blogFileName = null;

        if ($request->hasFile('blogFile')) {
            $blogFile = $request->file('blogFile');
            $blogFileName = $blogTitle . '.' . $blogFile->getClientOriginalExtension();

            // Log file name and path
            Log::info('Saving file as: public/blogs/' . $blogFileName);

            // Make sure the public/blogs directory exists
            if (!File::exists(public_path('blogs'))) {
                File::makeDirectory(public_path('blogs'));
            }

            // Move the file to the public/blogs directory
            $blogFile->move(public_path('blogs'), $blogFileName);

            // Log the stored path
            Log::info('Stored file path: ' . public_path('blogs') . '/' . $blogFileName);
        }

        $isFeatured = $request->isFeatured == 'true' ? true : false;

        // Build the query
        $query = Blog::create([
            'foto' => $blogFileName,
            'blogTitle' => $request->blogTitle,
            'blogDescription' => $request->blogDescription,
            'isFeatured' => $isFeatured,
        ]);

        if ($query) {
            // Redirect to index
            return redirect()->route('viewBlogs')->with(['success' => 'Blog Berhasil Diposting!']);
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal Untuk Posting Blog.']);
        }
    }


    public function editPosting(Request $request)
    {
        $blogId = $request->blogId;
        $blog = Blog::findOrFail($blogId);
        return response()->json($blog);
    }

    public function updatePosting(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'blogTitle' => 'required|min:5',
                'blogDescription' => 'required|min:10',
                'isFeatured' => 'required',
                'blogFile' => 'mimes:jpeg,jpg,png|max:250000',
            ]);

            // Find the blog post by its ID
            $blog = Blog::findOrFail($request->id);
            $isFeatured = $request->isFeatured == 'true' ? true : false;

            // Update the blog post fields
            $blog->blogTitle = $request->blogTitle;
            $blog->blogDescription = $request->blogDescription;
            $blog->isFeatured = $isFeatured;

            // Handle file upload if provided
            if ($request->hasFile('blogFile')) {
                // Delete the old file if exists
                if ($blog->foto && File::exists(public_path('blogs/' . $blog->foto))) {
                    File::delete(public_path('blogs/' . $blog->foto));
                }
                // Upload the new file
                $blogTitle = preg_replace('/[^\p{L}\p{N}\s]/u', '', $request->blogTitle);
                $blogFileName = $blogTitle . '.' . $request->file('blogFile')->getClientOriginalExtension();

                // Move the file to the public/blogs directory
                $request->file('blogFile')->move(public_path('blogs'), $blogFileName);

                // Update the file name in the database
                $blog->foto = $blogFileName;
            }

            // Save the updated blog post
            $blog->save();

            // Return success response
            return redirect()->route('viewBlogs')->with(['success' => 'Blog Berhasil Di Update!']);

        } catch (\Exception $e) {
            // Log the error
            return redirect()->back()->withErrors(['error' => 'Gagal Untuk Posting Blog.']);
        }
    }

    public function deletePosting(Request $request)
    {
        $blogId = $request->blogId;
        $blog = Blog::findOrFail($blogId);

        // Delete associated file from public directory
        if ($blog->foto && File::exists(public_path('blogs/' . $blog->foto))) {
            File::delete(public_path('blogs/' . $blog->foto));
        }

        // Delete the blog post
        $blog->delete();

        return response()->json(['message' => 'Blog post berhasil dihapus']);
    }


}
