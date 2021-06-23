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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.1/css/all.css" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/website.css') }}?{{ $assets_version }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
      
     // $active = 'website';

      
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
              
              <div class="" style="background: black;"
                
              >
                
              @if ( !auth()->check() )
                <div class="">
                    <a href="{{ route('website.client-area') }}" class="btn-clients-area"><i class="fas fa-user"></i> Ingresar / Registrarse </a>
                </div>
                @else
                <div class="">
                    <a class="btn-clients-area" ><i class="fas fa-user me-2"></i> {{ auth()->user()->name }}</a>
                    
                </div>
                @endif

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
            <a href="{{ route('website.home') }}" class="col col-md-4 text-center text-md-start">
                <img src="{{ $companyData->header_logo }}" alt="" class="img-fluid pb-3" width="290px" >
            </a>
            <div class="col-md-8 header__navbar-collapse">
                <a href="{{ route('website.home') }}" class="header__navbar-item {{ __active($active, 'website.home', 'header__navbar-item--active') }}">HOME</a>
                <a href="{{ route('website.empresa') }}" class="header__navbar-item {{ __active($active, 'website.empresa', 'header__navbar-item--active') }}">EMPRESA</a>
                <a href="{{ route('website.productos') }}" class="header__navbar-item {{ __active($active, 'website.productos', 'header__navbar-item--active') }}">Productos</a>
                <a href="{{ route('website.clientes') }}" class="header__navbar-item {{ __active($active, 'website.clientes', 'header__navbar-item--active') }}">CLIENTES</a>
                <a href="{{ route('website.novedades') }}" class="header__navbar-item {{ __active($active, 'website.cart', 'header__navbar-item--active') }}">Novedades</a>
                <a href="{{ route('website.contacto') }}" class="header__navbar-item {{ __active($active, 'website.contacto', 'header__navbar-item--active') }}">contacto</a>


                <cart ref="cart" />
                
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
    
        <div class="footer" style="background: #000000; padding-bottom: 30px; border-top: 12px solid #00AFEF;">

		<footer class="footer mt-5" >
			<div class="footer__overlay"></div>
			<div class="container footer__container">
				<div class="footer__container-overlay" ></div>
				<div class="row">
					<div class="col-lg-3 footer__first-column">
                        <img src="/storage/{{ $cf->config_value }}" width="262px" >

                            
                        <?php $redes =  json_decode($header_networks[0]->config_value); ?>


                        <div class="networks mt-3">
                        @foreach($redes as $red)                              
                            <span class="network">
                                
                                <a href="{{ $red->link }}" >
                                    <i class="{{ $red->icon }}"> </i>
                                </a>

                            </span>
                        @endforeach
                        </div>





					</div>
					<div class="col-lg-3 d-none d-lg-block">
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

							<div class="footer__contact-slot row" >

                                <?php
                                        
                                    $data = json_decode($clinks[0]->config_value);

                                    $data = collect($data);
                                    //$cinf = [];
                                    ?>
                                <div class="col-8">
                                @foreach($data->slice(0,2)  as $cl)
								<a href="{{ $cl->link }}">
									<div class="footer__contact-icon"  ><i class="{{ $cl->icon}}"></i></div>
									<div class="mx-3" > {{ $cl->text }}</div>
								</a>
								@endforeach
                                </div>
                                <div class="col-4">
                                @foreach($data->slice(2,4) as $cl)
								<a href="{{ $cl->link }}">
									<div class="footer__contact-icon"  ><i class="{{ $cl->icon}}"></i></div>
									<div class="mx-3" > {{ $cl->text }}</div>
								</a>
								@endforeach
                                </div>


							</div>


						</div>
					</div>
                    <div class="col-lg-1 text-center">
                    
                        <img style="max-width: 80px; margin: auto; " src="/storage/{{ $qr->config_value }}" />
                    </div>
				</div>
			</div>
		</footer>
		
	</div>


            </div>
        </div>
    </div>

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