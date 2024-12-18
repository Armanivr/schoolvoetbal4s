<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Tournament;

class TeamController extends Controller
{
    //
    public function index(){



    }

        public function create()
        {
            $tournaments = Tournament::all(); // Retrieve all tournaments from the database
            return view('teamRegister', compact('tournaments'));
        }
    public function addTeams(Request $request)
    {
        

        return redirect()->route('createTeam');

    }
        public function createMember(){
            return view('memberRegister');
    }
    public function addMember(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'team_id' => 'required|integer|exists:teams,id',
        ]);

        $newPlayer = new Player;
        $newPlayer->name = $request->input('name');
        $newPlayer->team_id = $request->input('team_id');
        $newPlayer->save();

        return redirect()->route('createMember');
    }
}
