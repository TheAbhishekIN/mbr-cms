<p align="center">MBR CMS</p>

## About MBR CMS

    MBR CMS is simple multipage cms with Laravel 10 + Livewire + Tailwind Css + alpinejs


## Requirements
- PHP >= 8.1
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- Fileinfo PHP Extension
- GD Library
- Imagick PHP Extension

## Installation

Clone this repo
`git clone https://github.com/TheAbhishekIN/mbr-cms.git`

install composer dependencies
`composer install`

copy `.env.example` file to `.env`

Generate application key using artisan command
`php artisan key:generate`

Update database credentials in `.env` file

run migration and seeder for tables and fake data
`php artisan migrate --seed`

Install npm dependencies & run npm development
`npm install && npm run dev`

now start php server by runnning this command
`php artisan serve`

Now you can use the cms in browser by visiting this url
 `http://127.0.0.1:8000`

To create, update and delete pages you need to login using these credentials

email: `admin@example.com`

password: `password`

