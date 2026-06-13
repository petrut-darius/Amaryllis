<?php

namespace App\Observers;

use App\Models\Wedding;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class WeddingObserver
{
    /**
     * Handle the Wedding "created" event.
     */
    public function created(Wedding $wedding): void
    {
        Cache::forget('weddings');
    }

    public function updating(Wedding $wedding): void
    {
        if ($wedding->isDirty('images')) {
            $old = $wedding->getOriginal('images');

            $toDelete = array_diff($old, $wedding->images);

            foreach ($toDelete as $image) {
                Storage::disk('event_images')->delete($image);
            }
        }

        Cache::forget('weddings');
    }

    /**
     * Handle the Wedding "updated" event.
     */
    public function updated(Wedding $wedding): void
    {
        Cache::forget('weddings');
    }

    /**
     * Handle the Wedding "deleted" event.
     */
    public function deleted(Wedding $wedding): void
    {
        if ($wedding->images) {
            foreach ($wedding->images as $image) {
                Storage::disk('event_images')->delete($image);
            }
        }

        Cache::forget('weddings');
    }

    /**
     * Handle the Wedding "restored" event.
     */
    public function restored(Wedding $wedding): void
    {
        //
    }

    /**
     * Handle the Wedding "force deleted" event.
     */
    public function forceDeleted(Wedding $wedding): void
    {
        //
    }
}
