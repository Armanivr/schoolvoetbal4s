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
        $teams = Team::all();
    if ($teams->count() < 2) {
        return "Er zijn niet genoeg teams om wedstrijden te genereren.";
    }
    foreach ($teams as $teamA) {
        foreach ($teams as $teamB) {
            if ($teamA->id < $teamB->id) {
                $match = Matchh::create();
                $match->teams()->attach([$teamA->id, $teamB->id]);
            }
        }
    }
    }
}
