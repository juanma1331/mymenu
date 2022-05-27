<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_all_the_products()
    {
        $this->createAuthenticatedUser();

        $response = $this->get(route('products.index'));

        $response->assertViewHas(['products']);
        $response->assertViewIs('products.index');
        $response->assertStatus(200);
    }

    public function test_user_can_see_product_form()
    {
        $this->createAuthenticatedUser();

        $response = $this->get(route('products.create'));

        $response->assertViewIs('products.create');
        $response->assertStatus(200);
    }

    public function test_user_can_create_product()
    {
        $this->createAuthenticatedUser();
        Storage::fake('local');
        $file = UploadedFile::fake()->image('img.jpg');

        $response = $this->post(route('products.store'), [
            'name' => 'testname',
            'description' => 'test description',
            'price' => 1000,
            'image' => $file
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseHas('products', ['name' => 'testname']);
        Storage::disk('local')->assertExists("product_images/{$file->hashName()}");
    }

    public function test_user_can_see_edit_form()
    {
        $user = $this->createAuthenticatedUser();
        Storage::fake('local');
        $file = UploadedFile::fake()->image('img.jpg');
        $product = $user->products()->create([
            'name' => 'testname',
            'description' => 'test description',
            'price' => 1000,
            'image' => $file
        ]);

        $response = $this->get(route('products.edit', ['product' => $product->id]));

        $response->assertViewIs('products.edit');
        $response->assertStatus(200);
    }

    public function test_user_can_update_product()
    {
        $user = $this->createAuthenticatedUser();
        Storage::fake('local');
        $file = UploadedFile::fake()->image('img.jpg');
        $product = $user->products()->create([
            'name' => 'testname',
            'description' => 'test description',
            'price' => 1000,
            'image' => $file
        ]);

        $updatedFile = UploadedFile::fake()->image('newimg.jpg');
        $response = $this->patch(route('products.update', ['product' => $product->id]), [
            'name' => 'newname',
            'description' => 'newdescription',
            'price' => 1500,
            'image' => $updatedFile
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseHas('products', ['name' => 'newname']);
        $this->assertDatabaseHas('products', ['description' => 'newdescription']);
        $this->assertDatabaseHas('products', ['price' => 1500]);
        Storage::disk('local')->assertExists("product_images/{$updatedFile->hashName()}");
        // Check the last product image was removed
        Storage::disk('local')->assertMissing("product_images/{$file->hashName()}");
    }

    public function test_user_can_delete_product()
    {
        $user = $this->createAuthenticatedUser();
        Storage::fake('local');
        $file = UploadedFile::fake()->image('img.jpg');
        $product = $user->products()->create([
            'name' => 'testname',
            'description' => 'test description',
            'price' => 1000,
            'image' => $file
        ]);

        $response = $this->delete(route('products.destroy', ['product' => $product->id]));

        $response->assertStatus(302);
        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseCount('products', 0);
    }

    private function createAuthenticatedUser(): User
    {
        $user = User::factory()->create([
            'email'=> 'testmail@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);

        $this->actingAs($user);

        return $user;
    }
}
