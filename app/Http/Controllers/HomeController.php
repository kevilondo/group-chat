<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Group;

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
        //get group where user is present
        $groups = auth()->user()->group_member;

        return view('home', compact('groups'));
    }
}
