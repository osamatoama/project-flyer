<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    use RefreshDatabase, DatabaseMigrations;    
    /** @test */
    public function it_click_on_button()
    {
        $this->browse(function (Browser $browser) {
                $user = create('App\User');
                $browser->loginAs($user)
                ->visit('/')
                ->assertSee('Project Flyer')
                ->click('.btn.btn-primary')
                ->assertPathIs('/flyers/create');
        });
    }

    /** @test */
    public function it_fill_the_flyer_form()
    {
        $this->browse(function (Browser $browser) {
                    $browser->loginAs(create('App\User'))
                    ->visit('/flyers/create')
                    ->type('street','street')
                    ->type('city', 'city')
                    ->type('zip', 'zip')
                    ->type('state','state')
                    ->type('price', 12345)
                    ->type('description', 'home for rent or sale')
                    ->press('Create Flyer')
                    ->assertPathIs('/flyers/zip/street')
                    ;
                     
        });
    }
}
