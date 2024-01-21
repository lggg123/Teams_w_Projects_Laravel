<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teams = Team::all();

        return view ('teams.index', ['teams' => $teams]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $team = Team::create(['name' => $request->input('team_name')]);

        return response()->json([
            'redirect' => route('teams.index')
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
        return view ('teams.show', ['team' => $team]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
        return view('teams.edit', ['team' => $team]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
        //
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $team->update($request->all());

        return redirect()->route('teams.show', ['team' => $team]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
        $team->delete();

        return redirect()->route('teams.index')
                        ->with('success', 'team deleted successfully');

    }

    public function getMembers(Team $team)
    {
        $members = $team->members;

        return view('teams.members', compact('team', 'members'));
    }
}
