## Local環境の作成について
### 他のPCでの起動時の注意点
- .envファイルはDefaultで管理されていないので、正常に起動しなくなる。
  - `config/app.php`の設定が反映されて本番の設定で起動する
  - .envファイルを.env.exampleからコピーして使える
  - .envに`APP_KEY`が設定されていないので、`php artisan key:generate`で生成する
