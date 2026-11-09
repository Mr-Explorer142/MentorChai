<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_routes_are_accessible(): void
    {
        $routes = [
            '/',
            '/about',
            '/contact',
            '/faq',
            '/terms',
            '/login',
            '/register/student',
            '/register/teacher',
            '/mentors',
            '/admin/login',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    public function test_home_page_returns_success(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function test_language_toggle_defaults_to_english(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('<html lang="en"', false)
            ->assertSee('id="language-toggle"', false)
            ->assertSee('cursor-pointer', false)
            ->assertSee('data-language-option="en"', false)
            ->assertSee('data-language-option="bn"', false)
            ->assertSee('aria-label="Switch to Bengali"', false);
    }

    public function test_mentor_directory_uses_a_responsive_card_grid(): void
    {
        $this->get('/mentors')
            ->assertOk()
            ->assertSee('Find your mentor')
            ->assertSee('max-w-[90rem]', false)
            ->assertSee('grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 2xl:grid-cols-3', false)
            ->assertSee('data-mobile-filter-drawer', false);
    }

    public function test_pages_and_navbar_follow_consistent_x_axis_padding(): void
    {
        $response = $this->get('/');
        $response->assertOk();
        $response->assertSee('px-4 sm:px-6 lg:px-8', false);

        $pages = ['/about', '/contact', '/faq', '/terms', '/mentors', '/login'];
        foreach ($pages as $page) {
            $this->get($page)
                ->assertOk()
                ->assertSee('px-4 sm:px-6 lg:px-8', false);
        }
    }
}
