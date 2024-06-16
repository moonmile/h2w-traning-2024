# ハンバーガー注文サイトの web api

## mysql の準備

```
create database mos ;
create user 'mos'@'localhost' identified by 'mos';
grant all privileges on mos.* to 'mos'@'localhost';
```

## プロジェクトの復帰

```
composer install
```

## プロジェクト作成

```
composer create-project laravel/laravel webapi
```

## 実行

```
php artisan serve
```

## モデル作成

.env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mos
DB_USERNAME=mos
DB_PASSWORD=mos

```

モデル作成
```
php artisan make:model Category -m
```

マイグレーション
```
php artisan migrate
```

Windows 上では、以下の☆を修正

config/database.php
```
        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => 'InnoDB ROW_FORMAT=DYNAMIC',    // ☆
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
```

## 新しいモデルを作成する

```
php artisan make:migration create_flights_table
```

## コントローラーの作成

```
php artisan make:controller ApiCategoryController --model=Category
```

## 初期データの作成

```
php artisan make:seeder CategoryTableSeeder
```

シーダーの実行
```
php artisan db:seed
```

## ルーティング

```
php artisan route:list
```

routes/api.php
```
Route::apiResource('categories', ApiCategoryController::class);
```


動作チェック

```
http://localhost:8000/api/categories
```

## openapi(swagger) の利用


パッケージのインストール
```
composer require darkaonline/l5-swagger
```

l5-swagger.php の設定
```
php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
```

openapi-generator-cli のインストール
```
npm install -g @openapitools/openapi-generator-cli
```

モデルとコントローラーの生成
```
openapi-generator-cli generate -i openapi/categories.yaml -g php-laravel -o path_to_laravel_project
```

## 画像データの利用

strage/app/public/images/*.jpeg に画像ファイルが配置される。

以下で、シンボリックリンクを作成を作成する。
```
php artisan storage:link
```

public/strage が storage\app\public にリンクされる。

vue3 からは以下でアクセスする

```
'http://localhost:8000/storage/images/' + item.value.image + ".jpeg";
```

