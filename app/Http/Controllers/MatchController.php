<?php

namespace App\Http\Controllers;

use App\Models\Matchh;
use Illuminate\Http\Request;
use App\Models\Team;
class MatchController extends Controller
{
    //
    public function index(){
        return view('home');
    }
    public function matches(){
        $matches = Matchh::all();
        return view('wedstrijden')->with('matches', $matches);
    }
}
