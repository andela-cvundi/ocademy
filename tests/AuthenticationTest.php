<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test Regisering a new user.
     *
     * @return void
     */
    public function testUserRegistration()
    {
        $this->visit('/register')
            ->type('Christopher Vundi', 'name')
            ->type('christophervundi@gmail.com', 'email')
            ->type('password', 'password')
            ->type('password', 'password_confirmation')
            ->press('REGISTER')
            ->seePageIs('/profile/tutorials')
            ->see('Christopher Vundi')
            ->seeInDatabase('users', ['email' => 'christophervundi@gmail.com']);
    }

    /**
     * Test Login a user.
     *
     * @return void
     */
    public function testUserLogin()
    {
        $this->visit('/register')
            ->type('Christopher Vundi', 'name')
            ->type('christophervundi@gmail.com', 'email')
            ->type('password', 'password')
            ->type('password', 'password_confirmation')
            ->press('REGISTER')
            ->seePageIs('/profile/tutorials')
            ->visit('/logout')
            ->seePageIs('/')
            ->visit('/login')
            ->type('christophervundi@gmail.com', 'email')
            ->type('password', 'password')
            ->press('SIGN IN')
            ->seePageIs('/profile/tutorials')
            ->see('Christopher Vundi');
    }
}
