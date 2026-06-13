<?php

namespace App\Observers;

use App\Models\Eighteenth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class EighteenthObserver
{
    /**
     * Handle the Eighteenth "created" event.
     */
    public function created(Eighteenth $eighteenth): void
    {
        Cache::forget('eighteenths');
    }

    public function updating(Eighteenth $eighteenth): void
    {
        if ($eighteenth->isDirty('images')) {
            $old = $eighteenth->getOriginal('images') ?? [];
            $new = $eighteenth->images ?? [];

            $toDelete = array_diff($old, $new);

            foreach ($toDelete as $image) {
                Storage::disk('event_images')->delete($image);
            }
        }

        Cache::forget('eighteenths');
    }

    /**
     * Handle the Eighteenth "updated" event.
     */
    public function updated(Eighteenth $eighteenth): void
    {
        Cache::forget('eighteenths');
    }

    /**
     * Handle the Eighteenth "deleted" event.
     */
    public function deleted(Eighteenth $eighteenth): void
    {
        if ($eighteenth->images) {
            foreach ($eighteenth->images as $image) {
                Storage::disk('event_images')->delete($image);
            }
        }

        Cache::forget('eighteenths');
    }

    /**
     * Handle the Eighteenth "restored" event.
     */
    public function restored(Eighteenth $eighteenth): void
    {
        //
    }

    /**
     * Handle the Eighteenth "force deleted" event.
     */
    public function forceDeleted(Eighteenth $eighteenth): void
    {
        //
    }
}
