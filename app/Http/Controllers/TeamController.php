<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Tournament;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{

    public function show()
    {
        $team = Team::where('owner_id', Auth::id())->firstOrFail();
        return view('team.show', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'coach' => 'required|string|max:255',
            'goals' => 'required|integer',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $team = Team::findOrFail($id);
        $team->name = $request->input('name');
        $team->coach = $request->input('coach');
        $team->goals = $request->input('goals');

        if ($request->hasFile('logo')) {
            $filePath = $request->file('logo')->store('team_logos', 'public');
            $team->logo = $filePath;
        }

        $team->save();

        return redirect()->route('team.show', $team->id)->with('success', 'Team information updated successfully.');
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
            // $teams = Team::all();
            // foreach($teams as $team){
            //     if($team->owner_id == Auth::id()){
                   // $selectedTeam = $team->owner_id;
                   $selectedTeam = Team::where('owner_id', Auth::id())->first();
                    return view('memberRegister')->with('selectedTeam', $selectedTeam);
                // }
            }


    public function addMember(Request $request){
   //     $team = Team::find($request->team_id);
        $selectedTeam = Team::where('owner_id', Auth::id())->first();
        $newPlayer = new Player();
        $newPlayer->name = $request->name;
        $newPlayer->team_id = $selectedTeam->id;
        $newPlayer->save();
if ($newPlayer->save()) {
    return redirect()->route('createMember')->with('success', 'Player added successfully.');
} else {
    return redirect()->route('createMember')->with('error', 'Failed to add player. Please try again.');
}

        }
    }
