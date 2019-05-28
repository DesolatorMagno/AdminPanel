<?php

namespace Tests\Feature;

use App\User;
use App\Company;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FileManagerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function fileGetContetUpload()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testFileRequestUploadSuccessful()
    {
        $company = Company::find(3);
        $user = User::first();
        $old = $company->logo;
        $file = UploadedFile::fake()->image('avatar.jpg');
        $response = $this->actingAs($user)->json('PUT', '/companies/3', [
            'log' => $file, 'name' => 'Telegramas'
        ]);
        $response->assertRedirect('/companies');
        $this->assertTrue($old == $company->logo);
        Storage::disk('images')->assertExists($old);
        Storage::disk('images')->assertMissing($old);

    }

    public function test_guess_user_can_not_view_list()
    {
        $response = $this->json('get', '/companies');
        $response->assertStatus(401);
    }

    public function test_auth_user_can_view_list()
    {
        $user = User::first();
        $response = $this->actingAs($user)->json('get', '/companies/');
        $response->assertStatus(200);
    }
}
