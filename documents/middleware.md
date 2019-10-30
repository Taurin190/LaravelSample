## ミドルウェア
[ミドルウェア](https://readouble.com/laravel/6.0/ja/middleware.html)を参照。

ミドルウェアは、一般的にはTomcatやApache HTTPサーバを想像するが、
Laravelでのミドルウェアはリクエスト処理を返す前後で修正することが出来る。

リクエストの前に認証を行なったり、
リクエストを返す前にログを残したりするのに使えそうで、
Springbootで言うとAOP(Aspect Oriented Programming)に近いと思う。

CLIから作成することも可能で、
以下のコマンドから作成することが出来る。

    php artisan make:middleware CheckAge

