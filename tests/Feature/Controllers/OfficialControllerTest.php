<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Official;

use App\Models\Position;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OfficialControllerTest extends TestCase
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
    public function it_displays_index_view_with_officials()
    {
        $officials = Official::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('officials.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.officials.index')
            ->assertViewHas('officials');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_official()
    {
        $response = $this->get(route('officials.create'));

        $response->assertOk()->assertViewIs('app.officials.create');
    }

    /**
     * @test
     */
    public function it_stores_the_official()
    {
        $data = Official::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('officials.store'), $data);

        unset($data['user_id']);

        $this->assertDatabaseHas('officials', $data);

        $official = Official::latest('id')->first();

        $response->assertRedirect(route('officials.edit', $official));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_official()
    {
        $official = Official::factory()->create();

        $response = $this->get(route('officials.show', $official));

        $response
            ->assertOk()
            ->assertViewIs('app.officials.show')
            ->assertViewHas('official');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_official()
    {
        $official = Official::factory()->create();

        $response = $this->get(route('officials.edit', $official));

        $response
            ->assertOk()
            ->assertViewIs('app.officials.edit')
            ->assertViewHas('official');
    }

    /**
     * @test
     */
    public function it_updates_the_official()
    {
        $official = Official::factory()->create();

        $position = Position::factory()->create();
        $user = User::factory()->create();

        $data = [
            'position_id' => $position->id,
            'user_id' => $user->id,
        ];

        $response = $this->put(route('officials.update', $official), $data);

        unset($data['user_id']);

        $data['id'] = $official->id;

        $this->assertDatabaseHas('officials', $data);

        $response->assertRedirect(route('officials.edit', $official));
    }

    /**
     * @test
     */
    public function it_deletes_the_official()
    {
        $official = Official::factory()->create();

        $response = $this->delete(route('officials.destroy', $official));

        $response->assertRedirect(route('officials.index'));

        $this->assertDeleted($official);
    }
}
