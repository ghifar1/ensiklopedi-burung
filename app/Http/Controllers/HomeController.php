<?php

namespace App\Http\Controllers;

use App\Models\Bird;
use App\Models\Log;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $birds = Bird::paginate(10, ['*'], 'birds');
        $logs = Log::orderBy('created_at', 'desc')->paginate(10, ['*'], 'logs');
        return view('home', compact('birds', 'logs'));
    }
}
