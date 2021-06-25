 
<div class="col-md-12">
    <div style="font-size: 17px; color: #545871; font-weight: 600;">Categorías</div>
    <hr style="border-top: 1px solid #545871; margin-top: .5rem;">
    <div class="list-tags">
        @foreach ($tags as $tag)
        <a href="#" class="list-tags__item">
            {{ $tag }}
            <span class="list-tags__counter"> 1     </span>
        </a>
        @endforeach
    </div>
</div>

<div class="col-md-12 mt-5">
    <div style="font-size: 17px; color: #545871; font-weight: 600;">Redes Sociales</div>
    <hr style="border-top: 1px solid #904B7A; margin-top: .5rem;">
    <div class="social-links__items social-links__items--gray">
      <!--  <a target="_blank" href="{{ __config_var('social_instagram') }}"><i class="fab fa-instagram"></i></a>
        <a target="_blank" href="{{ __config_var('social_linkedin') }}"><i class="fab fa-linkedin-in"></i></a>
        <a target="_blank" href="{{ __config_var('social_youtube') }}"><i class="fab fa-youtube"></i></a>
        <a target="_blank" href="{{ __config_var('social_facebook') }}"><i class="fab fa-facebook-f"></i></a>
        <a target="_blank" href="{{ __config_var('contacto_twitter') }}"><i class="fab fa-twitter"></i></a> --->
    </div>
</div>