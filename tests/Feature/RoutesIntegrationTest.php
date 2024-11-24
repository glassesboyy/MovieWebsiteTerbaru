<?php

namespace Tests\Integration;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RoutesIntegrationTest extends TestCase
{
    // Menggunakan trait RefreshDatabase untuk memastikan database direset sebelum setiap test dijalankan
    use RefreshDatabase;

    /** @test */
    public function it_can_render_home_page_as_guest()
    {
        // Mengirimkan permintaan GET ke route '/' (halaman beranda)
        $response = $this->get('/');
        
        // Memastikan bahwa status respons adalah 200 (OK) dan tampilan yang dirender adalah 'home'
        $response->assertStatus(200)
                 ->assertViewIs('home');
    }

    /** @test */
    public function guest_can_access_register_page()
    {
        // Mengirimkan permintaan GET ke route '/register' (halaman pendaftaran)
        $response = $this->get('/register');
        
        // Memastikan bahwa status respons adalah 200 (OK) dan tampilan yang dirender adalah 'register'
        $response->assertStatus(200)
                 ->assertViewIs('register');
    }

    /** @test */
    public function registered_user_can_access_authenticated_routes()
    {
        // Membuat pengguna baru menggunakan factory
        $user = User::factory()->create();

        // Mengatur pengguna yang baru dibuat sebagai pengguna yang sedang login
        $this->actingAs($user);

        // Mengirimkan permintaan GET ke route '/home' (halaman beranda untuk pengguna yang sudah login)
        $response = $this->get('/home');
        
        // Memastikan bahwa status respons adalah 200 (OK) dan tampilan yang dirender adalah 'home'
        $response->assertStatus(200)
                 ->assertViewIs('home');
    }

    /** @test */
    public function guest_cannot_access_authenticated_routes()
    {
        // Mengirimkan permintaan GET ke route '/movies' (halaman yang memerlukan autentikasi)
        $response = $this->get('/movies');
        
        // Memastikan bahwa pengguna yang tidak terautentikasi diarahkan ke halaman login
        $response->assertRedirect('/login');
    }

    /** @test */
    public function fallback_route_returns_404_view()
    {
        // Mengirimkan permintaan GET ke route yang tidak ada
        $response = $this->get('/alamak');
        
        // Memastikan bahwa status respons adalah 404 (Not Found) dan tampilan yang dirender adalah 'errors.404'
        $response->assertStatus(404)
                 ->assertViewIs('errors.404');
    }
}