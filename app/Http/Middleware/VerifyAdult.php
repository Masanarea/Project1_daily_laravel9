<?php
// ミドルウェアとは?
// コントローラー処理の前後に割り込んで。独自の処理を追加することができる機能
// 具体例
// リクエスト → ミドルウェア → アクション → ミドルウェア → レスポンス
//図解
// Laravel入門p114の図解がめっちゃわかりやすい！さすがです^ ^



namespace App\Http\Middleware;

// PHP 公式参照
use Closure;// 定義されていないが、Laravelでデフォルトで使える無名関数クラス
use Illuminate\Http\Request;

class VerifyAdult
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(リクエストの情報を管理する、Requestクラスのインスタンス, 無名クラス：Closureクラスのインスタンス)
    public function handle(Request $request, Closure $next)
    {
        // 指定のクエリにおいて、リダイレクトしたい場合
        if($request->checkAdult <= 18){
            return redirect('about');
        }

        // フォーム送信で送られてきた値(inputの値)に、情報を追加したい場合
        $data = [
            ["name" => "aaa", "mail" => "test@test.com"],
            ["name" => "bbb", "mail" => "test@test.com"],
            ["name" => "ccc", "mail" => "test@test.com"],
        ];
        $request->merge(["data" => $data]);//これによって、コントローラー側で、$request->dataで値を取り出すことができる
        // この前(リクエスト → ミドルウェア → アクション)に行いたい処理を書く
        // return $next($request);//デフォルトの記述。このままでは、$next($request) == レスポンスインスタンスなのでここでレスポンス処理後の独自処理が行えなくなってしまう。なので修正。また、これによってアプリへと送られるリクエスト(リクエストインスタンス)を作成できる
        $response = $next($request);//修正後
        // この後(アクション → ミドルウェア → レスポンス)に行いたい処理を書く
        $pattern = '/<middleware>(.*)<\/middleware>/i';
        $replace = '<a href="http://$1">$1</a>';
        $content = $response->content();//HTMLテキスト
        $content = preg_replace($pattern, $replace, $content);
        return $response;
    }
}
