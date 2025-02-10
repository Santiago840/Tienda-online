<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserDbTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */

    public function test_database_interaccion(): void {
        $this->assertDatabaseCount('users', 0);
        User::factory()->create();
        $this->assertDatabaseCount('users', 1);
    }

    public function test_example(): void
    {
        $this->assertTrue(true);
    }
}
