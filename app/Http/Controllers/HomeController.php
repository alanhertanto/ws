<?php
namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Client;
use App\Models\User;
use App\Models\Message;
use App\Mail\InterviewInvitation;
use App\Jobs\SendMessage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Blade;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Yajra\DataTables\Datatables;

class HomeController extends Controller
{

    public function Home(): View
    {
        $clients = DB::table("Client")->get();
        $achievements = DB::table("Achievements")->get();
        return view('welcome',compact("clients", "achievements"));
    }
}
