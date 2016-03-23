<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class TutorialTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test creation of a tutorial.
     *
     * @return void
     */
    public function testCreateTutorial()
    {
        $user = factory(Ocademy\User::class)->create();
        $category = factory(Ocademy\Category::class)->create();

        $this->actingAs($user)
        ->visit('/tutorials/create')
        ->type('First video', 'title')
        ->select($category->id, 'category')
        ->type('https://www.youtube.com/watch?v=DdCH6q5cNTk', 'url')
        ->type('Very first tutorial', 'description')
        ->press('Upload')
        ->seeInDatabase('tutorials', ['url' => 'DdCH6q5cNTk']);
    }

    /**
     * Test for viewing tutorial when clicked on.
     *
     * @return void
     */
    public function testViewTutorial()
    {
        $tutorial = factory(Ocademy\Tutorial::class)->create();

        $this->visit('/')
        ->see($tutorial->title)
        ->visit('/tutorials/'.$tutorial->id)
        ->see($tutorial->title);
    }

    /**
     * Test one cannot visit the edit tutotial
     * url when not logged in
     *
     * @return void
     */
    public function testVisitEditWithoutAuth()
    {
        $this->visit('/tutorials/1/edit')
        ->seePageIs('/login');
    }

    /**
     * Test for editing a tutorial when authenticated.
     *
     * @return void
     */
    public function testEdittutorial()
    {
        $title = 'Edit tut';
        $description = 'This ia a test description';
        $category = 1;
        $url = 'https://www.youtube.com/watch?v=DdCH6q5cNTk';

        $tutorial = factory(Ocademy\Tutorial::class)->create();
        $user = factory(Ocademy\User::class)->create();
        $response = $this->actingAs($user)->call(
            'PUT',
            'tutorials/'.$tutorial->id,
            [
                'title'       => $title,
                'description' => $description,
                'category'    => $category,
                'url'         => $url,
                '_token'      => csrf_token(),
            ]
        );

        $this->seeInDatabase('tutorials', ['title' => $title, 'description' => $description]);
    }

    /**
     * Test one cannot see delete button when not logged in
     *
     * @return void
     */
    public function testDeleteRequiresAuthentication()
    {
        $tutorial = factory(Ocademy\Tutorial::class)->create();

        $this->visit('/tutorials/'.$tutorial->id)
        ->dontSee('Delete');
    }

    /**
     * Test for deleting a tutorial.
     *
     * @return void
     */
    public function testDeleteTutorial()
    {
        $tutorial = factory(Ocademy\Tutorial::class)->create();
        $user = factory(Ocademy\User::class)->create();

        $this->seeInDatabase('tutorials', ['title' => $tutorial->title]);

        $response = $this->actingAs($user)
            ->call(
                'DELETE',
                '/tutorials/'.$tutorial->id
            );

        $this->visit('/')
            ->dontSee($tutorial->title)
            ->dontSeeInDatabase('tutorials', ['title' => $tutorial->title]);
    }

    /**
     * Test for commenting without Auth
     * Don't see submit button.
     *
     * @return void
     */
    public function testCommentWithoutAuth()
    {
        $tutorial = factory(Ocademy\Tutorial::class)->create();
        $user = factory(Ocademy\User::class)->create();
        $this->visit('/tutorials/'.$tutorial->id)
            ->dontSee('Submit');
    }



    /**
     * Test for commenting on tutorial when logged in
     *
     * @return void
     */
    public function testCommentOnTutorial()
    {
        $tutorial = factory(Ocademy\Tutorial::class)->create();
        $user = factory(Ocademy\User::class)->create();
        $comment = 'This is a test comment';

        $this->actingAs($user)
            ->call(
                'POST',
                '/tutorials/comment',
                [
                    'comment'    => $comment,
                    '_token'     => csrf_token(),
                    'video_id' => $tutorial->id,
                ]
            );

        $this->seeInDatabase('comments', ['comment' => $comment]);
    }
}
