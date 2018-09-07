<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ChatController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {      

        $usuarios = DB::table('users')->get();
        return view('chat', ['usuarios' => $usuarios]);
    }
}
