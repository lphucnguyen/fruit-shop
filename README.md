## About Fruit Shop

A fruit supplier wishes to build an application to print out invoices when customers come to the shop and buy fruit.

## Technical
- Programming Language: PHP
- Framework: Laravel
- Database Engine: MySQL
- Library: Laravel Livewire

## How to run application
### Config file .env
```
    APP_NAME="Fruit Shop"

    DB_CONNECTION=<Name of database connection>
    DB_HOST=<Database host>
    DB_PORT=<Database port>
    DB_DATABASE=<Database name>
    DB_USERNAME=<Database username>
    DB_PASSWORD=<Database password>
```
### Run commandline after finish configing
```
    - composer install
    - php artisan migrate:fresh --seed
```
### Run test
```
    - php artisan test
```

## Feature
1) Login screen for staff to login.
2) Registration screen to registration fruit category.
3) Registration screen to registration fruit item.
-- Fields: “Name”, “Unit” (kg, pcs, pack), “Price”
4) Invoice screen to input purchase details (Transaction data).
-- Able to input customer name.
-- Able to input multiple fruits.
-- Able to Create, Edit and Delete Invoices.
-- Option/bonus: Able to print invoices.

## Test cases
- Authentication:
-- testLoginWithIncorrectUserCode
-- testLoginWithIncorrectPassword
-- testLoginCorrect
- Category:
-- testCreateCategory
-- testCreateCategoryWithIncorrectName
- Fruit:
-- testCreateFruitCorrectInput
-- testCreateFruitIncorrectName
-- testCreateFruitIncorrectPrice
- Invoice:
-- testCreateCorrectInvoice
-- testCreateCorrectInvoiceIncorrectCustomerName
-- testCreateCorrectInvoiceIncorrectOrderFruit
-- testUpdateCorrectInvoice
-- testUpdateInvoiceIncorrectOrderFruit
-- testUpdateInvoiceIncorrectCustomerName