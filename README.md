# Order Management

Automate your ordering process with Order Management project.

## Feature List
* Fast and friendly quick search
* CRUD (custumers, products, categories, manufacturers, orders, cities and states)
* PDF reports
* Basic Authentication

## Technology Stack
* Yii2 Framework
* Widgets (Kartik)
* RESTful API
* PostgreSQL Database
* Bootstrap 3.x, jQuery, etc

## How to run this application

Open the command line and copy this repository:

```sh
git clone https://github.com/erickbogarin/orders.git
cd orders
```

### Running with Docker

```sh
docker-compose up -d
```
Go to http://localhost:8080 to see the app

### Manually Deploying

#### Requirement Environment

Make sure the following services are installed and running:
* PHP 5.4.0
* PostgreSQL

#### Setting up the PostgreSQL Database
Edit the file app/pedido/config/db.php:
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'username',
    'password' => 'password',
    'charset' => 'utf8',
];
```

#### Install via Composer
Within the project root folder path, copy the following commands bellow:

```sh
cd app/pedido/
php composer.phar install
php yii serve --port=8888
```
Go to http://localhost:8888 to see the app

## Yii2 Docs
http://www.yiiframework.com/doc-2.0/guide-README.html
