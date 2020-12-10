<?php

namespace Tests\Feature\Controllers;

use App\Models\User;

use App\Models\Address;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
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
    public function it_displays_index_view_with_users()
    {
        $users = User::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('users.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.users.index')
            ->assertViewHas('users');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_user()
    {
        $response = $this->get(route('users.create'));

        $response->assertOk()->assertViewIs('app.users.create');
    }

    /**
     * @test
     */
    public function it_stores_the_user()
    {
        $data = User::factory()
            ->make()
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->post(route('users.store'), $data);

        unset($data['password']);
        unset($data['email_verified_at']);
        unset($data['first_name']);
        unset($data['middle_name']);
        unset($data['last_name']);
        unset($data['gender']);
        unset($data['age']);
        unset($data['contact_number']);
        unset($data['address_id']);

        $this->assertDatabaseHas('users', $data);

        $user = User::latest('id')->first();

        $response->assertRedirect(route('users.edit', $user));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_user()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.show', $user));

        $response
            ->assertOk()
            ->assertViewIs('app.users.show')
            ->assertViewHas('user');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_user()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.edit', $user));

        $response
            ->assertOk()
            ->assertViewIs('app.users.edit')
            ->assertViewHas('user');
    }

    /**
     * @test
     */
    public function it_updates_the_user()
    {
        $user = User::factory()->create();

        $address = Address::factory()->create();

        $data = [
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->text(255),
            'last_name' => $this->faker->lastName,
            'gender' => array_rand(array_flip(['Male', 'Female']), 1),
            'age' => $this->faker->randomNumber(0),
            'contact_number' => $this->faker->text(255),
            'email' => $this->faker->email,
            'address_id' => $address->id,
        ];

        $data['password'] = \Str::random('8');

        $response = $this->put(route('users.update', $user), $data);

        unset($data['password']);
        unset($data['email_verified_at']);
        unset($data['first_name']);
        unset($data['middle_name']);
        unset($data['last_name']);
        unset($data['gender']);
        unset($data['age']);
        unset($data['contact_number']);
        unset($data['address_id']);

        $data['id'] = $user->id;

        $this->assertDatabaseHas('users', $data);

        $response->assertRedirect(route('users.edit', $user));
    }

    /**
     * @test
     */
    public function it_deletes_the_user()
    {
        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', $user));

        $response->assertRedirect(route('users.index'));

        $this->assertDeleted($user);
    }
}
