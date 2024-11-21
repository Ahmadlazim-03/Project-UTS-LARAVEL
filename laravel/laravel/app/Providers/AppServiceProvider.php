<?php
namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\view\Composers\ComposeTable;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }
    public function boot(): void
    {
        View::composer('*', ComposeTable::class);
        Paginator::useBootstrap();
    }
}
