## ユニットテストについて
テストは`./vendor/bin/phpunit`にあるためこれを実施すれば出来る。
各種設定は、`phpunit.xml`に記載されている。

CLIで以下を実施時にはtests/Feature以下にテストが追加される。

    php artisan make:test HomeTest

`--unit`のオプションを付けるとtests/Unit以下にテストが追加される。

    php artisan make:test HomeTest --unit

### ログイン状態をどう再現するか
コントローラーのテストを書く時に、
ログイン状態の挙動を確認するために、
ログインしている状態を作る必要がある。


ログインは、`config/auth.php`で決めた方法でユーザの認証が行われる。
セッションをRedisに持ってCookieと照合する。

Cookieは、`app/Http/Middleware/EncryptCookies.php`で暗号化されているので、
擬似的に持つCookieも暗号化されたものである必要がある。



### 参考
https://qiita.com/shindex512/items/4f28f8e06ef2d10e8d2b
