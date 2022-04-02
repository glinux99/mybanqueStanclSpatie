<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Middleware\LocaleSetMiddleware;
use App\Models\Transaction;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Http\Controllers\NuruController;
use App\Models\Customer;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
    LocaleSetMiddleware::class,
])->group(function () {
    #group moddleware pour client only
    Route::group(['middleware'=>'App\Http\Middleware\ClientMiddleware'],function(){
        Route::get('/profil', function () {
            $data = Customer::find(session('user')->id);
            session()->put('user',$data);
            return view('clients.profilCli');
        });
        Route::get('/alter_account', function () {
            return view('clients.alter_account');
        });
        Route::get('/statistiques_user',  [ NuruController::class, 'StatistiqueCustomers']);
        Route::post('/virement', [ NuruController::class, 'VirementCustomers']);
    });
    #group middleware pour admin only
    Route::group(['middleware'=>'App\Http\Middleware\AdminsOnlyMiddleware'],function(){
        Route::get('/active/{data}',  [ NuruController::class, 'ActiveCustomers']);
        Route::get('/desactive/{data}',  [ NuruController::class, 'DesactiveCustomers']);
        Route::get('/delete/{data}',  [ NuruController::class, 'DeleteCustomers']);
    });
    #group middleware pour agent and admin only
    Route::group(['middleware'=>['App\Http\Middleware\AdminsOrAgentMiddleware','App\Http\Middleware\ConnectedMiddleware']],function(){
        Route::get('/administration', function () {
            return view('adminsCaissiers.administrator');
        });
        Route::get('/add_CliAg', function () {
            return view('adminsCaissiers.add_CliAg');
        });
        Route::get('/soldebanque',[ NuruController::class, 'Soldebanque']);
        Route::get('/infoUsers/{client}', [ NuruController::class, 'ViewCustomers']);
        Route::post('/depot_argent',  [ NuruController::class, 'DepositCustomers']);
        Route::post('/alter_account2',[ NuruController::class, 'UpdateAgents']);
        Route::post('/CreateCustomers_by_agent', [ NuruController::class, 'CreateCustomers_by_agent']);
     });
     #connected you and access
     Route::group(['middleware'=>'App\Http\Middleware\ConnectedMiddleware'],function(){
        Route::get('/transaction',  [ NuruController::class, 'TransactionCustomers']);
        Route::get('/message/{mat}', [ NuruController::class, 'MessageCustomers']);
        Route::get('/pdf',  [ NuruController::class, 'pdf']);
        Route::post('/rapport',  [ NuruController::class, 'TransactionCustomers']);
        Route::post('/update',  [ NuruController::class, 'UpdateCustomers']);
        Route::post('/send_message', [ NuruController::class, 'SendMessageCustomers']);
        Route::post('/verifier_solde',  [ NuruController::class, 'ChecksoldeCustomers']);
     });
    #never to verify
    Route::get('/logout',  [ NuruController::class, 'LogoutCustomers']);
    Route::get('locale/{locale}', function ($locale){
        session()->put('locale', $locale);
        //echo session('locale');
        return redirect(url('/'));
    });
    Route::get('/', function () {
        // $user= Transaction::first();
        // $user->assignRole('client');
        //echo Transaction::role('admin')->get();
        // echo 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
        return view('acceuil');
    })->name('acceuil');
    Route::get('/login', function () {
        if(session('user')!=null AND session('user')->hasRole('client')){
            return view('clients.profilCli');
        }elseif(session('user')!=null AND !session('user')->hasRole('client')){
            return view('adminsCaissiers.administrator');
        }else return view('login');
    });
    Route::get('/mon_epargne', function () {
        return view('monepargne');
    });
    Route::get('/statistiques', function () {
        return view('statistiques');
    });
    Route::post('/calcul_money', function (Request $request){
        try{
        $montant= request('montant');
        $from_conv = request('from_conv');
        $to_conv =request('to_conv');
        $result = $montant*($from_conv/$to_conv);
        session()->flash('result', $result);
        return redirect(url('/#echange'));
        }catch(Exception $e){
            session()->flash('error','no_valide_enter');
            session()->flash('result', 0);
            return redirect(url('/#echange'));
        }
        //return view('acceuil#echange', compact('result'));
    });
    Route::post('/CreateCustomers', [ NuruController::class, 'CreateCustomers']);
    Route::post('/connect', [ NuruController::class, 'ConnectCustomers']);
    // Route::get('/t', function () {
    //     $user = Customer::find(17);
        
    //     $user = Customer::find(2);
    //     $user->revokePermissionTo('delete customers');
    //     if($user->hasPermissionTo('connect')) echo 'yessss';
    //     else echo 'noooo';
    // });
});
