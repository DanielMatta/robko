<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SchoolClassroom;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SchoolClassController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    // $short_names = ClassroomController::class;
    {
        $shortnames = ClassroomController::getClassroomShortName();
        $schoolclassnames = SchoolClassController::getClassName();
        View::share('shortnames', $shortnames);
        View::share('schoolclassnames', $schoolclassnames);
        //
    }
}
