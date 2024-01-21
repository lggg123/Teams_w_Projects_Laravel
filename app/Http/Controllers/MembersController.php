<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Team;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $members = Member::all();

        return view('members.index', ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'team_id' => 'required|exists:teams,id'
        ]);

         // Log request data for debugging
    Log::info('Request Data: ' . json_encode($request->all()));

        
        $member = Member::create($request->all());

        return response()->json([
            'member' => $member,
            'message' => 'Member created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
        return view('members.show', ['member' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
        return view('members.edit', ['member']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'team_id' => 'required|exists:teams,id'
        ]);

        $member->update($request->all());

        return redirect()->route('members.show', ['member' => $member])
            ->with('success', 'Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
        $member->delete();

        return redirect()->route('members.index')
                        -> with('success', 'Member deleted successfully');
    }

    public function updateTeam(Member $member, Request $request)
    {
        $request->validate([
            'team_id' => 'required|exists:teams,id',
        ]);

        $team = Team::find($request->team_id);
        
        if (!$team) {
            return response()->json(['error' => 'Team not found'], 404);
        }

        $member->update(['team_id' => $team->id]);

        return response()->json(['message' => 'Team updated successfully', 'member' => $member]);
    }
}
