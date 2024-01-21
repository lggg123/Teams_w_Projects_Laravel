<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Member;
use App\Models\Team;
use App\Models\Project;

class ProjectTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function a_project_can_be_created()
    {
        $project = Project::factory()->create();

        $this->assertNotNull($project);
        $this->assertInstanceOf(Team::class, $project);
    }

    /** @test */
    public function a_project_can_be_updated()
    {
        $project = Project::factory()->create();

        $updatedProjectName = 'Updated Project Name';

        $project->update(['name' => $updatedProjectName]);

        $this->assertEquals($updatedProjectName, $project->fresh()->name);
    }

    /** @test */
    public function a_project_can_be_deleted()
    {
        $project = Project::factory()->create();

        $project->delete();

        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }
}
