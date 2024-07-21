<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\Bids;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Datatables;
use PDF;

class AdminController extends Controller
{

    public function viewJobs(): View
    {
        return view('admin.lihat-pekerjaan');
    }

    public function viewTrans(): View
    {
        return view('admin.lihat-transaksi');
    }
    public function viewBlogs(): View
    {
        return view('admin.blog');
    }

    public function printTrans(): View
    {
        return view('admin.cetak-transaksi');
    }


    public function getAllJob(Request $request)
    {
        if ($request->ajax()) {
            $participants = Pekerjaan::query()
                ->join('users', 'users.id', '=', 'pekerjaans.clientId')
                ->select(
                    'pekerjaans.*',
                    'users.id as userId',
                    'users.name as clientName',
                    'pekerjaans.created_at as pekerjaan_created_at',
                    'users.created_at as user_created_at'
                )
                ->get();

            return Datatables::of($participants)
                ->addIndexColumn()
                ->addColumn('paymentRate', function ($participant) {
                    $paymentType = $participant->paymentType;
                    if ($paymentType == "Hourly") {
                        return $participant->hourlyPayment;
                    } elseif ($paymentType == "Project") {
                        return ($participant->maximumPayment + $participant->minimumPayment) / 2;
                    } else {
                        return $participant->per25Payment + $participant->per50Payment + $participant->per75Payment + $participant->per100Payment;
                    }
                })
                ->addColumn('action', function ($participant) {
                    if ($participant->status == "Pending") {
                        $btn = '<a href="' . route('approveProject', ['projectId' => $participant->id]) . '" class="edit btn btn-warning btn-sm">Approve Pekerjaan</a> ';
                        $btn .= '<a href="' . route('hapusProject', ['projectId' => $participant->id]) . '" class="edit btn btn-danger btn-sm">Tolak Pekerjaan</a>';
                    } else if ($participant->status == "Working") {
                        $btn = '<a href="' . route('finishProject', ['projectId' => $participant->id]) . '" class="edit btn btn-success btn-sm"> Selesai</a>';
                    } else if ($participant->status == "Open") {
                        $btn = 'Project Sedang Berlangsung!';

                    } else {
                        $btn = 'Project Selesai!';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function ApproveProject($request)
    {
        $query = Pekerjaan::query()->where('id', '=', $request)->update(['status' => 'Open']);
        if ($query) {
            // Redirect to index
            return redirect()->route('lihat-pekerjaan')->with(['success' => 'Project Di Approve!']);
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal Untuk ' . $request . 'Merubah Status Project.']);
        }
    }

    public function FinishProject($request)
    {
        $query = Pekerjaan::query()->where('id', '=', $request)->update(['status' => 'Finish']);
        if ($query) {
            // Redirect to index
            return redirect()->route('lihat-pekerjaan')->with(['success' => 'Project Selesai!']);
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal Untuk Merubah Status Project.']);
        }

    }

    public function HapusProject(Request $request)
    {
        $projectId = $request->projectId;
        $project = Pekerjaan::findOrFail($projectId);

        // Delete associated file from public directory
        if ($project->projectFile && File::exists(public_path('projects/' . $project->projectName . '/' . $project->projectFile))) {
            File::delete(public_path('projects/' . $project->projectName . '/' . $project->projectFile));
        }

        // Delete the blog post
        $project->delete();
        return redirect()->route('lihat-pekerjaan')->with(['success' => 'Project Berhasil Di Tolak']);
    }


    public function getAllTransaction(Request $request)
    {
        if ($request->ajax()) {
            $participants = Transaksi::query()
                ->join('pekerjaans', 'pekerjaans.id', '=', 'transaksi.projectId')
                ->join('users as clients', 'clients.id', '=', 'pekerjaans.clientId') // Join users for clients
                ->join('bids', 'bids.projectId', '=', 'pekerjaans.id')
                ->join('users as freelancers', 'freelancers.id', '=', 'bids.userId') // Join users for freelancers
                ->select(
                    'pekerjaans.*',
                    'transaksi.*',
                    'transaksi.status as status_transaksi',
                    'clients.name as clientName',
                    'freelancers.name as talentName',
                    'transaksi.created_at as transaksi_created_at'
                )
                ->get();


            return Datatables::of($participants)
                ->addIndexColumn()
                ->addColumn('action', function ($participant) {
                    if ($participant->status_transaksi == "Unpaid") {
                        $btn = '<a href="' . route('approveTransaction', ['transactionId' => $participant->id]) . '" class="edit btn btn-danger btn-sm">Approve Pembayaran</a>';
                    } else if ($participant->status_transaksi == "Paid") {
                        $btn = '<a href="' . route('completeTransaction', ['transactionId' => $participant->id]) . '" class="edit btn btn-success btn-sm">Project Selesai</a>';
                    } else {
                        $btn = 'Selesai!';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function printTransaction(Request $request)
    {
        $participants = Transaksi::query()
            ->join('pekerjaans', 'pekerjaans.id', '=', 'transaksi.projectId')
            ->join('users as clients', 'clients.id', '=', 'pekerjaans.clientId') // Join users for clients
            ->join('bids', 'bids.projectId', '=', 'pekerjaans.id')
            ->join('users as freelancers', 'freelancers.id', '=', 'bids.userId') // Join users for freelancers
            ->select(
                'pekerjaans.*',
                'transaksi.*',
                'transaksi.status as status_transaksi',
                'clients.name as clientName',
                'freelancers.name as talentName',
                'transaksi.created_at as transaksi_created_at'
            )
            ->get();

        $pdf = PDF::loadView('pdf.report', compact('participants'));

        return $pdf->download('report.pdf');
    }

    public function approveTransaction($request)
    {
        $query = Transaksi::query()->where('id', '=', $request)->update(['status' => 'Paid']);
        if ($query) {
            // Redirect to index
            return redirect()->route('lihat-transaksi')->with(['success' => 'Project Dibayar!']);
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal Untuk Merubah Status Pembayaran Project.']);
        }

    }


    public function completeTransaction($request)
    {
        $query = Transaksi::query()->where('id', '=', $request)->update(['status' => 'Finish']);
        if ($query) {
            // Redirect to index
            return redirect()->route('lihat-transaksi')->with(['success' => 'Project Selesai!']);
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal Untuk Merubah Status Pembayaran Project.']);
        }

    }
    public function viewAkuns(): View
    {
        return view('admin.akun');
    }

    public function getAllAkun(Request $request)
    {
        if ($request->ajax()) {
            $participants = User::query()
                ->get();

            return Datatables::of($participants)
                ->addIndexColumn()
                ->addColumn('action', function ($participant) {
                    $btn = '<button class="edit btn btn-danger btn-sm" data-id="' . $participant->id . '">Edit Akun</button>';
                    $btn .= '<button class="delete btn btn-success btn-sm" data-id="' . $participant->id . '">Hapus Akun</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function editAkun(Request $request)
    {
        $akun = User::findOrFail($request->id);
        return response()->json($akun);
    }

    public function updateAkun(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'nama' => 'required|min:5',
                'email' => 'required|min:10',
                'password' => 'required',
            ]);

            $akun = User::findOrFail($request->id);
            $akun->name = $request->nama;
            $akun->email = $request->email;
            $akun->password = Hash::make($request->password);
            $akun->save();

            // Return success response
            return redirect()->route('viewAkuns')->with(['success' => 'Akun Berhasil Di Update!']);

        } catch (\Exception $e) {
            // Log the error
            return redirect()->back()->withErrors(['error' => 'Gagal Untuk Posting Blog.']);
        }
    }

    public function deleteAkun(Request $request)
    {
        $akun = User::findOrFail($request->id);
        // Delete the blog post
        $akun->delete();

        return response()->json(['message' => 'Akun Berhasil DiHapus']);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
