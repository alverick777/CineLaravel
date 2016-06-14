
<div id="wrapper_menu"> 
    <ul class="menu">
        <li class="item1"><a href="#">Peliculas <span>{{ $total_peliculas }}</span></a>
			<ul>
                <li class="subitem1"><a href="{{ route('frontend.peliculas') }}">All <span>{{ $total_peliculas }}</span></a></li>
                @foreach($peliculas666 as $final)
                    <li id="li_submenu" class="subitem2"><a href="{{ route('principal.filter', $final->genero) }}">{{ $final->genero }} <span> {{ $final->total }}</span></a></li>
                @endforeach
                <li class="subitem1"><a href="{{ route('frontend.trailer') }}">Trailers <span>{{ $total_trailers }}</span></a></li>               
            </ul>
        </li>		    
        <li class="item3"><a href="#">Series TV.<span> {{ $total_series }} </span></a>
            <ul>
                <li class="subitem2"><a href="{{ route('frontend.series') }}">All <span>{{ $total_series }}</span></a></li>
                @foreach($series666 as $series_final)
                    <li class="subitem2"><a href="{{ route('principal.filterSeries', $series_final->genero) }}">{{ $series_final->genero }} <span> {{ $series_final->total }} </span></a></li>
                 @endforeach    
            </ul>
        </li>
        <li class="item4"><a href="#">Actores <span>{{ $total_actores }}</span></a>
            <ul>
                <li class="subitem3"><a href="{{ route('frontend.actores') }}"> All <span>{{ $total_actores }}</span></a></li>
                <li class="subitem3"><a href="{{ route('principal.filterSexo', 'M') }}"> Actores <span>{{ $total_actoresmasculinos }}</span></a></li> 
                <li class="subitem4"><a href="{{ route('principal.filterSexo', 'F') }}"> Actrices <span>{{ $total_actrices }}</span></a></li>
            </ul>  
        </li>
        <li class="item5"><a href="#">Software <span>no data</span></a></li>
        <li class="item6"><a href="#">Videogames <span>no data</span></a></li>

        <li class="item7"><a href="#">Directores <span>{{ $total_directores }}</span></a>
            <ul>
                <li class="subitem3"><a href="{{ route('frontend.directores') }}"> All <span>{{ $total_directores }}</span></a></li>
                <li class="subitem3"><a href="{{ route('principal.filterSexoDirector', 'F') }}"> Female <span>{{ $totalfemaledirectors }}</span></a></li> 
                <li class="subitem4"><a href="{{ route('principal.filterSexoDirector', 'M') }}"> Male <span>{{ $totalmaledirectors }}</span></a></li>
            </ul>  
        </li>
        <li class="item8"><a href="#">Books <span>no data</span></a></li>
        <li class="item9"><a href="#">Noticias </a></li>        
        <li class="item11"><a href="#">Oscars </a>
            <ul>
                <li class="subitem1"><a href="{{ route('frontend.oscars') }}">Oscars Winners </a></li>
            </ul>
        </li>        
    </ul>
 
</div>