<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Contracts\Auth\Authenticatable;
use \Mockery as m;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeControllerTest extends TestCase
{
    protected $userMock;

    public function setUp(): void
    {
        parent::setUp();
        $user = new \App\User();
        $this->userMock = m::mock(Authenticatable::class);
//        $this->userMock = m::mock('\App\User')->makePartial();
//        $this->userMock->shouldReceive("create")->andReturn($user);
    }
    public function tearDown(): void
    {
        parent::tearDown();
        m::close();
    }
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testNotLogin()
    {
        $response = $this->get(route('home'));
        $response->assertStatus(302);
        $response->assertLocation("/login");
    }

    public function testLoginHome()
    {
        $this->app->instance('Illuminate\Auth\Manager', $this->getAuthMock(false));
        $response = $this->actingAs($this->userMock)
            ->get(route('home'));
        $response->assertOk();
        $response->assertLocation("/home");
    }

    public function testLoginHome2()
    {
        $this->app->instance('Illuminate\Auth\Manager', $this->getAuthMock(false));
        $response = $this->actingAs($this->userMock)
            ->get(route('home'));
        $response->assertOk();
        $response->assertLocation("/home");
    }

    protected function getAuthMock($isLoggedIn = false)
    {
        $authMock = m::mock('Illuminate\Auth\Manager');
        $authMock->shouldReceive('check')->once()->andReturn($isLoggedIn);
        $authMock->shouldReceive('attempt')->once()->andReturn(true);
        return $authMock;
    }

    protected function getMocks()
    {
        return [
            m::mock(Session::class),
            m::mock(UserProvider::class),
            Request::create('/', 'GET'),
            m::mock(CookieJar::class),
        ];
    }
}
