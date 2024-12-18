<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('home', compact('games'));
    }

    public function matches(){
        $matches = Game::all();
        return view('matches', compact('matches'));
    }

    public function register(){
        return view('teamRegister');
    }

    public function adminPanel(){
        $user = auth()->user();
        return view('adminPanel', compact('user'));
    }
}
