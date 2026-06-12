<?php

namespace App\Observers;

use App\Models\FuneralArrangement;
use Illuminate\Support\Facades\Storage;

class FuneralArrangementObserver
{
    /**
     * Handle the FuneralArrangement "created" event.
     */
    public function created(FuneralArrangement $funeralArrangement): void
    {
        //
    }

    public function updating(FuneralArrangement $funeralArrangement): void {
        if($funeralArrangement->isDirty("images")) {
            $old = $funeralArrangement->getOriginal("images") ?? [];
            $new = $funeralArrangement->images ?? [];

            $toDelete = array_diff($old, $new);

            foreach($toDelete as $image) {
                Storage::disk("event_images")->delete($image);
            }
        }
    }

    /**
     * Handle the FuneralArrangement "updated" event.
     */
    public function updated(FuneralArrangement $funeralArrangement): void
    {
        //
    }

    /**
     * Handle the FuneralArrangement "deleted" event.
     */
    public function deleted(FuneralArrangement $funeralArrangement): void
    {
        if($funeralArrangement->images) {
            foreach($funeralArrangement->images as $image) {
                Storage::disk("event_images")->delete($image);
            }
        }
    }

    /**
     * Handle the FuneralArrangement "restored" event.
     */
    public function restored(FuneralArrangement $funeralArrangement): void
    {
        //
    }

    /**
     * Handle the FuneralArrangement "force deleted" event.
     */
    public function forceDeleted(FuneralArrangement $funeralArrangement): void
    {
        //
    }
}
