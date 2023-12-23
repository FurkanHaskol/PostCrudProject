<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use Database\Factories\PostFactory;

class PostControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */

     /** @test */
     public function it_deletes_a_post()
     {
         $post = Post::factory()->create();
 
         $response = $this->delete("/posts/delete/{$post->id}");
 
         $response->assertStatus(200);
 
         $this->assertDatabaseMissing('posts', [
             'id' => $post->id,
         ]);
     }
 
     public function it_adds_a_post_and_sends_emails()
     {
         $user = User::factory()->create();
 
         $response = $this->actingAs($user)->post('/posts/add', [
             'post_title' => 'Test Post',
             'post_description' => 'This is a test post description',
             'category' => 1, // Kategori ID
         ]);
 
        
         $response->assertStatus(200);
 
       
         $this->assertDatabaseHas('posts', [
             'title' => 'Test Post',
             'description' => 'This is a test post description',
             'user_id' => $user->id,
             'category_id' => 1,
         ]);
 
        
         Mail::assertSent(InfoMailToUsers::class, function ($mail) use ($user) {
             return $mail->hasTo($user->email);
         });
 
     
     }
}
