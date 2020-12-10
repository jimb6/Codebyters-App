<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Institute;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InstituteControllerTest extends TestCase
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
    public function it_displays_index_view_with_institutes()
    {
        $institutes = Institute::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('institutes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.institutes.index')
            ->assertViewHas('institutes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_institute()
    {
        $response = $this->get(route('institutes.create'));

        $response->assertOk()->assertViewIs('app.institutes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_institute()
    {
        $data = Institute::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('institutes.store'), $data);

        $this->assertDatabaseHas('institutes', $data);

        $institute = Institute::latest('id')->first();

        $response->assertRedirect(route('institutes.edit', $institute));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_institute()
    {
        $institute = Institute::factory()->create();

        $response = $this->get(route('institutes.show', $institute));

        $response
            ->assertOk()
            ->assertViewIs('app.institutes.show')
            ->assertViewHas('institute');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_institute()
    {
        $institute = Institute::factory()->create();

        $response = $this->get(route('institutes.edit', $institute));

        $response
            ->assertOk()
            ->assertViewIs('app.institutes.edit')
            ->assertViewHas('institute');
    }

    /**
     * @test
     */
    public function it_updates_the_institute()
    {
        $institute = Institute::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'acronym' => $this->faker->text(255),
            'color_theme' => $this->faker->text(255),
        ];

        $response = $this->put(route('institutes.update', $institute), $data);

        $data['id'] = $institute->id;

        $this->assertDatabaseHas('institutes', $data);

        $response->assertRedirect(route('institutes.edit', $institute));
    }

    /**
     * @test
     */
    public function it_deletes_the_institute()
    {
        $institute = Institute::factory()->create();

        $response = $this->delete(route('institutes.destroy', $institute));

        $response->assertRedirect(route('institutes.index'));

        $this->assertDeleted($institute);
    }
}
