<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Flyers\CreateRequest as CreateFlyerRequest;
use App\Flyer;
use App\Events\Flyers\PhotoWasAddedToFlyer;

class FlyersControlller extends Controller
{
    public function __construct()
    {
        // allow guests to view all and individual flyer
        $this->middleware('auth', ['except' => ['index', 'show']]);

        $this->authorizeResource(Flyer::class, 'flyers', [
            // create is already protected by auth middleware
            'except' => ['index', 'show', 'store', 'create']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFlyerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFlyerRequest $request)
    {
        $flyer = auth()->user()->flyers()->create($request->validated());
        flash()->success("Done!", "the flyer has been created");
        return redirect($flyer->url());
    }

    /**
     * Display the specified flyer.
     *
     * @param  string  $zip
     * @param  string  $street
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::LocatedAt($zip, $street)->firstOrFail();
        return view('flyers.show', compact('flyer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * add photo to a flyer
     * @param Flyer $flyer
     * @fire PhotoWasAddedToFlyer
     * @return void
     */
    public function addPhoto(Flyer $flyer)
    {
        if ($this->checkForMaximumPhotosForEachFlyer($flyer)) {
            return response()->json('too over images for each flyer', 403);
        }

        $file =  request()->file('file');

        $file->storeAs(
            'public/flyers',
            $path = random_image_path($file)
        );


        PhotoWasAddedToFlyer::dispatch(
            $flyer->attachPhoto($path)
        );
    }

    /**
     * check if the photos for each flyer exceed the limit
     * @param  Flyer  $flyer
     * @return boolean
     */
    private function checkForMaximumPhotosForEachFlyer(Flyer $flyer)
    {
        $maxImagesForEachFlyer = config('flyer.max_images_for_each_flyer');
        $count  = $flyer->photos()->count();
        return $count >=  $maxImagesForEachFlyer ;
    }
}
