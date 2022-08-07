# Introduction

As an officer from the government sector, I would like to have a system to generate bills and collect payments, chase the payment progress, and better understand the bill being paid or not.

Based on user needs, this requires high concurrency. It is estimated that at the level of tens of millions, it will connect with third-party payment, user hierarchical authentication, and send bills by mail.

toDo:
-Api design for App and Web.
-Email with Queues
-Payment wiht Queues
-Authentication with JWT, Role and Permission

Would use feacture below:
-Routing Middleware Controllers HTTP Requests HTTP Responses Bundling Assets Validation 
-Collections Mail Queues Rate Limiting
Authentication Authorization Hashing
-Database: Pagination Database: Migrations Database: Seeding

Based on this design, it can theoretically handle 20,000 requests per second

## Installation

Download this package, cmd go to the package root path.

First, cmd run
```
composer install
npm i
```
Second
```
php artisan key:generate
```
Third, edit the `.env` file, fill the code below with your TESTING ENV config.

```
php artisan migrate:refresh --seed
```
or
Depending on how much data you need, can jump to /database/seeders and modify the seeder.
```
php artisan db:seed --class=UsersSeeder
php artisan db:seed --class=BillsSeeder
php artisan db:seed --class=PaymentsSeeder
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

## Comment
Finally, I hope to be fortunate to be part of your team.
Thanks
