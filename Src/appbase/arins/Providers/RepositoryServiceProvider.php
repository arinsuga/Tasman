<?php

namespace Arins\Providers;

use Illuminate\Support\ServiceProvider;
//Repositories
use Arins\Repositories\BaseRepository;
use Arins\A0\Repositories\A0\A0Repository;
use Arins\Bo\Repositories\User\UserRepository;
use Arins\Bo\Repositories\UserAdmin\UserAdminRepository;
use Arins\Repositories\Producttype\ProducttypeRepository;
use Arins\Repositories\Productsubtype\ProductsubtypeRepository;
use Arins\Repositories\Product\ProductRepository;
use Arins\Repositories\Event\EventRepository;
use Arins\Repositories\News\NewsRepository;

//Models
use App\User;

//Models Arins
use Arins\Models\Producttype;
use Arins\Models\Productsubtype;
use Arins\Models\Product;
use Arins\Models\Event;
use Arins\Models\News;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(
        //     'Arins\Bo\Repositories\User\UserRepositoryInterface',
        //     'Arins\Bo\Repositories\User\UserRepository'
        // );

        //Base Repository
        // $this->app->bind(
        //     'Arins\Repositories\BaseRepositoryInterface',
        //     function()
        //     {
        //         $model = new User();
        //         $modelRepository = new BaseRepository($model);
        //         return $modelRepository;
        //     }
        // );

        //A0 Repository
        $this->app->bind(
            'Arins\A0\Repositories\A0\A0RepositoryInterface',
            function()
            {
                $model = new User();
                $modelRepository = new A0Repository($model);
                return $modelRepository;
            }
        );

        //User Repository
        $this->app->bind(
            'Arins\Bo\Repositories\User\UserRepositoryInterface',
            function()
            {
                $user = new User();
                $userRepository = new UserRepository($user);
                return $userRepository;
            }
        );

        //User Admin Repository
        $this->app->bind(
            'Arins\Bo\Repositories\UserAdmin\UserAdminRepositoryInterface',
            function()
            {
                $model = new User();
                $modelRepository = new UserAdminRepository($model);
                return $modelRepository;
            }
        );

        //Producttype
        $this->app->bind(
            'Arins\Repositories\Producttype\ProducttypeRepositoryInterface',
            function()
            {
                $model = new Producttype();
                $modelRepository = new ProducttypeRepository($model);
                return $modelRepository;
            }
        );

        //Productsubtype
        $this->app->bind(
            'Arins\Repositories\Productsubtype\ProductsubtypeRepositoryInterface',
            function()
            {
                $model = new Productsubtype();
                $modelRepository = new ProductsubtypeRepository($model);
                return $modelRepository;
            }
        );

        //Product
        $this->app->bind(
            'Arins\Repositories\Product\ProductRepositoryInterface',
            function()
            {
                $model = new Product();
                $modelRepository = new ProductRepository($model);
                return $modelRepository;
            }
        );

        //Event
        $this->app->bind(
            'Arins\Repositories\Event\EventRepositoryInterface',
            function()
            {
                $model = new Event();
                $modelRepository = new EventRepository($model);
                return $modelRepository;
            }
        );

        //News
        $this->app->bind(
            'Arins\Repositories\News\NewsRepositoryInterface',
            function()
            {
                $model = new News();
                $modelRepository = new NewsRepository($model);
                return $modelRepository;
            }
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
