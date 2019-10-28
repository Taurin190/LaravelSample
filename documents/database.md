## Databaseの設定
[データベースの準備](https://readouble.com/laravel/6.0/ja/database.html)の章を参照。
サンプルでは、sqliteについて記載されている。

defaultで`config/database.php`に各データベースの接続サンプルが用意されていて、
ローカルに用意したMySQLのdockerに接続するために大きく設定を変更する必要はなさそうであるが、
`[connections][mysql][url]`は環境変数を使用する設定になっているので、
default値を入れるか、環境変数を設定する必要がある。

ローカル環境を用意する時に、環境変数を設定する手順をreadmeに書いて実施してもらうのも、
良い方法とは思えないのでdefaultに設定するのが無難だと思う。

## マイグレーション
[マイグレーション](https://readouble.com/laravel/6.0/ja/migrations.html)
の章を参照。
CLIでプロジェクト作成時に、デフォルトでマイグレーションのファイルが作成されていて利用することができる。

    php artisan migrate
    
このコマンドで最初に用意されたマイグレーションファイルを実施して
テーブルの作成できる。

実行した結果が以下で、データベースがないとエラーが出る。

    ❯ php artisan migrate
    
       Illuminate\Database\QueryException  : SQLSTATE[HY000] [1049] Unknown database 'forge' (SQL: select * from information_schema.tables where table_schema = forge and table_name = migrations and table_type = 'BASE TABLE')
   
データベース`forge`を作成して再度実行すると以下のような結果が得られる。
   
    ❯ php artisan migrate
    Migration table created successfully.
    Migrating: 2014_10_12_000000_create_users_table
    Migrated:  2014_10_12_000000_create_users_table (0.04 seconds)
    Migrating: 2014_10_12_100000_create_password_resets_table
    Migrated:  2014_10_12_100000_create_password_resets_table (0.04 seconds)

逆にロールバックする時は、以下のコマンドでデータベースを戻すことが出来る。

    php artisan migrate:rollback

しかし、一つずつ戻すのでなくまとめてロールバックしたい場合は、以下を使える。

    php artisan migrate:rollback --step=5

そして全部一気に戻したい場合には、以下のマイグレーションを戻すコマンドを使用する。

    php artisan migrate:reset



