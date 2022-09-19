# Introduction

This demonstration aims to show the ability can code in different ways and use function build-in laravel.

As an officer from the government sector, I would like to have a system to generate bills and collect payments, chase the payment progress, and better understand the bill being paid or not.

Based on user needs, this requires high concurrency. It is estimated that at the level of tens of millions, it will connect with third-party payment, user hierarchical authentication, and send bills by mail.

toDo:
<ul>
<li>Api design for App and Web</li>
<li>Email with Queues</li>
<li>Payment wiht Queues</li>
<li>Authentication with JWT, Role and Permission</li>
</ul>

Would use feactures below:
<ul>
<li>Routing Middleware Controllers HTTP Requests HTTP Responses Bundling Assets Validation </li>
<li>Collections Mail Queues Rate Limiting</li>
<li>Authentication Authorization Hashing</li>
<li>Database: Pagination Database: Migrations Database: Seeding</li>
</ul>

Based on this design, it can theoretically handle 20,000 requests per second

## Installation

Download this package, cmd go to the package root path.

First, cmd run
```
composer install
npm i
cp .env.example .env
```
Second
```
php artisan key:generate
php artisan jwt:secret
```
Third, edit the `.env` file, fill your `TESTING ENV` config eg `DB_PASSWORD` and run the code below.

```
php artisan migrate:refresh --seed
```
or
Depending on how much data you need, can jump to /database/seeders and modify the seeder.<br/>
These functions have been optimized and can generate tens of millions of data in 6 minutes <br/>
Please config your php.ini set the memory to -1 before you test
```
php artisan db:seed --class=UsersSeeder
php artisan db:seed --class=BillsSeeder
php artisan db:seed --class=PaymentsSeeder
```
Run tests before you try
```
php artisan test
```
## Usage

Fourth
```
php artisan serve
npm run watch
```
Test account:
```
admin@test.co.nz
abcd1234
```

Bills page allow to edit the bill by click on data. 
<br/>

#### If you found navbar missing and dont have login please right click inspect got Application clear the cocal storage.


## Comment
Finally, I hope to be fortunate to be part of your team.
Thanks
