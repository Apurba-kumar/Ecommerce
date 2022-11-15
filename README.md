![219-2191800_laptop-frame-png-laptop-mock-up-png-transparent(1)](https://user-images.githubusercontent.com/87056067/201853866-206ebbdf-78fd-4e75-bcba-9bdf275189eb.jpg)



 ## Laravel:9  E-commerce Project 

This is a fully functional e-commerce project that allows customers to add products to their carts and place orders. Customer registration for this project requires email verification. Customers can remark on and respond to products. The customer can view product details and conduct a product search.

Additionally, via the admin dashboard, the admin may view all orders and email customers. Every order's receipt can be printed by the admin.

## Features
#Homepage description :

- Customer can see all the product .
- Customer can search for product.
- Can see product details
- Customer can comment and reply.
- Customer can register with email verification
- Customer can login and add product to their cart .
- Customer has the the ability to order product using card or cash on delivery.
- Customer can see all their order and also has the ability to cancel the order.


#Admin Dashboard :

- Admin can see all the Customer details
- Admin can add product , delete or update them.
- Admin can see all the order.
- Admin has the ability to send mail to the customer from admin dashboard .
- Admin can print receipt for a specific order.
- Admin can see messages send by the Customer .

## Requirements  for this project
-  XAMPP installed version 8 or higher
- Composer installed
- nodejs installed
- Laravel install 

## Installation Steps 

1. First download the zip file the unzip it.
2. Then open a cmd in the project directory.
3. Run this command in the cmd 'composer update'.
4. Create a database called 'ecommerceDB' using xampp.
5. ecommerce.sql file is given in the zip file's main directory. Import that .sql file into your database.
4. Add your email credentials in <code>.env</code> file
5. Add your Stripe Key credentials in <code>.env</code> file
6. Start yor project using <code>php artisan serve</code>

# Now your project is ready to serve.



### Dashboard Details
- Admin : http://127.0.0.1:8000/redirect
    -   Login Id : admin@gmail.com
    -   Password : password
- User  : http://127.0.0.1:8000/redirect
         -   Login Id : apurba@mail.com
         -   Password : password
 
## Here are some Snippets of my project 

### User Homapage
<img width="960" alt="image" src="https://user-images.githubusercontent.com/87056067/201873986-4c66b1ad-f4c5-4642-babb-4c4d8df335c7.png">

### Product section 

#### Where user can search their desire products

### User can add product to cart and also view the product details

<img width="960" alt="image" src="https://user-images.githubusercontent.com/87056067/201938500-bca852ac-abb2-483e-a1ed-4a898cad7ad5.png">

### Comment Section

#### Where user can comment and also reply 

<img width="960" alt="image" src="https://user-images.githubusercontent.com/87056067/201939383-eb853c56-7111-4ac5-aeca-047d12f0b925.png">

### Cart section
#### Where user can choose their payment option like card or Cash

<img width="960" alt="image" src="https://user-images.githubusercontent.com/87056067/201940534-dbf39cf2-e1b7-4d95-a906-08ace51e8eb1.png">

#### For card payment i used Stripe payment system

<img width="960" alt="image" src="https://user-images.githubusercontent.com/87056067/201940951-4686efdd-8702-4eef-9feb-4cb68f2806ad.png">

### Order section
#### where user can show their order status , also they can cancel their order befor the delivery.

<img width="960" alt="image" src="https://user-images.githubusercontent.com/87056067/201941330-aabc4ac4-0fc3-47b2-a144-ed9c76a5a43d.png">

### Admin Dashboard


<img width="960" alt="image" src="https://user-images.githubusercontent.com/87056067/201945607-d30c94e2-75c2-43e9-af28-5e66bac0ecfd.png">

### Add Product
#### Where admin can add product

<img width="960" alt="image" src="https://user-images.githubusercontent.com/87056067/201945982-268a9ecf-44c6-455b-838e-bf935ed0f57d.png">

### All product

#### Where admin can view all product , edit product details and also admin can delete the product

<img width="960" alt="image" src="https://user-images.githubusercontent.com/87056067/201946315-856912ae-c020-4b15-bac9-0acab154a92f.png">

### Product Category Section


<img width="960" alt="image" src="https://user-images.githubusercontent.com/87056067/201946882-e9dbaece-afdd-4e68-a974-ae2fa956b89b.png">

### Admin Order section
#### Where admin can view all the orders
### Admin can send email to the customer
### Also admin can print particular order.


<img width="960" alt="image" src="https://user-images.githubusercontent.com/87056067/201947437-6d7fae40-bd51-46ba-ab86-c42b95d5092d.png">

## Security Vulnerabilities

If you discover a bug  within project, please send an e-mail to me via [apurbakumar33@gmail.com](apurbakumar33@gmail.com). If you have any suggestion for this project plaease contact me..it will encourge  me to keep updating this project.



## License

The project developed using laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
