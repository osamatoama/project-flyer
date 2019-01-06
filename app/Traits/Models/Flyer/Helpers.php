<?php
namespace App\Traits\Models\Flyer;

trait Helpers
{

    /**
     * get the URL to single flyer
     * @return string
     */
    public function url()
    {
        $street = str_replace(' ', '-', $this->street);
        return route('flyers.show', [$this->zip, $street]);
    }

    /**
     * determine if the flyer owned by the current auth user (to be used in Vue)
     * @return boolean
     */
    public function ownedByAuthUser()
    {
        $user = auth()->user();
        return $user && $user->can('delete', $this) ? 'can' : 'cannot';
    }
    /**
     * create new photo and attach it to the flyer
     * @param  string $path
     * @return $this
     */
    public function createAndAttachPhoto($path)
    {
        return $this->photos()->create(compact('path'));
    }

    /**
     * overwrite the original delete method to delete the related photos
     * @return void
     */
    public function delete()
    {
        foreach ($this->photos as $photo) {
            $photo->delete();
        }
        parent::delete();
    }
}
