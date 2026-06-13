<?php

namespace App\Observers;

use App\Models\Bouquet;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class BouquetObserver
{
    /**
     * Handle the Bouquet "created" event.
     */
    public function created(Bouquet $bouquet): void
    {
        Cache::forget('bouquets');
    }

    public function updating(Bouquet $bouquet): void
    {
        // verifica daca campului images i s-a schimbat valoarea
        if ($bouquet->isDirty('images')) {

            // da valoarea din db care era inainte sa se schimbe
            $old = $bouquet->getOriginal('images');

            if ($old) {
                Storage::disk('event_images')->delete($old);
            }
        }

        Cache::forget('bouquets');
    }

    /**
     * Handle the Bouquet "updated" event.
     */
    public function updated(Bouquet $bouquet): void
    {
        Cache::forget('bouquets');
    }

    /**
     * Handle the Bouquet "deleted" event.
     */
    public function deleting(Bouquet $bouquet): void
    {
        if ($bouquet->images) {
            Storage::disk('event_images')->delete($bouquet->images);
        }

        Cache::forget('bouquets');
    }

    /**
     * Handle the Bouquet "restored" event.
     */
    public function restored(Bouquet $bouquet): void
    {
        //
    }

    /**
     * Handle the Bouquet "force deleted" event.
     */
    public function forceDeleted(Bouquet $bouquet): void
    {
        //
    }
}
