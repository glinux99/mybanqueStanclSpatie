<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Message;
use App\Models\Transaction;
use App\Models\Inscription;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Hash;
class NuruController extends Controller
{
   public function CreateCustomers(Request $request){
         $matricule = substr(str_shuffle("1234567890"), 0, 12);
         $matricule2 = substr(str_shuffle("1234567890"),0,2);
         $matricule = "4970".$matricule.$matricule2;
         if(!Customer::where('adresse_mail','=', request('mail'))->exists()){
            $user = new Customer;
            $user->nom = request('nom');
            $user->prenom = request('prenom');
            $user->matricule = $matricule;
            $user->adresse_mail = request('mail');
            $user->psswd = bcrypt(request('psswd'));
            $user->save();
            $data = Customer::find($user->id);
            $data->givePermissionTo('connect');
            session()->put('user', $data);
            if($user->id==1) {
               $user->assignRole('admin');
               return view('adminsCaissiers.AdminCaissLayout');
            }
            $user->assignRole('client');
            return view('clients.profilCli');
         }else {
            session()->flash('error', 'mail_exist');
            return redirect('/login');
         }
   }
   public function ConnectCustomers(Request $request){
      $user = Customer::where(function($req){
         $req->where('adresse_mail','=', request('mail'))
            ->orwhere('matricule','=', request('mail'));
      })->first();
      if(($user) && (Hash::check(request('psswd'), $user->psswd))){
         $data = Customer::find($user->id);
         session()->put('user', $data);
         if($user->hasPermissionTo('connect')){
            if(($user->hasRole('admin' )) OR $user->hasRole('caissier')) return view('adminsCaissiers.administrator');
            else return view('clients.profilCli');
         }else{
            session()->flash('error','compte_disable');
            return redirect('/login');
         }
      }else {
         session()->flash('error', 'one_thing_not_running');
         return redirect('/login');
      }
   }
   public function VirementCustomers(){
      $user = Customer::find(session('user')->id);
      $benef = Customer::where('matricule','=',request('benef_mat'))->first();
      if($user->solde>5){
         $benef->solde+=request('montant');
         $benef->save();
         $user->solde -=request('montant');
         $user->save();
         // table transaction
         $x=0;
         while($x<2){
            $trans_mat  = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 6);
            $trans_mat = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6).'.'.$trans_mat;
            $trans_mat = substr(str_shuffle("0123456789"), 0, 6).'.'.$trans_mat;
            $trans_mat = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6).'.'.$trans_mat;
            $trans = new Transaction;
            if($x==0){
               $solde= $user->solde;
               $motif =__('Virement sur le compte de ').$benef->nom.$benef->prenom;
               $emetteur =$user->matricule;
            }else{
               $solde= $benef->solde;
               $motif =__('Virement effectuer par ').$user->nom.$user->prenom;
               $emetteur =$benef->matricule;
            }
            $montant = $trans->montant_ret = request('montant');
            $trans->solde =$solde;
            $trans->motif =$motif;
            $trans->trans_mat =$trans_mat;
            $trans->client_mat = $emetteur;
            $trans->benef_mat = $benef->matricule;
            $trans->caissier_mat = 'client/client';
            $trans->save();
            $x++;
         }
         session()->flash('error','no_error');
         return view('clients.profilCli');
      }else if($user->solde==5){
         session()->flash('error','solde_egal');
         return view('clients.profilCli');
      }else{
         session()->flash('error','solde_insuf');
         return view('clients.profilCli');
      }
   }
   public function TransactionCustomers(){
      session()->pull('trans','');
      $trans = Transaction::where('client_mat', session('user')->matricule)->get();
      $user = Customer::find(session('user')->id);
      if($user->hasRole('client' )){
         if(!(Hash::check(request('psswd'),session('user')->psswd))){
            session()->flash('error','no_autorization');
            return view('clients.profilCli');
         }else {
            session()->put('trans', $trans);
            return view('transactions');
         }
      }
      else{
         if((request('matricule')!='')){
             if(session('user')!=null AND session('user')->hasRole('caissier')){
               $test = Customer::where('matricule', request('matricule'));
               if(!$test->hasRole('client')){
                  //caissier n a pas d autorisation
                  session()->flash('error','no_autorization');
                  return view('adminsCaissiers.administrator');
               }
            }
            session()->put('trans','');
            $client =  Transaction::where(function($req){
               $req->where('client_mat',request('matricule'))
                  ->orwhere('benef_mat',request('matricule'));
            })->get();
            if($client==null) {
               session()->flash('error','client-not-valide');
               return view('adminsCaissiers.administrator');
            }
            session()->put('trans', $client);
            // var_dump($client);
            return view('transactions');
         }
         $trans = Transaction::all();
         session()->put('trans', $trans);
         return view('transactions');
      }

   }
   public function StatistiqueCustomers(){
      $stats = Transaction::where('client_mat', session('user')->matricule)->get();
      return view('clients.statistiques_user', compact('stats'));
   }
   public function ChecksoldeCustomers(){
      $user = Customer::find(session('user')->id);
      if($user->hasRole('client' )){
         if(!(Hash::check(request('psswd'),session('user')->psswd))){
            session()->flash('error','no_autorization');
            return view('clients.profilCli');
         }else{
            $modal_aff=1;
            $data = session('user');
            return view('clients.profilCli', compact(['modal_aff','data']));
         }
      }else{
         $data = Customer::where('matricule',request('matricule'))->first();
         $modal_aff=1;
         if($user!=null){
            return view('adminsCaissiers.administrator',compact(['modal_aff','data']));
         }else{
            session()->flash('error','one_thing_not_running');
            return view('adminsCaissiers.administrator');
         }
         // Pour les admins et les caissiers
      }

   }
   public function MessageCustomers($mat){
      $message='';
      session()->pull('dest','');
      $dest = Customer::where('matricule', $mat)->first();
      $list = Customer::where('id','!=',session('user')->id)->get();
      if($mat=='nuru_banque' || session('dest')=='nuru_banque'){
         $message = Message::where('mode',0)->get();
         session()->put('dest','nuru_banque');
         return view('messages', compact(['message','list','dest']));
      }elseif(!$dest){
         $dest = session('dest');
      }else session()->put('dest',$dest);
      if(session('dest')){
         $message = Message::where(function($req){
            $req->where('source_mat',session('user')->matricule)
               ->where('dest_mat',session('dest')->matricule)
               ->where('mode',1);
         })
         ->orwhere(function($req){
            $req->where('dest_mat',session('user')->matricule)
               ->where('source_mat',session('dest')->matricule)
               ->where('mode',1);
         })->get();
      }
      // echo $message;
      return view('messages', compact(['message','list','dest']));
   }
   public function SendMessageCustomers(){
      $message = new Message;
      $dest='';
      if(session('dest')=='nuru_banque'){
         $mode =0;
         $dest = 'nuru_banque';
      }else{
         $mode =1;
         $dest = session('dest')->matricule;
      }
      $message->source_mat =session('user')->matricule;
      $message->dest_mat = $dest;
      $message->message =request('message');
      $message->mode = $mode;
      $message->noms =session('user')->nom.' '.session('user')->prenom;
      $message->save();
      #appel d une methode du controlleur dans une autre methode
      return NuruController::MessageCustomers($dest);
   }
   public function TransactionCaisse($montant,$solde,$motif,$client_mat,$caissier_mat){
      $trans_mat  = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 6);
      $trans_mat = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6).'.'.$trans_mat;
      $trans_mat = substr(str_shuffle("0123456789"), 0, 6).'.'.$trans_mat;
      $trans_mat = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6).'.'.$trans_mat;
      $trans = new Transaction;
      $trans->montant_ret = $montant;
      $trans->solde =$solde;
      $trans->motif =$motif;
      $trans->trans_mat=$trans_mat;
      $trans->client_mat =$client_mat;
      $trans->benef_mat =$client_mat;
      $trans->caissier_mat =$caissier_mat;
      $trans->save();
   }
   public function RetireCustomers(){
      $client = Customer::where('matricule',request('matricule'))->first();
      ///verification de permission de connection 
      if($client->solde>5) {
         if($client->hasPermissionTo('connect')){
            session()->flash('error','no_error');
         $client->solde -= request('montant');
         $client->save();
         $soldeCli= $client->solde;
         //Transactions;
         $motif=__('Retrait par ').request('username');
         NuruController::TransactionCaisse(request('montant'),$soldeCli,$motif,request('matricule'),session('user')->matricule);
         return view('adminsCaissiers.administrator');
         }else{
            session()->flash('error','compte_disable');
            return view('adminsCaissiers.administrator');
         }
      }
   elseif($user->solde==5){
      session()->flash('error','solde_egal');
      return view('adminsCaissiers.administrator');
   }else{
      session()->flash('error','solde_insuf');
      return view('adminsCaissiers.administrator');
   }
   }
   #Depot d argent effectuer par le client mais inserer par un caissier
   public function DepositCustomers(){
      $client = Customer::where('matricule',request('matricule'))->first();
      if($client){
         $client->solde += request('montant');
         $client->save();
         //Transactions;
         $soldeCli= $client->solde;
         $motif=__('Depot par ').request('username');
         NuruController::TransactionCaisse(request('montant'),$soldeCli,$motif,request('matricule'),session('user')->matricule);
         session()->flash('error','no_error');
         return view('adminsCaissiers.administrator');
      }
      else{
         session()->flash('error','one_thing_not_running');
         return view('adminsCaissiers.administrator');
      }      
   }
   #Mis a jours des comptes pour clients
   public function UpdateAgents(){
      $agent = Customer::where('matricule',request('matricule'))->first();
      // dd(request('matricule'));
      if($agent!=null AND $agent->hasRole('caissier')){
         session()->put('agent', $agent);
         return view('clients.alter_account');
      }else{
         session()->flash('error','one_thing_not_running');
         return view('adminsCaissiers.administrator');
      }
   }
   #solde de la banque suivant les comptes clients
   public function Soldebanque(){
      $solde_all = Customer::sum('solde');
      $solde =1;
      return view('adminsCaissiers.administrator', compact(['solde', 'solde_all']));
   }
   public function UpdateCustomers(){
      $user = Customer::where('matricule',request('matricule'))->first();
      $x =['nom','prenom','adresse_mail','numero_tel','type_compte','genre','quart_av','ville','province','pays','apropos'];
      foreach($x as $items){
         $user->$items = request($items);
      }
      $photo='';
            $img=request('photo');
            if(strlen($img)){
                $dossier = "'../../assets/img/";
                $img_partie = explode(";base64,", $img);
                $img_typ_f = explode("/image",$img_partie[0]);
                $img_type = $img_typ_f[0];
                $img_base64 = base64_decode($img_partie[1]);
                $fileName ='nuru_banque'.request('matricule').'.png';
                $file =$dossier.$fileName;
                file_put_contents($file, $img_base64);
                $photo = "assets/img/".$fileName;
                
            }elseif(!session('user')->photo){
               $photo = "assets/img/default_user.png";
           }
         $user->photo = $photo;
      if(request('psswd')) $user->psswd = request('psswd');
      $user->save();
       if(session('user')!=null AND session('user')->hasRole('client')){
         session()->flash('error','no_error');
         return redirect()->To('/profil');
      }else{
         session()->flash('error','no_error');
         return view('adminsCaissiers.administrator');
      }
   }
   #ces fonctions sont la pour desactiver un client, activer ou supprimer
   public function DeleteCustomers($id){
      $client = Customer::find($id);
      $client->delete();
      session()->flash('error','no_error');
      return  NuruController::ViewCustomers('clientCaissiers');
   }
   public function ActiveCustomers($id){
      $client = Customer::find($id);
      $client->givePermissionTo('connect');
      session()->flash('error','no_error');
      return  NuruController::ViewCustomers('clientCaissiers');
   }
   public function DesactiveCustomers($id){
      $client = Customer::find($id);
      $client->revokePermissionTo('connect');
      session()->flash('error','no_error');
      return  NuruController::ViewCustomers('clientCaissiers');
   }
   #creation ees agents ou des clients par l admin ou les caissiers
   public function CreateCustomers_by_agent(){
      $user = new Customer;
      $x =['nom','prenom','matricule','adresse_mail','numero_tel','type_compte','genre','quart_av','province','ville','pays','apropos'];
      foreach($x as $items){
         $user->$items = request($items);
      }
      $user->psswd = bcrypt(request('psswd'));
      $photo='';
            $img=request('photo');
            if(strlen($img)){
                $dossier = "'../../assets/img/";
                $img_partie = explode(";base64,", $img);
                $img_typ_f = explode("/image",$img_partie[0]);
                $img_type = $img_typ_f[0];
                $img_base64 = base64_decode($img_partie[1]);
                $fileName ='nuru_banque'.request('matricule').'.png';
                $file =$dossier.$fileName;
                file_put_contents($file, $img_base64);
                $photo = "assets/img/".$fileName;
                
            }else{
               $photo = "assets/img/default_user.png";
           }
         $user->photo = $photo;
         $user->save();
          if(session('user')!=null AND session('user')->hasRole('admin')){
         $user = Customer::where('matricule',request('matricule'))->first();
         if(request('type_compte')=='Caissier') {
            $user->assignRole('caissier');
            $user->givePermissionTo('connect');
            $user->givePermissionTo('depot');
            $user->givePermissionTo('retrait');
            $user->givePermissionTo('create customers');
         }
         else $user->assignRole('autre');
         }else{
            $user->givePermissionTo('connect');
            $user->assignRole('client');
         }
         session()->flash('error','no_error');
         return view('adminsCaissiers.administrator');
   }
   #virements effectuer par les clients
   public function ViewCustomers($client){
      if($client =='clients'){
         $allUser = Customer::role('client')->get();
         $clientOnly =1;
         return view('adminsCaissiers.administrator', compact(['allUser', 'clientOnly']));
      }
      elseif ($client =='clientCaissiers'){
         $allUser = Customer::role(['client','caissier'])->get();
         return view('adminsCaissiers.delete_customers', compact('allUser'));
      }
      
   }
   #deconnection
   public function LogoutCustomers(){
      session()->flush();
      \App::setLocale('fr');
      return redirect(Route('acceuil'));
   }
}
