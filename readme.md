
# SmartOrder

[![CodeIgniter](https://img.shields.io/badge/CodeIgniter-3.1-green.svg)]()
[QRCode Library](http://phpqrcode.sourceforge.net/)

多国語対応
レストラン、ホーテルなど
スマートフォンオーダーシステム

## クライアント
    - テーブル上のQRコードをスキャンして起動する。
    - ブラウザー言語のメニューを表示
    - 注文
    - 注文結果

## サーバー
    - 注文をキッチンの端末 or プリンターへ表示
    - 料理
    - 料理完了

## POS機 or カウンター
    - テーブルのQRコードをスキャンして、注文一覧表示
    - 会計


# php
```sh
apt-get install php5-mcrypt
php5enmod mcrypt
apt-get install php5-gd
```

## Apache
```sh
a2enmod rewrite

<Directory /var/www/>
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Order allow,deny
    allow from all
</Directory>
```

config.php
```php

$config['base_url'] = 'http://yourdomain.com/';

```

```sh
chmod 777 ./web_root/static/upload
chmod 777 ./application/log
```