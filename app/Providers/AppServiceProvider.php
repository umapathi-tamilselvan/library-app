<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Member;
use App\Models\Librarian;
use Illuminate\Support\ServiceProvider;

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
    {

        User::created(function ($user) {
            User::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'password'=>$user->password,
   ]
            );
    });
    }
}
