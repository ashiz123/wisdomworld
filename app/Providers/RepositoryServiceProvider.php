<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RepositoryInterface;
use App\Repositories\EducationInterface;
use App\Repositories\Eloquent\CommentRepository;
use App\Repositories\Eloquent\UserinfoRepository;
use App\Repositories\Eloquent\EducationInfoRepository;
use App\Repositories\Eloquent\PostRepository;
use App\Repositories\PostInterface;
use App\Repositories\Eloquent\ProfileRepository;
use App\Repositories\ProfileInterface;
use App\Repositories\CommentInterface;
use App\Repositories\Eloquent\LikeRepository;
use App\Repositories\LikeInterface;
use App\Repositories\TagInterface;
use App\Repositories\Eloquent\TagRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            RepositoryInterface::class,
            // To change the data source, replace this class name
            // with another implementation
            UserinfoRepository::class
            // EducationInfoRepository::class
         );

         $this->app->bind(
            EducationInterface::class,
            // To change the data source, replace this class name
            // with another implementation
            // UserinfoRepository::class,
            EducationInfoRepository::class
         );

         $this->app->bind(
             PostInterface::class,
             PostRepository::class
         );

         $this->app->bind(
            ProfileInterface::class,
            ProfileRepository::class
        );

        $this->app->bind(
            CommentInterface::class,
            CommentRepository::class
        );

        $this->app->bind(
            LikeInterface::class,
            LikeRepository::class
        );

        $this->app->bind(
            TagInterface::class,
            TagRepository::class
        );
    }
}
