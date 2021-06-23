@extends('layouts.public')

@section('content')

    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13105.39413013117!2d-58.4620099!3d-34.7971723!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc4a59bfd299e8868!2sLuis%20Guillon%20Industrial%20Park!5e0!3m2!1sen!2sar!4v1623943177222!5m2!1sen!2sar" height="340" style="border:0; width: 100%;" allowfullscreen="" loading="lazy"></iframe>
<div class="container my-5">
	<div class="row">
		<div class="col-md-4 contacto-info">
            <h1>CONTACTO</h1>
			<p class="mb-4">Para más información, no dude enescribir un formulario y contactar a nuestro equipo de profesionales.</p>
			<div class="contact__info mb-4">
				<i class="fas fa-map-marker-alt"></i>
				<div class="contact__info__content">
					<div class="contact__info__title">DIRECCIÓN</div>
					<div class="contact__info__text"> </div>
				</div>
			</div>
			<div class="contact__info mb-4">
				<i class="fas fa-phone-alt"></i>
				<div class="contact__info__content">
					<div class="contact__info__title">TELÉFONO</div>
					<div class="contact__info__text"> </div>
				</div>
			</div>
			<div class="contact__info mb-4">
				<i class="fas fa-paper-plane"></i>
				<div class="contact__info__content">
					<div class="contact__info__title">CORREO</div>
					<div class="contact__info__text"> </div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
            <form-contacto url-action="{{ route('website.contacto') }}"></form-contacto>
        </div>
	</div>
</div>

@endsection