<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tests\TestCase;
use App\Models\Member;
use App\Models\Team;
use App\Models\Project;

class MemberTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_member_can_be_created()
    {
        $team = Team::factory()->create();
        $member = Member::factory()->create(['team_id' => $team->id]);

        $this->assertDatabasehas('members', [
            'id' => $member->id,
            'first_name' => $member->first_name,
            'city' => $member->city,
            'state' => $member->state,
            'country' => $member->country,
            'team_id' => $team->id
        ]);

        $this->assertNotNull($member);
    }

    /** @test */
    public function a_member_belongs_to_a_team()
    {
        $team = Team::factory()->create();
        $member = Member::factory()->create(['team_id' => $team->id]);

        $this->assertInstanceOf(Team::class, $member->team);
    }

    /** @test */
    public function a_member_can_have_multiple_projects()
    {
        $team = Team::factory()->create();
        $member = Member::factory()->create(['team_id' => $team->id]);
        $project1 = Project::factory()->create();
        $project2 = Project::factory()->create();

        $member->projects()->attach([$project1->id, $project2->id]);

        $this->assertCount(2, $member->projects);
    }
}