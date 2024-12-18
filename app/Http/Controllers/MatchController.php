<?php

namespace App\Http\Controllers;

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
            'start_date' => 'required|date', // Add validation for start_date
        ]);
    
        Tournament::create([
            'name' => $request->input('name'),
            'start_date' => $request->input('start_date'), // Store the start date
            'admin' => Auth::id(), // Store the current logged-in user ID
        ]);
    
        return redirect()->route('adminPanel')->with('success', 'Tournament successfully created!');
    }
}
