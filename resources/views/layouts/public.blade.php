<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        $cf = \DB::table('config_vars')->where('config_key', 'footer_logo')->first();
        $qr = \DB::table('config_vars')->where('config_key', 'header_portrait')->first();
        $clinks = \DB::table('config_vars')->where('config_key', 'footer_info')->get('config_value');
        $header_networks = \DB::table('config_vars')->where('config_key', 'header_networks')->get('config_value');
        $active =  \Route::currentRouteName();
        $redes =  json_decode($header_networks[0]->config_value); 
    ?>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- <title>@yield('title', __meta('default', 'title'))</title> -->
        <title> ServiPack </title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />


    <meta name="public-path" content="{{ asset('/') }}">
    <meta name="storage-path" content="{{ asset(Storage::url('/')) }}">

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="@yield('author', __meta('default', 'author'))" />
    <meta property="og:title" content="@yield('title', __meta('default', 'title'))" />
    <meta property="og:description" content="@yield('description', __meta('default', 'description'))" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="preconnect" rel="noreferrer" href="https://fonts.gstatic.com">    
    <!-- <link rel="stylesheet" rel="noreferrer" href="https://use.fontawesome.com/releases/v5.10.1/css/all.css" crossorigin="anonymous"> -->
    <!-- Styles -->
    <link href="{{ asset('css/website.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="noreferrer" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="noreferrer" href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway:wght@700&display=swap" rel="stylesheet">
    <script rel="noreferrer" src="https://kit.fontawesome.com/a82e74739c.js" crossorigin="anonymous"></script>

    <style>


.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.newmenu ul{

        padding: 0;
        list-style: none;
        background: #f2f2f2;
    }
    ul li{
        display: inline-block;
        position: relative;
        line-height: 21px;
        text-align: left;
    }
    ul li a{
        display: block;
        padding: 8px 3px;
        color: #333;
        text-decoration: none;
    }
    ul li a:hover{
        color: #57afef;
    }
    ul li ul.dropdown{
        min-width: 100%; /* Set width of the dropdown */
        background: #f2f2f2;
        display: none;
        position: absolute;
        z-index: 999;
        left: 10px;
        border-top: 7px solid #57afef;
    }
    ul li:hover ul.dropdown{
        display: block;	/* Display the dropdown */
    }
    ul li ul.dropdown li{
       padding: 10px;
    }
    </style>
</head>
<body>
    <div id="app">
        
        <div id="app-content">
            
        <?php
    


    // HARDCODEADO 

        $logo_footer = 
      $companyData =  new stdClass();
      $companyData->header_direccion = 'test';
      $companyData->header_email = 'info@servipackembalajes.com.ar';
      $companyData->header_telefono  = '11-3678-6440';
      $companyData->header_direccion = 'test';
      $companyData->header_logo  = '/logo.png';
      $companyData->footer_logo  = '/footer.png';
       
     // $active = 'website';

      $categories = \App\Models\Categorias::get();
    ?>
    <div class="header__headband">
    <div class="container">
        <div class="row">
            <div class="col-md-8 d-flex">
                
                <a style="color:white;" class="header__headband-item" href="mailto:{{$companyData->header_email}}">
                        <div style="padding-left: 15px; padding-right: 15px;">
                        <i class="fas fa-envelope"></i>
                        {{ $companyData->header_email }}
                        
                    </div>
                    </a>
            
                    <a style="color:white;"  class="header__headband-item" href="tel:{{$companyData->header_telefono}}">
                    <div style="padding-left: 15px; padding-right: 15px;">
                        <i class="fas fa-phone-alt"></i>
                        {{ $companyData->header_telefono }}
</div>
                </a>
            </div>
            <div class="col-md-4 d-flex justify-content-end">

                
                <div class="botonlogin"
                
                >
                
                <a  class="btn-clients-area" href="/contacto" > 
                <i class="fas fa-headphones"></i>
                CONTACTO </a>


              </div>

              <div>
              @foreach($redes as $red)                              
              
                                    <div class="header__headband-networks">
                                <a href="{{ $red->link }}" style="color: white;" >
                                    
                                    <!-- @switch($red->icon)
                                        @case('fa fa-facebook')
                                            <img src="/fb.png" />
                                        @break
                                        @case('fa fa-instagram')
                                            <img src="/in.png" />
                                        @break
                                        @case('fa fa-youtube')
                                            <img src="/yt.png" />
                                        @break
                                        @case('fa fa-linkedin')
                                            <img src="/li.png" />
                                        @break
                                    @endswitch -->
<i class="{{ $red->icon }}"> </i> 
                                </a>
                                </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header__navbar">


    <div class="container">

        <div class="row" style="margin-top: 9px;     min-height: 89.33px;">

        
            <a href="{{ route('website.home') }}" class="col col-md-3 text-center text-md-start">
                <img src="{{ $companyData->header_logo }}" alt="" class="img-fluid pb-3" width="290px" height="90px">
            </a>
            <div class="col-md-9 header__navbar-collapse">

            <ul class="newmenu" style="margin-bottom: 0px;">
        <li><a href="{{ route('website.home') }}" class="header__navbar-item {{ __active($active, 'website.home', 'header__navbar-item--active') }}">HOME</a></li>
        <li><a href="{{ route('website.empresa') }}" class="header__navbar-item {{ __active($active, 'website.empresa', 'header__navbar-item--active') }}">EMPRESA</a></li>
        <li>
        <a href="{{ route('website.productos') }}" class="dropdown header__navbar-item {{ __active($active, 'website.productos', 'header__navbar-item--active') }}">Productos &nbsp &nbsp <i class="fa fa-caret-down"></i> </a>
            <ul class="dropdown">
                @foreach($categories as $cat)
                <li><a href="/{{ $cat->id }}/productos" style="text-transform: uppercase;">{{ $cat->title }}</a></li>
                @endforeach
            </ul>
        </li>
        <li> <a href="{{ route('website.clientes') }}" class="header__navbar-item {{ __active($active, 'website.clientes', 'header__navbar-item--active') }}">CLIENTES</a>
        
        </li>
        <li>
        <a href="{{ route('website.novedades') }}" class="header__navbar-item {{ __active($active, 'website.cart', 'header__navbar-item--active') }}">Novedades</a>
                
        </li>

        <li>
        @if ( !auth()->check() )
                
            <a href="{{ route('website.client-area') }}" ><i class="fas fa-user"></i> MI CUENTA </a>
            
        @else
            
                <a  href="/myorders"><i class="fas fa-user me-2"></i> {{ auth()->user()->name }}</a>
                
        @endif

        <!-- <a href="{{ route('website.contacto') }}" class="header__navbar-item {{ __active($active, 'website.contacto', 'header__navbar-item--active') }}">contacto</a>  -->


        </li>

        <li style="     min-height: 49.33px;">
        
                <cart ref="cart" />
        
        </li>
    </ul>



                
            </div>
            <div class="col-auto d-flex align-items-center d-md-none">
                <button type="button" id="toggle-mobile-menu" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-bars"></i></button>
            </div>
        </div>


    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header py-0">
            <img src="{{ $companyData->header_logo }}" alt="" style="max-width: 160px;" width="290px" height="90px">>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="list-group">
            <a href="{{ route('website.home') }}" class="list-group-item list-group-item-action  {{ __active($active, 'website.home', 'active') }}" style="border-radius: 0;">HOME</a>
            <a href="{{ route('website.empresa') }}" class="list-group-item list-group-item-action  {{ __active($active, 'website.empresa', 'active') }}">EMPRESA</a>
            <a href="{{ route('website.productos') }}" class="list-group-item list-group-item-action  {{ __active($active, 'website.productos', 'active') }}">PRODUCTOS</a>
            <a href="{{ route('website.novedades') }}" class="list-group-item list-group-item-action  {{ __active($active, 'website.cart', 'active') }}">COTIZAR</a>
            <a href="{{ route('website.contacto') }}" class="list-group-item list-group-item-action  {{ __active($active, 'website.contacto', 'active') }}">CONTACTO</a>
        </div>
      </div>
    </div>
</div>


        @yield('content')</div>
    
        <div class="footer" style="background: #333333; 
        padding-bottom: 30px; padding-top: 30px;/*border-top: 12px solid #00AFEF;*/">
 
		<footer class="footer mt-5" >
			<div class="footer__overlay"></div>
			<div class="container footer__container">
				<div class="footer__container-overlay" ></div>
				<div class="row">
					<div class="col-lg-3 footer__first-column">
                        
                        <img style="filter: drop-shadow(1px 2px 3px black);" 
                        src="{{ $companyData->header_logo }}">

                            
                        <?php ?>

                    <div class="networks mt-3">
                        @foreach($redes as $red)                              
                            <span class="network">

                                <a href="{{ $red->link }}"  >
                                
                                    @switch($red->icon)
                                        @case('fa fa-facebook')
                                            <img width="30px" height="30px"  src="/fb.png" style="width: 30px;"/>
                                        @break
                                        @case('fa fa-instagram')
                                            <img width="30px" height="30px" src="/in.png"  style="width: 30px;"/>
                                        @break
                                        @case('fa fa-youtube')
                                            <img width="30px" height="30px" src="/yt.png"  style="width: 30px;"/>
                                        @break
                                        @case('fa fa-linkedin')
                                            <img width="30px" height="30px" src="/li.png"  style="width: 30px;"/>
                                        @break
                                    @endswitch
                                    <!-- <i class="{{ $red->icon }}"> </i> -->
                                </a>
                            </span>
                        @endforeach
                    </div>





					</div>
					<div class="col-lg-3 d-none d-lg-block">
						<div class="footer__title" style="color: white; filter: drop-shadow(2px 4px 6px black);">SECCIONES</div>

                        <div class="row">

                        <div class="col-6">
                            <a class="footer__item" style="filter: drop-shadow(1px 2px 3px black);" href="/">Home</a>
                            <a class="footer__item" style="filter: drop-shadow(1px 2px 3px black);" href="/empresa">Empresa</a>
                            <a class="footer__item" style="filter: drop-shadow(1px 2px 3px black);" href="/productos">Producto</a>
                            <a class="footer__item" style="filter: drop-shadow(1px 2px 3px black);" href="/clientes">Clientes</a>
                        </div>
                        <div class="col-6">
                            <a class="footer__item" style="filter: drop-shadow(1px 2px 3px black);" href="/novedades">Novedades</a>
                            <a class="footer__item" style="filter: drop-shadow(1px 2px 3px black);" href="/contacto">Contacto</a>
                        </div>

                        </div>
					</div>
					<div class="col-lg-5 d-none d-lg-block">
						<div class="footer__title" style="color: white; filter: drop-shadow(2px 4px 6px black);">servipack</div>
						<div class="footer__contact">

							<div class="footer__contact-slot row" >

                                <?php
                                        
                                    $data = json_decode($clinks[0]->config_value);

                                    $data = collect($data);
                                    //$cinf = [];
                                    ?>
                                <div class="col-8">
                                @foreach($data->slice(0,2)  as $cl)
								<a href="{{ $cl->link }}" style="filter: drop-shadow(1px 2px 3px black);">
									<div class="footer__contact-icon"  >
                                    <i class="{{ $cl->icon }}" ></i>
                                    <!-- @switch($cl->icon)
                                        @case('fa fa-map')
                                        <img style="width: 22px;"  src="https://img.icons8.com/ios-filled/50/fa314a/marker.png"/>
                                        @break
                                        @case('fa fa-envelope-o')
                                        <img style="width: 22px;"  src="https://img.icons8.com/material/24/4a90e2/mail.png"/>
                                        @break
                                    @endswitch
     -->
                                    </div>
									<div class="mx-3" > {{ $cl->text }}</div>
								</a>
								@endforeach
                                </div>
                                <div class="col-4" style="filter: drop-shadow(1px 2px 3px black);">
                                @foreach($data->slice(2,4) as $cl)



								<a href="{{ $cl->link }}" style="">
                                <div class="footer__contact-icon"  >
                                <i class="{{ $cl->icon }}" ></i>
<!-- 
									  @switch($cl->icon)
                                        @case('fa fa-phone')
                                        <img  style="width: 22px;"  src="https://img.icons8.com/ios/50/ffffff/apple-phone.png"/>@break

                                        @case('fab fa-whatsapp')
                                        <img style="width: 22px;"  src="https://img.icons8.com/color/50/000000/whatsapp--v1.png"/>
                                        @break
                                    @endswitch -->
									<div class="mx-2" > {{ $cl->text }}</div>
								</a>
                                </div>
								@endforeach
                                </div>


							</div>


						</div>
					</div>
                    <div class="col-lg-1 text-center d-flex">
                    
                        <img style="max-width: 80px; margin: auto; " src="/storage/{{ $qr->config_value }}" width="71px" height="87px" />
                    </div>
				</div>
			</div>
		</footer>
		
	</div>


            </div>
        </div>
    </div>
    <a href="https://api.whatsapp.com/send?phone=5491136786440&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20." class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
    <script>
        var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
        var collapseList = collapseElementList.map(function (collapseEl) {
        return new bootstrap.Collapse(collapseEl)
        })
    </script>

    <script type="text/javascript" src="{{ asset('js/app.js').'?'.$assets_version }}"></script>
    @yield('scripts')
</body>
</html>