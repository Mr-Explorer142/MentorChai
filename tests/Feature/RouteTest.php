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
}
