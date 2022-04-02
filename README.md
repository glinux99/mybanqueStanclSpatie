<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## ABOUT MY BANK NURU PROJECT 
<h4 style="background: black">->PROJET EN MULTI LANGUES / PROJECT IN MULTI LANGUAGES</h4>
To launch the customer management application of a bank, in our case it is Nuru Bank, you will first have to configure the tenants  because the project was done by us using Stancl/Tenancy and Spatie/Permissions which helped us to generate the tenants as well as the permissions and roles for the users:
<p><h3>Know this</h3>
<ol>
  <li>The first customer becomes the site administrator</li>
  <li>The administrator can create agents (cashier, IT and others)</li>
  <li>The cashier created by the administrator can create a customer, can recover the deposit or the withdrawal of customers</li>
  <li>The customer can also create his account by going to my account, i.e. in this case he will have to open an account</li>
 </ol>
 <p>
 <p>
    <h3 style="color: green">Launching the app</h3>
    The first thing to do is to migrate all the tables:<br>
    ->php artisan migrate<br>
    ->creation of landlords:
        <br>&nbsp;&nbsp;Codes<br>
        ->php artisan tinker<br>
       &nbsp;&nbsp;&nbsp;&nbsp; Psy Shell v0.11.2 (PHP 7.4.28 — cli) by Justin Hileman<br>
       &nbsp;&nbsp;&nbsp;&nbsp; >>>$tenant2 = App\Models\Tenant::create(['id' => 'Kinshasa']);<br>
       &nbsp;&nbsp;&nbsp;&nbsp; >>> $tenant2->domains()->create(['domain' => 'kinsite.nurubanque.cd']);<br>
       &nbsp;&nbsp;&nbsp;&nbsp; >>> exit<br>
        &nbsp;&nbsp;&nbsp;&nbsp; You can create as many tenants as you want<br>
    ->php artisan tenants:migrate or php artisan tenants:migrate-fresh
    ->php artisan tenants:seed name_of_the_seend (In this app name_of_the_seed = PermissionRoles)<br>
   The following steps relate to calling a tenant's link.<br>
 </p>
 <p>
    <h3>Different categories of customers</h3>
    <ol>
    <li>Admin ->First user to log into the tenant site</li>
    <li>Cashier -> user created by the administrator</li>
    <li>Simple client that can be created by the cashier or by himself</li>
    </ol>
</p>
## The customer
The customer can <br>
->to log in<br>
->modify your account<br>
->make a bank transfer<br>
->check your balance<br>
->view transaction reports<br>
->see his profile<br>

## Cashier

->create a customer only<br>
->recover the client's deposit fees<br>
->recover customer withdrawal fees<br>
->check customer balance<br>
->collect customer reports<br>
->update customer account<br>
->check bank balance<br>
->verify customer accounts<br>
## Administrator

->create a cashier or other agent only<br>
->delete, deactivate or activate a customer or agent<br>
->check bank balance<br>
->verify customer accounts<br>
<h1>Note:</h1>
Roles and permissions are assigned following the above logic

## Security Vulnerabilities ou dysfonctionnement My Banque Nuru Project
In case of error in our codes or in case of proposed additions, please report it to allow us to evaluate ourselves on [genesiskikimba@gmail.com](mailto:genesiskikimba@gmail.com)
We are open to all criticism and remarks.
## Security Vulnerabilities Laravel

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
