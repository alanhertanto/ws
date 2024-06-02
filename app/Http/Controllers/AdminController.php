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
use Yajra\DataTables\Datatables;

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
                        $btn = '<a href="' . route('approveProject', ['projectId' => $participant->id]) . '" class="edit btn btn-danger btn-sm">Approve Pekerjaan</a>';
                    } else if ($participant->status == "Working") {
                        $btn = '<a href="' . route('finishProject', ['projectId' => $participant->id]) . '" class="edit btn btn-success btn-sm"> Selesai</a>';
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
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
