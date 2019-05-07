
# 環境構築
Name | Version
:-- | :--
PHP | 7.1.x
Mysql | 5.7.x

## mac 環境構築
### home brewのインストール
home brewをインストールしていなければ下記のコマンドを実行してインストールをする
```
/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
```
[Homebrew](https://brew.sh/index_ja)
### phpの確認
```
$php -v
PHP 7.1.x (cli) (built: Nov  7 2018 18:20:35) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.1.0, Copyright (c) 1998-2018 Zend Technologies
```
上記のコマンドを行い、phpが7.x.xがインストールされていれば良い。一番は7.1.xがインストールされていることが好ましい

もしphpのバージョンが5系の場合はhome brew等を使い7系にアップデートを行う。以下のサイトを参考にしても良い。

[MacのPHP5をPHP7にbrewでアップデートする](https://qiita.com/yamatmoo/items/4ff2fe1785f771e67e08)

### mysqlのインストール
下記のサイトを参考にmacにmysqlをインストールする
```
https://blanche-toile.com/web/mac-mysql
```
また**MAMP**等のLAMPアプリケーションを使用しても良い

[MAMPダウンロードサイト](https://www.mamp.info/en/)

## 開発環境を立ち上げる
### Mysql
各々、追加mysqlを立ち上げる。その時のホスト名、ポート番号、ユーザ、パスワードは以下に設定しておくこと。

 Name | Body
 :-- | :--
 Host | 127.0.0.1
 Port | 3306
 UserName | root
 PassWord | root

次に以下のコマンドを実行し、mysqlに接続する
```
$mysql -u root -p
```
データベースを作成する。
```
create database Sociaria
```

### Laravel
Gitからクローンしたら以下のコマンドを実行してマイグレーションを行う。
```
php artisan migrate
```

サーバーを立てる時は以下のコマンドを実行すれば良い
```
php artisan serve
```
