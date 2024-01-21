<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;
use App\Models\Team;

class MemberFactory extends Factory
{

    protected $model = Member::class;

    public function definition(): array
    {   
        $team = Team::factory()->create();
        
        return [
            //
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'team_id' => Team::factory()
        ];
    }
}
