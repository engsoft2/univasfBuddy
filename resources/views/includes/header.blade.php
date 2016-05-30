<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
     	<a class="navbar-brand" href="{{route('dashboard')}}">
        	Restaurante Universitário
      	</a>
    </div>
    @if(Auth::user())
	   	<ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="{{ route('criar-cardapio') }}">Adicionar Cardápido</a></li>
	            <li><a href="{{ route('historico') }}">Cardápios Anteriores</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="{{ route('logout') }}">Sair</a></li>
	          </ul>
	        </li>
	  	</ul>
	@endif
  </div>
</nav>