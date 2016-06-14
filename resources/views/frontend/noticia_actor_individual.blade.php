@extends('template.mainfont')

@section('title', 'Noticia ' . $noticia->titulo)

@section('content')
<style>
	#descripcion_noticia{
		padding: 0px 10px 15px 0px;
		max-width: 87%;
	}
</style>
<br><br>

<div class="container bg_main">		
	<div class="row topp">
		<div class="col-md-2 margin_left">
			<aside>
				@include('template.partials.aside_menu')
			</aside>							
		</div>
		<div class="col-md-9 col-md-offset-1">	
			<header id="titulo_pagina"> {{ $noticia->titulo }}.</header>
			<span id="fecha_noticia">{{ $noticia->created_at->format('l jS \\of F Y h:i:s A') }} | {{ $noticia->created_at->diffForHumans() }} | <a href="{{ route('frontend.actores_individual', $noticia->serie_id) }}">{{ $noticia->actor->nombre }}</a></span>
			<hr>
			<span><img id="imagen" src="{{ asset('img/noticias_actores/' . $noticia->foto) }}" alt=""></span><br><br>
			<p id="descripcion_noticia">
				{{ $noticia->descripcion }}
			</p>
			<br>			
			<br><br>
				<div id="disqus_thread" style="margin-left:15px;width:95%;"></div>
					<script>
						/**
						* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
						* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
						*/
						/*
						var disqus_config = function () {
						this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
						this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
						};
						*/
						(function() { // DON'T EDIT BELOW THIS LINE
						var d = document, s = d.createElement('script');

						s.src = '//sergiomoraga.disqus.com/embed.js';

						s.setAttribute('data-timestamp', +new Date());
						(d.head || d.body).appendChild(s);
						})();
						</script>
						<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
				</div>
		<br><br>
	</div>
</div>		

@endsection

@section('js')

<script>



</script>

@endsection
