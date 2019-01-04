<?php

namespace Tests\Feature;

use App\Flyer;
use App\Photo;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Event;
use App\Events\Flyers\PhotoWasAddedToFlyer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhotoTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_add_a_photo_to_flyer_and_dispatch_event()
    {
        Event::fake();
        // should using Mock with uploaded file 
        $flyer = create('App\Flyer');
        $photo = create(Photo::class, ['path' => 'image.jpg', 'flyer_id' => $flyer->id]);
        $this->assertDatabaseHas('flyer_photos', [
            'flyer_id' => $flyer->id,
            'path' => 'image.jpg'
        ])
            ->assertCount(1, $flyer->photos);
        Event::assertDispatched(PhotoWasAddedToFlyer::class);
    }

    /** @test */
    public function it_delete_a_photo_from_flyer()
    {
        $flyer = create('App\Flyer');
        $photo = create(Photo::class, ['path' => 'image.jpg', 'flyer_id' => $flyer->id]);
        Passport::actingAs($flyer->user);
        $this->delete($photo->deletePath())->assertStatus(200);
        $this->assertCount(0, $flyer->photos);
    }
}
