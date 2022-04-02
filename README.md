<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## ABOUT MY BANK NURU PROJECT 
Pour lancer l'application de gestions des clients d'une banque, pour notre cas c'est Nuru Banque, il faudra d'abord configurer les locataires
car le projet a ete fait par nos soins en utilisant Stancl/Tenancy et Spatie/Permissions qui nous ont aide a generer les locataires ainsi que les permissions et roles pour les utilisateurs:
<p><h3>A savoir</h3>
<ol>
  <li>Le premier client devient l'administrateur du site</li>
  <li>L'administrateur peut creer des agents(caissier, informaticiens et autres)</li>
  <li>Le caissier creee par l'administrateur peut creer un client, peut recuperer le depot ou le retrait de clients</li>
  <li>Le client peut aussi creer son compte en allant sur mon compte c'est a dire dans ce cas il devra ouvir un compte</li>
 </ol>
 <p>
 <p>
    <h3 style="color: green">Lancement de l'application</h3>
    La premiere de chose a faire est de faire les migrations de toutes les tables:<br>
    ->php artisan migrate<br>
    ->php artisan tenants:migrate or php artisan tenants:migrate-fresh
    ->php artisan tenants:seed name_of_the_seend (Dans cette application name_of_the_seed = PermissionRoles)<br>
   Les etapes suivantes concernent l'appelle du lien d'un locataire.<br>
 </p>
 <p>
    <h3>Different Categories de Customers</h3>
    <ol>
    <li>Admin ->Premier utilisateur a se connecter dans le site tenant</li>
    <li>Caissier -> utilisateur cree par l'administrateur</li>
    <li>Client simple qui peut etre cree par le caissier ou par lui meme</li>
    </ol>
</p>
## Client
Le client peut <br>
->se connecter<br>
->modifier son compte<br>
->faire un virement bancaire<br>
->verifier son solde<br>
->consulter ses rapports de transactions<br>
->voir son profil<br>

## Caissier

->creer un client seulement<br>
->recuperer les frais de depot du client<br>
->recuperer les frais de retrait du client<br>
->verifier le solde du client<br>
->recuperer les rapports du client<br>
->mettre a jour le compte du client<<br>br>
->verifier le solde de la banque<br>
->verifier les comptes clients<br>
## Administrateur

->creer un caissier ou autre agent seulement<br>
->supprimer, desactiver ou activer un client ou agent<br>
->verifier le solde de la banque<br>
->verifier les comptes clients<br>
<h1>Note:</h1>
Les roles et permissions sont attribues en suivant la logique ci-haut

## Security Vulnerabilities ou disfonctionnement My Banque Nuru Project
En cas d'erreur dans nos codes ou en cas de proposition d'ajouts, veuillez le signaler pour nous permettre de nous evaluer sur [genesiskikimba@gmail.com](mailto:genesiskikimba@gmail.com)
Nous sommes tout ouvert a tout critiques et remarques.
## Security Vulnerabilities Laravel

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
