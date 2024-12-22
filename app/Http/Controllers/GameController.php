<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function index(){
        $games = Game::all();
        $tournaments = Tournament::all();
        return view('home')->with('games', $games)->with('tournaments', $tournaments);
    }
    public function games(){
        $teams = Team::all();
    if ($teams->count() < 2) {
        return "Er zijn niet genoeg teams om wedstrijden te genereren.";
    }
    foreach ($teams as $teamA) {

        foreach ($teams as $teamB) {
            $newGame = new Game();
            $newGame->name = "match";
            $newGame->team1 = $teamA->name;
            $newGame->team2 = $teamB->name;
            $newGame->save();
            if ($teamA->id < $teamB->id) {
                $match = Game::create();
                $match->teams()->attach([$teamA->id, $teamB->id]);
            }
        }
    }
    }
}
