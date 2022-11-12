<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //ここにサービスコンテナを登録
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()//ブートストラップ処理を記述する部分で、アプリケーションが実行される際に割り込んで実行される処理
    {
        //ここにビューコンポーザーの処理を記述
    }
}
