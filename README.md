# group-system-niss

参考サイト

[Laravel 6.x パッケージ開発](https://readouble.com/laravel/6.x/ja/packages.html)

[自作ライブラリの管理（git＋composer）](https://www.wetch.co.jp/%E8%87%AA%E4%BD%9C%E3%83%A9%E3%82%A4%E3%83%96%E3%83%A9%E3%83%AA%E3%81%AE%E7%AE%A1%E7%90%86%EF%BC%88git%EF%BC%8Bcomposer%EF%BC%89/)

[【Laravel】パッケージ開発の第一歩 〜helloページを出力する〜](https://qiita.com/nasteng/items/350fb46d3f08479a7bcf#laravel%E3%82%A2%E3%83%97%E3%83%AA%E3%82%B1%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E5%81%B4%E3%81%AEcomposerjson%E3%82%92%E7%B7%A8%E9%9B%86)


## 開発環境での使い方

### 1. group-systemをクローン
https://github.com/ryosuzaki/group_system

### 2. packagesフォルダを作る

ファイル構成
- group-system
   - packages

### 3. packages下にクローン

ファイル構成
- group-system
   - packages
     - group-system-niss
       - ...
       - README.md
       - composer.json

### 4. group-system/composer.jsonに以下を追加

```
"repositories": [{
    "type": "path",
    "url": "./packages/group-system-niss",
    "options": {
        "symlink": true
    }
}],
```

### 5. group-system/で以下を実行

```
composer require ryosuzaki/group-system-niss

php artisan vendor:publish --provider="GroupSystem\Niss\NissServiceProvider"

php artisan migrate
```

### 6. 完了


## 本番環境での使い方

### 1. group-systemをクローン
https://github.com/ryosuzaki/group_system

### 2. group-system/で以下を実行

```
composer config repositories.group-system-niss vcs https://github.com/ryosuzaki/group-system-niss.git

composer require ryosuzaki/group-system-niss

php artisan vendor:publish --provider="GroupSystem\Niss\NissServiceProvider"

php artisan migrate
```

### 3. 完了


## 開発の仕方

### 1. 

### 2. 

### 3. 


## 削除の仕方(開発環境)

### 1. group-system/config/group_system_niss.phpを削除

### 2. group-system/で以下を実行

```
composer remove ryosuzaki/group-system-niss

//DBをリフレッシュしてもいい場合
php artisan migrate:fresh --seed
```

### 3. group-system/config/group_system.phpを変更

### 4. group-system/composer.jsonを変更

### 5. 完了


## 削除の仕方(本番環境)


### 1. group-system/config/group_system_niss.phpを削除

### 2. group-system/で以下を実行

```
composer remove ryosuzaki/group-system-niss

//DBをリフレッシュしてもいい場合
php artisan migrate:fresh --seed
```

### 3. group-system/config/group_system.phpを変更

### 4. 完了


