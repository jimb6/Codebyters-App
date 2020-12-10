<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Alumnus;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlumnusControllerTest extends TestCase
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
    public function it_displays_index_view_with_alumni()
    {
        $alumni = Alumnus::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('alumni.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.alumni.index')
            ->assertViewHas('alumni');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_alumnus()
    {
        $response = $this->get(route('alumni.create'));

        $response->assertOk()->assertViewIs('app.alumni.create');
    }

    /**
     * @test
     */
    public function it_stores_the_alumnus()
    {
        $data = Alumnus::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('alumni.store'), $data);

        unset($data['user_id']);

        $this->assertDatabaseHas('alumni', $data);

        $alumnus = Alumnus::latest('id')->first();

        $response->assertRedirect(route('alumni.edit', $alumnus));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_alumnus()
    {
        $alumnus = Alumnus::factory()->create();

        $response = $this->get(route('alumni.show', $alumnus));

        $response
            ->assertOk()
            ->assertViewIs('app.alumni.show')
            ->assertViewHas('alumnus');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_alumnus()
    {
        $alumnus = Alumnus::factory()->create();

        $response = $this->get(route('alumni.edit', $alumnus));

        $response
            ->assertOk()
            ->assertViewIs('app.alumni.edit')
            ->assertViewHas('alumnus');
    }

    /**
     * @test
     */
    public function it_updates_the_alumnus()
    {
        $alumnus = Alumnus::factory()->create();

        $user = User::factory()->create();

        $data = [
            'user_id' => $user->id,
        ];

        $response = $this->put(route('alumni.update', $alumnus), $data);

        unset($data['user_id']);

        $data['id'] = $alumnus->id;

        $this->assertDatabaseHas('alumni', $data);

        $response->assertRedirect(route('alumni.edit', $alumnus));
    }

    /**
     * @test
     */
    public function it_deletes_the_alumnus()
    {
        $alumnus = Alumnus::factory()->create();

        $response = $this->delete(route('alumni.destroy', $alumnus));

        $response->assertRedirect(route('alumni.index'));

        $this->assertDeleted($alumnus);
    }
}
