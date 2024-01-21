<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Member;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::all();
        return view ('projects.index' ,['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('members.create');
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

        $project = Project::create($request->all());

        return response()->json([
            'project' => $project,
            'message' => 'Project created successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        return view ('projects.show', ['projects' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        return view ('projects.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $project->update($request->all());

        return redirect()->route('projects.show', ['project' => $project])
                        ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();

        return redirect()->route('projects.index')
                            ->with('success', 'Project deleted successfully');
    }

    public function addMember(Project $project)
    {
        $member = Member::factory()->create();

        $project->members()->attach($member->id);

        return redirect()->route('projects.show', $project)->with('success', 'Member added to project successfully');
    }

    public function getMember(Project $project)
    {
        $members = $project->members;

        return view('projects.members', compact('project', 'members'));
    }
}
