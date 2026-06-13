<?php

namespace App\Providers;

use App\Models\Arrangement;
use App\Models\Baptism;
use App\Models\Bouquet;
use App\Models\Eighteenth;
use App\Models\FuneralArrangement;
use App\Models\Thread;
use App\Models\Wedding;
use App\Observers\ArrangementObserver;
use App\Observers\BaptismObserver;
use App\Observers\BouquetObserver;
use App\Observers\EighteenthObserver;
use App\Observers\FuneralArrangementObserver;
use App\Observers\ThreadObserver;
use App\Observers\WeddingObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);

        Model::unguard();

        Bouquet::observe(BouquetObserver::class);
        Arrangement::observe(ArrangementObserver::class);
        FuneralArrangement::observe(FuneralArrangementObserver::class);
        Thread::observe(ThreadObserver::class);

        Wedding::observe(WeddingObserver::class);
        Baptism::observe(BaptismObserver::class);
        Eighteenth::observe(EighteenthObserver::class);
    }
}
