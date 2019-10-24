# Laravelについて
2011年より開発が始められたPHPのためのWebアプリケーションフレームワークで、
マイクロソフトの.NETの開発にも関係したTaylor Otwellが開発し、
OSSコミュニティーで積極的な開発が行われているフレームワークである。

現在（2019年）において複数の記事の中でもPHPで最も人気のあるフレームワークとして紹介されている。

### 参考記事
- https://ja.wikipedia.org/wiki/Laravel
- https://www.sejuku.net/blog/4016
- https://rightcode.co.jp/blog/become-engineer/php-framework
- https://www.seleqt.net/programming/best-php-framework-2019/

## Laravelの特徴について

## ドキュメント
Laravelの公式ドキュメントで、学んだことをドキュメントに残す

### ライフサイクル
[ライフサイクルの章](https://readouble.com/laravel/6.0/ja/lifecycle.html)を参照。

アプリケーションのライフサイクルは、以下の流れである。
1. `public/index.php`を最初に呼び出し
1. `index.php`において、`bootstrap/app.php`を呼び出して、カーネルを取り出す
1. カーネルからレスポンスを取り出し終了する

`bootstrap/app.php`を参照するとsingletonで返している。
そのため、Karnelの部分は単一のインスタンスで処理を行なっている。
