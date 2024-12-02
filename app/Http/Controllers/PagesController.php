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
}
