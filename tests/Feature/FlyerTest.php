<?php

namespace Tests\Feature;

use App\User;
use App\Flyer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FlyerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test dummy data for flyer
     *
     * @param array $data
     * @return void
     */
    private function getStub(array $data = [])
    {
        return array_merge([
            'street' => 'street',
            'city' => 'city',
            'country' => 'country',
            'zip' => 'zip',
            'state' => 'state',
            'price' => '10',
            'description' => 'description'
        ], $data);
    }

    /** @test */
    public function the_home_page_is_loaded_correctly()
    {
        $this->get('/')->assertStatus(200);
    }


    /** @test */
    public function redirect_guest_when_visit_a_create_flyer_page()
    {
        $this->get('/flyers/create')->assertRedirect('/login');
    }
    /** @test */
    public function only_auth_user_can_visit_a_create_flyer_page()
    {
        $this->signIn();
        $this->get('/flyers/create')->assertStatus(200);
    }

    /** @test */
    public function auth_user_can_create_flyer_and_redirect_to_the_created_flyer()
    {
        $this->signIn();
        $this->post('/flyers', $this->getStub())->assertRedirect('/flyers/zip/street');
        $this->assertCount(1, Flyer::all());
        $flyer = Flyer::first();
        $this->assertEquals($flyer->user_id, auth()->id());
    }

    /** @test */
    public function it_redirect_back_if_the_flyer_validation_not_passes()
    {
        $this->signIn();
        // first we should go to the create flyer page to redirect as back 
        // or we will redirect to the root path
        $this->get('/flyers/create');
        $this->post('/flyers', $this->getStub(['street' => '']))->assertRedirect('/flyers/create');
        $this->assertDatabaseMissing('flyers', $this->getStub());
    }



    /** @test */
    public function auth_user_create_flyer_and_assign_the_id_to_him()
    {
        $firstUser = factory(User::class)->create();
        $secondUser = factory(User::class)->create();
        $this->signIn($firstUser);
        $flyer = factory(Flyer::class)->create([
            'user_id' => $firstUser->id
        ]);
        $this->assertEquals($flyer->user_id, auth()->id());
        $this->assertNotEquals($flyer->user_id, $secondUser->id);
    }

    /** @test */
    public function a_user_can_delete_his_flyer()
    {
        $flyer = create(Flyer::class);
        $this->signIn($flyer->user);
        $this->delete(route('flyers.destroy', [$flyer]))->assertStatus(302)->assertRedirect('/');
        $this->get($flyer->url())->assertStatus(404);
        $this->get(route('flyers.get_photos', [$flyer]))->assertStatus(404);
        $this->assertDatabaseMissing('flyers', $flyer->all()->toArray());
    }




}
