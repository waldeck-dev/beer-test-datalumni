# Test Datalumni Laravel
This repository holds a proposed solution for Datalumni's coding test :heavy_check_mark:

## Quick start - No installation required
You don't care about the code and you just want to see the result?
:star2: See it live here : []()

## Complete Installation
This section describes installation process to run this project from source :package:
1. Clone this repository :
```
git clone git@github.com:waldeck-dev/beer-test-datalumni.git
cd beer-test-datalumni/
```

2. Install project :
```
composer install
```

3. Create database
(Assuming MySQL is installed)
```
mysql -u <username> -p
CREATE DATABASE beer;
```
(replace '<username>' with your actual db username)

4. Copy .env file and edit it:
```
cp .env.example .env
nano .env
```
Edit database info on .env based on your config :
```
DB_CONNECTION=mysql
DB_HOST=<your database host>
DB_PORT=3306
DB_DATABASE=beer
DB_USERNAME=<your database user>
DB_PASSWORD=<your database password>
```

5. Start development server
(Development server should be enough for testing purposes)
```
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

6. See it in action in your favorite web browser
`http://127.0.0.1:8000`

### License
This open-source software is licensed under the [MIT license](https://opensource.org/licenses/MIT).
