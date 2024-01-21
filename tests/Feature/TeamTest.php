<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Member;
use App\Models\Team;
use App\Models\Project;

class TeamTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function a_team_can_be_created()
    {
        $team = Team::factory()->create();

        $this->assertNotNull($team);
        $this->assertInstanceOf(Team::class, $team);
    }

    /** @test */
    public function a_team_can_be_updated()
    {
        $team = Team::factory()->create();

        $updatedTeamName = 'Updated Team Name';

        $team->update(['name' => $updatedTeamName]);

        $this->assertEquals($updatedTeamName, $team->fresh()->name);
    }

    /** @test */
    public function a_team_can_be_deleted()
    {
        $team = Team::factory()->create();

        $team->delete();

        $this->assertDatabaseMissing('teams', ['id' => $team->id]);
    }
}
