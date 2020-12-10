<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Occupation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OccupationControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_occupations()
    {
        $occupations = Occupation::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('occupations.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.occupations.index')
            ->assertViewHas('occupations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_occupation()
    {
        $response = $this->get(route('occupations.create'));

        $response->assertOk()->assertViewIs('app.occupations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_occupation()
    {
        $data = Occupation::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('occupations.store'), $data);

        unset($data['name']);
        unset($data['description']);

        $this->assertDatabaseHas('occupations', $data);

        $occupation = Occupation::latest('id')->first();

        $response->assertRedirect(route('occupations.edit', $occupation));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_occupation()
    {
        $occupation = Occupation::factory()->create();

        $response = $this->get(route('occupations.show', $occupation));

        $response
            ->assertOk()
            ->assertViewIs('app.occupations.show')
            ->assertViewHas('occupation');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_occupation()
    {
        $occupation = Occupation::factory()->create();

        $response = $this->get(route('occupations.edit', $occupation));

        $response
            ->assertOk()
            ->assertViewIs('app.occupations.edit')
            ->assertViewHas('occupation');
    }

    /**
     * @test
     */
    public function it_updates_the_occupation()
    {
        $occupation = Occupation::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->put(route('occupations.update', $occupation), $data);

        unset($data['name']);
        unset($data['description']);

        $data['id'] = $occupation->id;

        $this->assertDatabaseHas('occupations', $data);

        $response->assertRedirect(route('occupations.edit', $occupation));
    }

    /**
     * @test
     */
    public function it_deletes_the_occupation()
    {
        $occupation = Occupation::factory()->create();

        $response = $this->delete(route('occupations.destroy', $occupation));

        $response->assertRedirect(route('occupations.index'));

        $this->assertDeleted($occupation);
    }
}
