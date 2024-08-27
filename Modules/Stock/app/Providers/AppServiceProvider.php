<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Contracts\CategoryInterface;
use App\Contracts\MenuInterface;
use App\Contracts\OrderInterface;
use App\Services\CategoryService;
use App\Services\MenuService;
use App\Services\OrderService;
use App\Services\StockService;
use App\Contracts\StockInterface;
use App\Repositories\StockRepository;
use App\Repositories\MenuRepository;
use App\Repositories\OrderRepository;
use App\Repositories\CategoryRepository;
use App\Contracts\SubCategoryInterface;
use App\Contracts\ConsumableInterface;
use App\Services\ConsumableService;
use App\Repositories\ConsumableRepository;
use App\Services\SubCategoryService;
use App\Repositories\SubCategoryRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryService($app->make(CategoryInterface::class));
        });

        //binding subcategory interface to subcategory repository
        $this->app->bind(SubCategoryInterface::class, SubCategoryRepository::class);
        $this->app->bind(SubCategoryService::class, function ($app) {
            return new SubCategoryService($app->make(SubCategoryInterface::class));
        });
        $this->app->bind(ConsumableInterface::class, ConsumableRepository::class);
        $this->app->bind(ConsumableService::class, function ($app) {
            return new ConsumableService($app->make(ConsumableInterface::class));
        });

        $this->app->bind(StockInterface::class, StockRepository::class);
        $this->app->bind(StockService::class, function ($app) {
            return new StockService($app->make(StockInterface::class));
        });

        $this->app->bind(MenuInterface::class, MenuRepository::class);
        $this->app->bind(MenuService::class, function ($app) {
            return new MenuService($app->make(MenuInterface::class));
        });

        $this->app->bind(OrderInterface::class, OrderRepository::class);
        $this->app->bind(OrderService::class, function ($app) {
            return new OrderService($app->make(OrderInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
