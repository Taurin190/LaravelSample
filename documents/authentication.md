## 認証の作成について
LaravelにはdefaultでauthenticationをCLIで作成する機能がついていた。
defaultで入っているUserのオブジェクトクラスと以下のコマンドでファイルを作成できる。

    php artisan make:auth

このコマンド実行で、
`resources/views`以下に`auth`ディレクトリにViewが作成され、
`app/Http/Controllers`以下にも`HomeController.php`が作成される。

既に、データベースを作成している場合はそのままで使える。


ログインした場合は、cookieに`laravel_session`と言うcookieが作成され、
セッションは、`config/session.php`で設定することができdefaultでは
`driver`に`file`が設定されている。

セッションファイルは、`storage/framework/sessions`に保存される。
