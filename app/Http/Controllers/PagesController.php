<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tournament;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $games = Game::all();
        $tournaments = Tournament::all();
        return view('home', compact('games', 'tournaments'));
    }

    public function matches(){
        $matches = Game::all();
        return view('matches', compact('matches'));
    }

    public function register(){
        $tournaments = Tournament::all();
        return view('teamRegister', compact('tournaments'));
    }
}
