<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Api\V1\Users\User;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    /**
     * Setting up some features that are common
     * in multiple methods
     */
    public function setUp() : void{
        parent::setUp();

        $this->withoutExceptionHandling();

        $this->user = User::factory()->create();
    }

    /**
     * Getting all the users of the system
     */
    public function test_to_get_all_users(){
        // Action
        $response = $this->getJson(route('users.index'));

        // Assertion
        $this->assertEquals(1, count($response->json()));
    }

    /**
     * Getting a single user by id
     */
    public function test_getting_a_single_user(){
        // Action
        $response = $this->getJson(route('users.show', $this->user->id))->assertOk()->json();

        // Assertion
        $this->assertEquals($this->user->id, $response['id']);
    }
    

    /**
     * Creating a user
     */
    public function test_creating_a_user(){
        // Action
        $this->postJson(route('users.store'), [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'test@email.com',
            'phone_number' => '0974519270',
            'role' => 'user',
            'job_title' => 'Software Engineer',
            'password' => Hash::make('12345678')
        ])->assertOk();

        // Assertion
        $this->assertDatabaseHas('users', [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'test@email.com',
            'phone_number' => '0974519270',
            'role' => 'user',
            'job_title' => 'Software Engineer',
        ]);
    }

    /**
     * Validating user inputs
     */
    // Validating first name
    // public function test_while_storing_users_first_name_required(){
    //     $this->withExceptionHandling();

    //     $response = $this->putJson(route('users.store', $this->user->id))
    //                     ->assertUnprocessable();

    //     $response->assertJsonValidationErrors(['first_name']);
    // }

    /**
     * Creating a user
     */
    public function test_updating_a_user(){
        // Action
        $this->putJson(route('users.update', $this->user->id), [
            'first_name' => 'Name 1',
            'last_name' => 'Last Name',
            'email' => 'test@email.com',
            'phone_number' => '0974519270',
            'role' => 'user',
            'job_title' => 'Software Engineer',
        ])->assertOk();

        // Assertion
        $this->assertDatabaseHas('users', [
            'first_name' => 'Name 1',
            'last_name' => 'Last Name',
            'email' => 'test@email.com',
            'phone_number' => '0974519270',
            'role' => 'user',
            'job_title' => 'Software Engineer',
        ]);
    }

    // Deleting a user
    public function test_delete_single_user(){
        // Action
        $response = $this->deleteJson(route('users.destroy', $this->user->id));

        // Assertion
        $response->assertOk();
        $this->assertDatabaseMissing('users', ['id' => $this->user->id]);
    }
}
