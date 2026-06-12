<?php

namespace App\Observers;

use App\Models\Arrangement;
use Illuminate\Support\Facades\Storage;

class ArrangementObserver
{
    /**
     * Handle the Arrangement "created" event.
     */
    public function created(Arrangement $arrangement): void
    {
        //
    }

    public function updating(Arrangement $arrangement): void {
        if($arrangement->isDirty("images")) {
            $old = $arrangement->getOriginal("images") ?? [];
            $new = $arrangement->images ?? [];

            $toDelete = array_diff($old, $new);

            foreach($toDelete as $image) {
                Storage::disk("event_images")->delete($image);
            }
        }
    }

    /**
     * Handle the Arrangement "updated" event.
     */
    public function updated(Arrangement $arrangement): void
    {
        //
    }

    /**
     * Handle the Arrangement "deleted" event.
     */
    public function deleted(Arrangement $arrangement): void
    {
        if($arrangement->images) {
            foreach($arrangement->images as $image) {
                Storage::disk("event_images")->delete($image);
            }
        }
    }

    /**
     * Handle the Arrangement "restored" event.
     */
    public function restored(Arrangement $arrangement): void
    {
        //
    }

    /**
     * Handle the Arrangement "force deleted" event.
     */
    public function forceDeleted(Arrangement $arrangement): void
    {
        //
    }
}
