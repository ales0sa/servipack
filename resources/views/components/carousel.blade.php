
<div>
    <div id="carouselWebsite" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($data as $key => $item)
            <button type="button" data-bs-target="#carouselWebsite" data-bs-slide-to="{{ $key }}" {!! $loop->first ? 'class="active" aria-current="true"' : '' !!} aria-label="Slide {{ $key }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($data as $item)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="background-image: url({{ $item->image }})">
                <div class="carousel-item__overlay"></div>
                <div class="carousel-item__container">
                    <div class="container">
                        <div class="carousel-item__text1">
                            {{ $item->text1 }}
                        </div>
                        <div class="carousel-item__text2">
                            {{ $item->text2 }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselWebsite"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselWebsite"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>