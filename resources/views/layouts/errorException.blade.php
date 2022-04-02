<script>
    $(document).ready(function(){
        window.setTimeout(function(){
            $('.alert').fadeTo(10000,0).slideUp(7000, function(){
                $(this).remove();
            }, 5000);
        });
    })
</script>
@if(session('error')==='no_error')
    <div class="mt-2 alert alert-dismissible fade show bg-success col-lg-5 mx-auto" role="alert">
        <strong>{{ __("Success!") }}</strong>
        {{__("Traitement effectue avec success")}} <br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('error')==='one_thing_not_running')
    <div class="mt-2 alert alert-dismissible fade show bg-danger col-lg-5 mx-auto" role="alert">
        <strong>{{ __("ERREUR!") }}</strong>
        {{__("Nous ne pouvons pas satisfaire a votre requette car plusieurs erreurs ont ete detecte")}} <br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('error')==='mail_exist')
    <div class="mt-2 alert alert-dismissible fade show bg-danger col-lg-5 mx-auto" role="alert">
        <strong>{{ __("ERREUR!") }}</strong>
        {{__("L'addresse mail que vous tentez d'utiliser existe deja")}} <br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('error')==='compte_disable')
    <div class="mt-2 alert alert-dismissible fade show bg-danger col-lg-5 mx-auto" role="alert">
        <strong>{{ __("Erreur!") }}</strong>
        {{__("Certaines de vos données saisies sont incorrects! Si cela persiste, Contactez-nous")}} <br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('error')==='no_autorization')
    <div class="mt-2 alert alert-dismissible fade show bg-danger col-lg-5 mx-auto" role="alert">
        <strong>{{ __("ERREUR!") }}</strong>
        {{__("Vous n'avez pas d'autorisation pour acceder a ce service ou effectuer ces operations!!!")}} <br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('error')==='solde_egal')
    <div class="mt-2 alert alert-dismissible fade show bg-danger col-lg-5 mx-auto" role="alert">
        <strong>{{ __("ERREUR!") }}</strong>
        {{__("Nous ne pouvons pas satisfaire a votre demande car le solde du compte ne peut etre inferieur a 5usd!!!")}} <br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('error')==='solde_insuf')
    <div class="mt-2 alert alert-dismissible fade show bg-danger col-lg-5 mx-auto" role="alert">
        <strong>{{ __("ERREUR!") }}</strong>
        {{__("Votre solde est insuffisant pour effectuer cette operation...")}} <br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif