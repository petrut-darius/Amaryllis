<?php

namespace App\Observers;

use App\Models\Baptism;
use Illuminate\Support\Facades\Storage;

class BaptismObserver
{
    /**
     * Handle the Baptism "created" event.
     */
    public function created(Baptism $baptism): void
    {
        //
    }

    public function updating(Baptism $baptism): void {
        if($baptism->isDirty("images")) {
            $old = $baptism->getOriginal("images") ?? [];
            $new = $baptism->images ?? [];

            $toDelete = array_diff($old, $new);

            foreach($toDelete as $image) {
                Storage::disk("event_images")->delete($image);
            }
        }
    }

    /**
     * Handle the Baptism "updated" event.
     */
    public function updated(Baptism $baptism): void
    {
        //
    }

    /**
     * Handle the Baptism "deleted" event.
     */
    public function deleted(Baptism $baptism): void
    {
        if($baptism->images) {
            foreach($baptism->images as $image) {
                Storage::disk("event_images")->delete($image);
            }
        }
    }

    /**
     * Handle the Baptism "restored" event.
     */
    public function restored(Baptism $baptism): void
    {
        //
    }

    /**
     * Handle the Baptism "force deleted" event.
     */
    public function forceDeleted(Baptism $baptism): void
    {
        //
    }
}
