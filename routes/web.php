<?php
// Laravelのファサード(Facade)を使うことでLaravel内のサービスを簡単に利用することができます。
// 複雑な依存関係を持つサービスもファサードを利用することでシンプルな記述で済む
// その前段階として、ファサードを理解するためには、事前にサービスコンテナの仕組みと
// サービスプロバイダーの設定方法を理解しておくことをおすすめしています
// サービスコンテナの理解を深める
// Laravel入門者でLaravelのコアであるサービスコンテナ(Service Container)を理解できている人はそれほど多くはありません。
// https://reffect.co.jp/laravel/laravel-service-container-understand
// サービスプロバイダーついに理解
// Laravelの開発者の中にも実は理解していない人や一度も利用した経験がないという人も多数いるはずです。
// https://reffect.co.jp/laravel/laravel-service-provider-understand
// ファサード(Facade)
// https://reffect.co.jp/laravel/laravel-facade-understanding
use Illuminate\Support\Facades\Route;//laravel9からは、おそらく直がき？

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
