<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.header')
    <title>@yield('titre')</title>
</head>
@include('layouts.modal')
<body class="w-100" style="background-image: url({{url('assets/img/bank.jpg')}});background-size: cover;">  
    <!-- Menu principal -->
    <nav class="px-3 navbar navbar-expand-lg navbar-dark bg-dark border-bottom " style="background: #0f222b!important; color: rgb(39, 148, 29);line-height: 24px;
        font-family: 'Source Sans Pro', sans-serif;">
        <div class="nav-brand">
            <img src="{{url('assets/img/logo1.png')}}" class="" height="60" width="80">
        </div>
        <button class="navbar-toggler " data-bs-toggle="collapse" data-bs-target=".coll">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse coll justify-content-center">
            <ul class="nav nav-pills h5" role="tablist">
                <li class="navbar-item mr-3">
                    <a class="nav-link text-success" href="/" role="tab" aria-selected="true"><span class="bi-house-door "></span>{{ __(" Acceuil") }}</a>
                </li>
                <li class="navbar-item mr-3">
                    <a class="nav-link text-success" href="#" data-bs-toggle="modal" data-bs-target="#virement"><span class="bi bi-currency-exchange"></span>{{ __("Virement") }}</a>
                </li>
                <li class="navbar-item mr-3 dropdown">
                    <a class="nav-link text-success" href="/message/nuru_banque" role="tab" aria-selected="true"><span class="bi-chat-text"></span>{{ __("Message") }}</a>
                    <div class="dropdown-content">
                        <div><small class="h6 text-dark">Message Recent</small></div>
                        <div class="dropdown-divider"></div>
                        <div><small class="h6 text-dark">Message de groupe</small></div>
                    </div>
                </li>
                <li class="navbar-item mr-3">
                    <div class="dropdown">
                        <a class="nav-link text-success" href="#" id="drop" data-bs-toggle="dropdown">
                            <span class="bi-person-plus"></span>{{ __("Partenaires") }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="drop">
                            <a class="dropdown-item" href="#">BCC</a>
                            <a class="dropdown-item" href="#">Tmb</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">{{ __("Autres") }}</a>
                        </div>
                    </div>
                </li>
                <li class="navbar-item mr-3">
                    <a class="nav-link text-success" href="#" role="tab" aria-selected="true"><span class="bi-info-circle"></span>{{ __("Info Alert") }}</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Menu principal fin -->
<div class="row w-100 m-0">
    <div class="col-md-2 d-flex justify-content-center col-2 " style="background: #0f222b;">
        <div class="d-flex flex-column align-items-center align-items-sm-start text-white">
            <div class="">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
                    <li class="nav-item border-bottom w-100 pt-2 pb-2">
                        <a href="#" class="nav-link align-middle px-0 mhl  h-50" data-bs-toggle="collapse" data-bs-target="#coll">
                            <i class="bi-person-circle bi--xl "></i>  <span class="ms-1 d-none d-sm-inline">{{ __("Profil") }}</span>
                        </a>
                        <div class="collapse" id="coll">
                            <ul class="list-unstyled ml-4">
                                <li class="">
                                    <a href="{{ url('profil')}}" >
                                        <i class="bi-person-check-fill"></i><span class="ms-1 d-none d-sm-inline">{{ __("Afficher profil") }}</span>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{url('alter_account')}}">
                                        <i class="bi-pencil-square"></i><span class="ms-1 d-none d-sm-inline">{{  __ ("Modifier")}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item border-bottom w-100 pt-2 pb-2">
                            <div class="dropdown">
                                <a href="" class="nav-link align-middle px-0 mhl  h-50 " data-bs-toggle="modal" data-bs-target="#verifier_solde">
                                <i class="bi-safe-fill bi--xl "></i>  <span class="ms-1 d-none d-sm-inline">{{ __("Verifier Solde") }}</span></a>
                            </div>
                      
                    </li>
                    <li class="nav-item border-bottom w-100 pt-2 pb-2">
                        <a href="" class="nav-link align-middle px-0 mhl  h-50 " data-bs-toggle="modal" data-bs-target="#rapport">
                            <i class="bi-bank2 bi--xl "></i>  <span class="ms-1 d-none d-sm-inline">{{ __("Transaction") }}</span>
                        </a>
                    </li>
                    <li class="nav-item border-bottom w-100 pt-2 pb-2">
                        <a href="{{url('statistiques_user') }}" class="nav-link align-middle px-0 mhl  h-50" >
                            <i class="bi-graph-up-arrow bi--xl "></i>  <span class="ms-1 d-none d-sm-inline">{{ __("Statistiques") }}</span>
                        </a>
                    </li>
                    <li class="nav-item border-bottom w-100 pt-2 pb-2">
                        <a href="#" class="nav-link align-middle px-0 mhl  h-50 ">
                            <i class="bi-motherboard-fill bi--xl "></i>  <span class="ms-1 d-none d-sm-inline">{{ __("Coffre-fort") }}</span>
                        </a>
                    </li>
                    <li class="nav-item border-bottom w-100 pt-2 pb-2">
                        <a href="#" class="nav-link align-middle px-0 mhl  h-50 ">
                            <i class="bi-plus-square bi--xl "></i>  <span class="ms-1 d-none d-sm-inline">{{ __("Autres") }}</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a href="{{ url('logout')}}" class="nav-link align-middle px-0 mhl  h-50 ">
                            <i class="bi-box-arrow-in-right icon-2x bi--xl "></i>  <span class="ms-1 d-none d-sm-inline">{{ __("Déconnection") }}</span>
                        </a>
                    </li>
                    <!-- <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="B_img/2.jpg" alt="profil" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">Daniel Kikimba</span>
                        </a>
                    </div> -->
                    
                </ul>
            </div>
        </div>
        
    </div>
    <div class="col-md-10 col-10 p-0 position-relative">
        <div style="z-index: 2!important;" class="position-absolute col-lg-12 mx-auto">@include('layouts.errorException')</div>
        <div class=" w-100" style="z-index: 1!important;">
        @yield('contenu')
        </div>
    </div>
</div>
<!-- Footer -->
@include('layouts.footer')
<!-- Fin footer -->
</body>
</html>
<style>
    .dropdown {
  position: relative;
  display: inline-block;
}

*[class^="dropdown-content"] {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: max-content;
  border-radius: 5px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content, .dropdown2:hover .dropdown-content2,.dropdown3:hover .dropdown-content3,.dropdown4:hover .dropdown-content4,.dropdown5:hover .dropdown-content5  {
  display: block;
}
    .adC{
        background:#0f222bd2;
    }
    .adC2{
        background:none;
        border:none;
    }
</style>
<script>
    $('h1').click(function() {
            $.ajax({
                type:"POST",
                url: "ajax.php",
                data: { "code": code },
                datatype: "xml",
                success: function() {
                $(xml).find('site').each(function(){
                    //do something
                });
            });
        });
</script>