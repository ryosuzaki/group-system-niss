# group-system-sample-package

参考サイト

[自作ライブラリの管理（git＋composer）](https://www.wetch.co.jp/%E8%87%AA%E4%BD%9C%E3%83%A9%E3%82%A4%E3%83%96%E3%83%A9%E3%83%AA%E3%81%AE%E7%AE%A1%E7%90%86%EF%BC%88git%EF%BC%8Bcomposer%EF%BC%89/)

[【Laravel】パッケージ開発の第一歩 〜helloページを出力する〜](https://qiita.com/nasteng/items/350fb46d3f08479a7bcf#laravel%E3%82%A2%E3%83%97%E3%83%AA%E3%82%B1%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E5%81%B4%E3%81%AEcomposerjson%E3%82%92%E7%B7%A8%E9%9B%86)






## このパッケージの使い方

### 1. group-system/で以下を実行
```
composer config repositories.group-system-sample-package vcs https://github.com/ryosuzaki/group-system-sample-package.git

composer require ryosuzaki/group-system-sample-package

php artisan migrate

php artisan db:seed --class=GroupSystem\\Sample\\Seeds\\SampleSeeder

php artisan serve
```
### 2. [http://127.0.0.1:8000/sample/index](http://127.0.0.1:8000/sample/index)にアクセス
### 3. 画像のように表示出来れば成功

![image](https://user-images.githubusercontent.com/71608299/140604876-c0981eaf-04b9-4b3b-84c2-df8e065e6140.png)








## 他パッケージ開発時の使い方
### 1. このパッケージをダウンロード
### 2. group-system/packages/group-system-sample-packageに配置

ファイル構成
- group-system
   - packages
     - group-system-sample-package
       - ...
       - README.md
       - composer.json


### 3. sampleを変更(今回はexampleに変更)

- group-system
   - packages
     - group-system-example
       - ...
       - README.md
       - composer.json

### 4. group-system-example/composer.jsonを適宜変更

### 5. SampleServiceProvider.phpの名称をExampleServiceProvider.phpに、内容も適宜変更

### 6. その他のファイルも名称、内容を適宜変更

### 7. パッケージ開発を行う

### 8. group-system/composer.jsonに以下を追加

```
"repositories": [{
    "type": "path",
    "url": "./packages/group-system-example",
    "options": {
        "symlink": true
    }
}],
```

### 9. group-system/で以下を実行

```
composer require ryosuzaki/group-system-example
```


