<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Image;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImageControllerTest extends TestCase
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
    public function it_displays_index_view_with_images()
    {
        $images = Image::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('images.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.images.index')
            ->assertViewHas('images');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_image()
    {
        $response = $this->get(route('images.create'));

        $response->assertOk()->assertViewIs('app.images.create');
    }

    /**
     * @test
     */
    public function it_stores_the_image()
    {
        $data = Image::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('images.store'), $data);

        unset($data['user_id']);
        unset($data['url']);

        $this->assertDatabaseHas('images', $data);

        $image = Image::latest('id')->first();

        $response->assertRedirect(route('images.edit', $image));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_image()
    {
        $image = Image::factory()->create();

        $response = $this->get(route('images.show', $image));

        $response
            ->assertOk()
            ->assertViewIs('app.images.show')
            ->assertViewHas('image');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_image()
    {
        $image = Image::factory()->create();

        $response = $this->get(route('images.edit', $image));

        $response
            ->assertOk()
            ->assertViewIs('app.images.edit')
            ->assertViewHas('image');
    }

    /**
     * @test
     */
    public function it_updates_the_image()
    {
        $image = Image::factory()->create();

        $user = User::factory()->create();

        $data = [
            'url' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->put(route('images.update', $image), $data);

        unset($data['user_id']);
        unset($data['url']);

        $data['id'] = $image->id;

        $this->assertDatabaseHas('images', $data);

        $response->assertRedirect(route('images.edit', $image));
    }

    /**
     * @test
     */
    public function it_deletes_the_image()
    {
        $image = Image::factory()->create();

        $response = $this->delete(route('images.destroy', $image));

        $response->assertRedirect(route('images.index'));

        $this->assertDeleted($image);
    }
}
