@extends('layouts.public')

@section('content')
<div class="row-fluid breadcrumbs">
    <div class="container">

        <i class="fa fa-home"></i> Novedades
    </div>
</div>


<div class="container mt-5">
    @if (count($featuredPosts))
	<div class="row">
		<div class="col-md-12">
			<div style="font-size: 20px; color: #545871; font-weight: 600;">Últimas Noticias</div>
			<hr style="border-top: 1px solid #904B7A; margin-top: .5rem;">
		</div>
	</div>
	<div class="row">
		@foreach ($featuredPosts as $post)
			<div class="col-md-6">
				<a href="{{ route('website.blog-post', $post->id) }}" class="featured-posts">
					<div class="featured-posts__image" style="background-image: url({{ asset(Storage::url($post->image)) }});">
						<div class="featured-posts__space"></div>
						<div class="featured-posts__overlay">
							<i class="far fa-eye"></i>
						</div>
					</div>
					<div class="featured-posts__times"><i class="far fa-clock"></i> {{ Date::parse($post->created_at)->ago() }}</div>
					
					<div class="featured-posts__title">{{ $post->title }} <i class="fas fa-angle-right"></i></div>
					<div class="featured-posts__resume">{{ substr(strip_tags($post->content), 0, 180) }} </div>
				</a>
			</div>
		@endforeach
    </div>
    @endif
	<div class="row mb-4">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12">
					<div style="font-size: 17px; color: #545871; font-weight: 600;">Noticias</div>
					<hr style="border-top: 1px solid #904B7A; margin-top: .5rem;">
				</div>
				@foreach ($posts as $post)
					<div class="col-md-6">
						<a href="{{ route('website.blog-post', $post->id) }}" class="featured-posts">
							<div class="featured-posts__image" style="background-image: url({{ asset(Storage::url($post->image)) }});">
								<div class="featured-posts__space"></div>
								<div class="featured-posts__overlay">
									<i class="far fa-eye"></i>
								</div>
							</div>
							<div class="featured-posts__times"><i class="far fa-clock"></i> {{ Date::parse($post->created_at)->ago() }}</div>
							<div class="featured-posts__title">{{ $post->title }} <i class="fas fa-angle-right"></i></div>
						</a>
					</div>
                @endforeach
                <div class="col-md-12">{!! $posts->links() !!}</div>
			</div>
		</div>
		<div class="col-md-4">
			@include('components.blog-sidebar')
		</div>
	</div>
</div>

@endsection