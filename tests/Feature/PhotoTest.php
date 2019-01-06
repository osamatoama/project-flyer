<?php

namespace Tests\Feature;


use App\Flyer;
use App\Photo;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Event;
use App\Events\Flyers\PhotoWasAddedToFlyer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhotoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test dummy data for photo
     *
     * @param array $data
     * @return void
     */
    private function getStub(array $data = [])
    {
        return array_merge([
            'path' => 'image.jpg'
        ], $data);
    }

    /** @test */
    public function it_fetches_photos_from_api_and_apply_resource_encapsulation()
    {

        $flyer = create(Flyer::class);
        $photo = $flyer->photos()->create($this->getStub());

        $response = $this->json('GET', route('flyers.get_photos', [$flyer]))->assertStatus(200);
        $photo = $response->decodeResponseJson()[0]; // get  first result as array

        $this->assertArrayHasKey('path', $photo);

    }

    /** @test */
    public function it_add_a_photo_to_flyer_and_dispatch_event()
    {
        Event::fake();
        // should using Mock with uploaded file 
        $flyer = create('App\Flyer');
        $photo = create(Photo::class, $this->getStub(['flyer_id' => $flyer->id]));
        $this->assertDatabaseHas('flyer_photos', $this->getStub(['flyer_id' => $flyer->id]));
        $this->assertCount(1, $flyer->photos);
        Event::assertDispatched(PhotoWasAddedToFlyer::class);
    }

    /** @test */
    public function it_delete_a_photo_from_flyer()
    {
        $flyer = create('App\Flyer');
        $photo = create(Photo::class, $this->getStub(['flyer_id' => $flyer->id]));
        $this->signInWithPassport($flyer->user);
        $this->delete($photo->deletePath())->assertStatus(200);
        $this->assertCount(0, $flyer->photos);
    }
    /** @test */
    public function upload_photos_form_is_working_correctly()
    {
        $flyer = create('App\Flyer');
        $this->signInWithPassport($flyer->user);
        $maxImagesForEachFlyer = config('flyer.max_images_for_each_flyer');
        $response = $this->post(route('flyers.add_photo', [$flyer]), [
            'photo' => $this->getFakeUploadedFIle()
        ])->assertStatus(201);
        $photo = collect($response->decodeResponseJson());
        $path = $photo->get('path');
        $name = $this->getPhotoName($path);
        $this->assertFileExists(
            flyer_photo_path($name, false)
        );
        $this->assertEquals($flyer->id, $photo->get('flyer_id'));
        $this->assertCount(1, $flyer->photos);

        $this->deletePhoto($name);


    }

    /** @test */
    public function user_cannot_exceed_the_maximum_allowed_number_of_photos_added()
    {
        $flyer = create('App\Flyer');
        $this->signInWithPassport($flyer->user);
        $maxImagesForEachFlyer = config('flyer.max_images_for_each_flyer') + 1;
        foreach (range(1, $maxImagesForEachFlyer) as $time) {

            $response = $this->post(route('flyers.add_photo', [$flyer]), [
                'photo' => $this->getFakeUploadedFIle()
            ]);

            $photo = collect($response->decodeResponseJson());
            $path = $photo->get('path');
            if ($path) {
                $name = $this->getPhotoName($path);
                $this->deletePhoto($name);
            }

            if ($time === $maxImagesForEachFlyer) {
                $response->assertStatus(406);
                break;
            }

            $response->assertStatus(201);
        }

    }

    /**
     * create a new fake uploaded  file instance to use in http request
     *
     * @return UploadedFile
     */
    private function getFakeUploadedFile()
    {
        copy(
            __DIR__ . '/../Images/1.jpg',
            __DIR__ . '/../Stubs/1.jpg'
        );
        $path = __DIR__ . '/../Stubs/1.jpg';
        $original_name = '1.jpg';
        $mime_type = "image/jpg";
        $size = 2476;
        $error = null;
        $test = true;

        return new UploadedFile($path, $original_name, $mime_type, $size, $error, $test);
    }

    /**
     * delete photo after test
     *
     * @param string $name
     * @return void
     */
    private function deletePhoto(String $name)
    {
        File::delete(flyer_photo_path($name, false));
    }

    /**
     * return only the photo name from the full URL path
     *
     * @param string $path
     * @return string
     */
    private function getPhotoName(String $path)
    {
        $path = explode('/', $path);
        return end($path);
    }

}
