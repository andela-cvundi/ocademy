<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class RoutesTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test landing page route.
     *
     * @return void
     */
    public function testLandingPage()
    {
        $this->visit('/')
            ->see('Ocademy');
    }

    /**
     * Test for register route.
     *
     * @return void
     */
    public function testRegisterRoute()
    {
        $this->visit('/register')
            ->see('Register');
    }

    /**
     * Test for login route.
     *
     * @return void
     */
    public function testLoginRoute()
    {
        $this->visit('/login')
            ->see('Login');
    }

    /**
     * Test for Dashboard route when not authenticated
     *
     * @return void
     */
    public function testDashboardRouteWithoutLogin()
    {
        $this->visit('/profile/settings')
            ->seePageIs('/login');
    }

    /**
     * Test route that does not exist
     *
     * @return void
     */
    public function testInvalidRoute()
    {
        $response = $this->call(
            'GET',
            '/gshjsjs'
        );
        $this->assertEquals(404, $response->status());
    }
}
