## Local環境の作成について
### 他のPCでの起動時の注意点
- .envファイルはDefaultで管理されていないので、正常に起動しなくなる。
  - `config/app.php`の設定が反映されて本番の設定で起動する
  - .envファイルを.env.exampleからコピーして使える
  - .envに`APP_KEY`が設定されていないので、`php artisan key:generate`で生成する

### LaravelとVue.jsを組み合わせて開発する注意点
以下の記事に従い設定を行うとLaravelとVue.jsを組み合わせて開発をすることが出来る。
https://qiita.com/fruitriin/items/e0f2c9aa035c3ff2c874

注意点は、以下です。
- LaravelとVue.jsのコンパイルと起動は別途行う必要がある。
- `npm run hot`でリアルタイムの反映するには、jsの呼び方を記事にあるように、`mix('js/app.js')`に変更する必要がある。
