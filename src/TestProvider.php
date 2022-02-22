<?php

namespace Oh86\Test;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Oh86\Test\Command\Foo;

class TestProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('test', function ($app){
            return new Test(123);
        });
    }

    public function boot()
    {
        $pkg_dir = dirname(__DIR__);

        // echo sprintf("%s - %s\n", __METHOD__, $pkg_dir);

        // 配置文件（发布配置文件）
        $this->publishes([
            $pkg_dir . "/config/test.php" => config_path('test.php')
        ], "config");

        // 路由器（1）
        Route::get('/test/v1', function (Request $request){
            dd("v1", $request->all());
        });

        Route::get('test/v2', '\Oh86\Test\Controller\TestController@v2');

        // 路由器（2）
        $this->loadRoutesFrom($pkg_dir . "/route/route.php");

        // 数据库迁移（1）
        // 注意：迁移文件名必须遵循"php artisan make:migration"命令生成的文件名的格式，eg："xxx_xx_xx_xxxxxx_xxx.php"
        $this->loadMigrationsFrom($pkg_dir . "/migration");

        // 数据库迁移（2）
        // $this->publishes([
        //     $pkg_dir.'/migration/' => database_path('migrations')
        // ], 'migrations');

        // 命令（也可以不用判断是否在命令行执行）
        if ($this->app->runningInConsole()) {
            $this->commands([
                Foo::class,
            ]);
        }
    }
}