
# PaliMart

This is a multi-vendor e-commerce website built using the Laravel PHP framework. The website allows vendors to create their own accounts and sell products on the platform. Customers can browse products, add them to their cart, and checkout using a secure payment gateway.




## Installation

To install this project on your local machine, follow these steps:


1. Clone the repository using the command.
```bash
  git clone https://github.com/priynshuchouhn/PaliMart.git
```
2. Navigate to the project directory using 
```bash
cd PaliMart
```
3. Install dependencies using 
```bash
composer install
```
4. Create a new `.env` file by copying the `.env.example` file using the command 
```bash
cp .env.example .env.
```
5. Generate an application key using 
```bash
php artisan key:generate
```
6. Configure your database connection in the `.env` file.
7. Run database migrations using 
```bash
php artisan migrate
```
8. Run the server using 
```bash
php artisan serve
```
9. Visit `http://localhost:8000` in your browser to view the website.


## Features

- Multi-vendor support: Vendors can create their own accounts and sell products on the platform.
- Secure payment gateway: Customers can checkout using a secure payment gateway.
- Product management: Vendors can add, edit, and delete their own products.
- Order management: Vendors can view and manage orders for their products.
- Category management: Admins can add, edit, and delete categories for products.
- User management: Admins can manage users and their roles.
- Dashboard: Vendors and admins have their own dashboards with statistics and information about their accounts.




## Tech Stack

- Laravel 9

## Contributing

Contributions to this project are welcome. To contribute, follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Write code to implement your feature or bug fix.
4. Write tests for your code.
5. Ensure that all tests pass.
6. Submit a pull request.













## Support

For support, email priynshuchouhn@icloud.com