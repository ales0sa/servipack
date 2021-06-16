<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        $cf = \DB::table('config_vars')->where('config_key', 'footer_logo')->first();
        $clinks = \DB::table('config_vars')->where('config_key', 'footer_info')->get('config_value');
        $header_networks = \DB::table('config_vars')->where('config_key', 'header_networks')->get('config_value');
    ?>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', __meta('default', 'title'))</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />


    <meta name="public-path" content="{{ asset('/') }}">
    <meta name="storage-path" content="{{ asset(Storage::url('/')) }}">

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="@yield('author', __meta('default', 'author'))" />
    <meta property="og:title" content="@yield('title', __meta('default', 'title'))" />
    <meta property="og:description" content="@yield('description', __meta('default', 'description'))" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.1/css/all.css" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/website.css') }}?{{ $assets_version }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a82e74739c.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        
        <div id="app-content">
            
        <?php
    

      $companyData =  new stdClass();
      $companyData->header_direccion = 'test';
      $companyData->header_email = 'info@servipackembalajes.com.ar';
      $companyData->header_telefono  = '11-3678-6440';
      $companyData->header_direccion = 'test';
      $companyData->header_logo  = '/logo.png';
      
      $active = 'website';

      
    ?>
    <div class="header__headband">
    <div class="container">
        <div class="row">
            <div class="col-md-9 d-flex">
                
                <div class="header__headband-item">
                    <i class="fas fa-envelope"></i>
                    {{ $companyData->header_email }}
                </div>
                <div class="header__headband-item">
                    <i class="fas fa-phone-alt"></i>
                    {{ $companyData->header_telefono }}
                </div>
            </div>
            <div class="col-md-2 d-flex justify-content-end">
              
              <div class="" style="
                background: rgb(0, 175, 239);
                color: white;
                font-size: 12px;
                font-weight: bold;
                padding-right: 14px;
                padding-left: 14px;"
              >

              COTIZACION
              </div>

                <div class="header__headband-networks">
                    <a href="" class="header__headband-item">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="header__headband-item">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header__navbar">
    <div class="container">
        <div class="row" style="margin-top: 9px; ">
            <a href="{{ route('website') }}" class="col col-md-4 text-center text-md-start">
                <img src="{{ $companyData->header_logo }}" alt="" class="img-fluid pb-3" width="290px" >
            </a>
            <div class="col-md-8 header__navbar-collapse">
                <a href="{{ route('website') }}" class="header__navbar-item {{ __active($active, 'website', 'header__navbar-item--active') }}">HOME</a>
                <a href="{{ route('website.empresa') }}" class="header__navbar-item {{ __active($active, 'website.empresa', 'header__navbar-item--active') }}">EMPRESA</a>
                <a href="{{ route('website.productos') }}" class="header__navbar-item {{ __active($active, 'website.productos', 'header__navbar-item--active') }}">Productos</a>
                <a href="{{ route('website.cart') }}" class="header__navbar-item {{ __active($active, 'website.cart', 'header__navbar-item--active') }}">CLIENTES</a>
                <a href="{{ route('website.cart') }}" class="header__navbar-item {{ __active($active, 'website.cart', 'header__navbar-item--active') }}">Novedades</a>
                <a href="{{ route('website.contacto') }}" class="header__navbar-item {{ __active($active, 'website.contacto', 'header__navbar-item--active') }}">contacto</a>
                @if ( !auth()->check() )
                <div class="header__navbar-item header__navbar-item--no-hover">
                    <a href="{{ route('website.clientes') }}" class="btn-clients-area"><i class="fas fa-user"></i> Area de Clientes</a>
                </div>
                @else
                <div class="dropdown header__navbar-item header__navbar-item--no-hover">
                    <div class="header__navbar-user dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user me-2"></i> {{ auth()->user()->fullname }}</div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('website.clientes.logout') }}"><i class="fas fa-sign-out-alt"></i> SALIR</a></li>
                    </ul>
                </div>
                @endif
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
            <img src="{{ $companyData->header_logo }}" alt="" style="max-width: 160px;">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="list-group">
            <a href="{{ route('website') }}" class="list-group-item list-group-item-action  {{ __active($active, 'website.home', 'active') }}" style="border-radius: 0;">HOME</a>
            <a href="{{ route('website.empresa') }}" class="list-group-item list-group-item-action  {{ __active($active, 'website.empresa', 'active') }}">EMPRESA</a>
            <a href="{{ route('website.productos') }}" class="list-group-item list-group-item-action  {{ __active($active, 'website.productos', 'active') }}">PRODUCTOS</a>
            <a href="{{ route('website.cart') }}" class="list-group-item list-group-item-action  {{ __active($active, 'website.cart', 'active') }}">COTIZAR</a>
            <a href="{{ route('website.contacto') }}" class="list-group-item list-group-item-action  {{ __active($active, 'website.contacto', 'active') }}">CONTACTO</a>
        </div>
      </div>
    </div>
</div>


        @yield('content')</div>
    
        <div class="footer" style="background: #000000; padding-bottom: 30px; border-top: 12px solid #00AFEF;">
            <div class="container">

            <div>
		<footer class="footer mt-5" >
			<div class="footer__overlay"></div>
			<div class="container footer__container">
				<div class="footer__container-overlay" ></div>
				<div class="row">
					<div class="col-lg-1 footer__first-column">
                        <img src="/storage/{{ $cf->config_value }}" width="262px" >

                            
                        <?php $redes =  json_decode($header_networks[0]->config_value); ?>


                        <div class="networks">
                        @foreach($redes as $red)                              
                            <span class="network">
                                
                                <a href="{{ $red->link }}" >
                                    <i class="{{ $red->icon }}"> </i>
                                </a>

                            </span>
                        @endforeach
                        </div>





					</div>
					<div class="col-lg-3 offset-3 d-none d-lg-block">
						<div class="footer__title">SECCIONES</div>

                        <div class="row">

                        <div class="col-6">
                            <a class="footer__item" href="/">Home</a>
                            <a class="footer__item" href="/">Empresa</a>
                            <a class="footer__item" href="/">Producto</a>
                            <a class="footer__item" href="/">Clientes</a>
                        </div>
                        <div class="col-6">
                            <a class="footer__item" href="/">Novedades</a>
                            <a class="footer__item" href="/">Cotizar</a>
                            <a class="footer__item" href="/">Contacto</a>
                        </div>

                        </div>
					</div>
					<div class="col-lg-5 d-none d-lg-block">
						<div class="footer__title">servipack</div>
						<div class="footer__contact">

							<div class="footer__contact-slot" >

                                <?php
                                        
                                    $data = json_decode($clinks[0]->config_value);
                                    //$cinf = [];
                                    ?>
                                
                                @foreach($data as $cl)
								<a href="{{ $cl->link }}">
									<div class="footer__contact-icon"  ><i class="{{ $cl->icon}}"></i></div>
									<div class="mx-3" > {{ $cl->text }}</div>
								</a>
								@endforeach
							</div>


						</div>
					</div>
				</div>
			</div>
		</footer>
		
	</div>


            </div>
        </div>
    </div>


    <script type="text/javascript" src="{{ asset('js/app.js').'?'.$assets_version }}"></script>
    @yield('scripts')
</body>
</html>