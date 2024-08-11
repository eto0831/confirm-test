# confirm-test

## 環境構築
Dockerのビルド
1.git@github.com:eto0831/confirm-test.git
2.docker-compose up -d -build

* MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

Laravel環境構築

1.docker-compose exec php bash
2.composer install
3.env.exampleファイルから.envを作成し、環境変数を変更
4.php artisan key:generate
5.php artisan migrate
6.php artisan db:seed

## 使用技術(実行環境)
- PHP 7.4.9
- Laravel 8.83.27
- MySQL 8.0.26

## ER図
![ユースケース図](.drawio.png)


## URL
- 開発環境：http://localhost/
- phpMyAdmin : http//localhost:8080/