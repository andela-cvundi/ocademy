<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProfileUpdateTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test unauthenticated user cannot access the profile
     * update page
     *
     * @return void
     */
    public function testProfileUpdateWithoutAuth()
    {
        $this->visit('/profile/settings')
            ->seePageIs('/login');
    }

    /**
     * Test Profile Updating.
     *
     * @return void
     */
    public function testProfileUpdate()
    {
        $user = factory(Ocademy\User::class)->create();
        $this->actingAs($user)
            ->visit('/profile/settings')
            ->see('Personal info')
            ->type('Christopher Vundi', 'name')
            ->type('vickris', 'username')
            ->press('Save Changes')
            ->seeInDatabase('users', ['username' => 'vickris']);
    }
}
