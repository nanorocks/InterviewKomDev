<?php

namespace App\Providers;

use App\Interfaces\IProjectsRepository;
use App\Interfaces\ITodosRepository;
use App\Interfaces\IUsersRepository;
use App\Repositories\ProjectsRepository;
use App\Repositories\TodosRepository;
use App\Repositories\UsersRepository;
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
        $this->app->bind(IProjectsRepository::class, ProjectsRepository::class);
        $this->app->bind(IUsersRepository::class, UsersRepository::class);
        $this->app->bind(ITodosRepository::class, TodosRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
