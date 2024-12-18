<?php

namespace App\Http\Controllers;

use App\Models\Matchh;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
{
    public function index()
    {
        $matches = Tournament::all();
        return view('matches', compact('matches'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('tournament.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'teams' => 'required|array',
            'teams.*' => 'exists:teams,id',
        ]);

        $tournament = Tournament::create([
            'name' => $request->input('name'),
            'start_date' => $request->input('start_date'),
            'teams' => $request->input('teams'),
            'admin' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Tournament successfully created!');
    }

    public function show($id)
    {
        $tournament = Tournament::findOrFail($id);
        return view('tournament.show', compact('tournament'));
    }

    public function manage(Tournament $tournament)
    {
        $tournaments = Tournament::where('admin', Auth::id())->get();
        return view('tournament.manage', compact('tournaments'));
    }

    public function update(Request $request, Tournament $tournament)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'teams' => 'required|array',
            'teams.*' => 'exists:teams,id',
            'location' => 'required|string|max:255',
        ]);

        $tournament->update([
            'name' => $request->input('name'),
            'start_date' => $request->input('start_date'),
            'teams' => $request->input('teams'),
            'location' => $request->input('location'),
        ]);

        return redirect()->back()->with('success', 'Tournament successfully updated!');
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();
        return redirect()->route('tournament.manage')->with('success', 'Tournament successfully deleted!');
    }
}
