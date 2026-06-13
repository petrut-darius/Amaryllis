<?php

namespace App\Observers;

use App\Models\Thread;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ThreadObserver
{
    /**
     * Handle the Thread "created" event.
     */
    public function created(Thread $thread): void
    {
        Cache::forget('threads');
    }

    public function updating(Thread $thread): void
    {
        if ($thread->isDirty('images')) {
            $old = $thread->getOriginal('images') ?? [];
            $new = $thread->images ?? [];

            $toDelete = array_diff($old, $new);

            foreach ($toDelete as $image) {
                Storage::disk('event_images')->delete($image);
            }
        }

        Cache::forget('threads');
    }

    /**
     * Handle the Thread "updated" event.
     */
    public function updated(Thread $thread): void
    {
        Cache::forget('threads');
    }

    /**
     * Handle the Thread "deleted" event.
     */
    public function deleted(Thread $thread): void
    {
        if ($thread->images) {
            foreach ($thread->images as $image) {
                Storage::disk('event_images')->delete($image);
            }
        }

        Cache::forget('threads');
    }

    /**
     * Handle the Thread "restored" event.
     */
    public function restored(Thread $thread): void
    {
        //
    }

    /**
     * Handle the Thread "force deleted" event.
     */
    public function forceDeleted(Thread $thread): void
    {
        //
    }
}
