## ユニットテストについて
テストは`./vendor/bin/phpunit`にあるためこれを実施すれば出来る。
各種設定は、`phpunit.xml`に記載されている。

CLIで以下を実施時にはtests/Feature以下にテストが追加される。

    php artisan make:test HomeTest

### 参考
https://qiita.com/shindex512/items/4f28f8e06ef2d10e8d2b
