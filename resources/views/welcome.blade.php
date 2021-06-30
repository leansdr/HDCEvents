@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

<div id="search-container" class="col-md-12">
  <h1>Busque um Evento</h1>
  <form action="/" method="GET">
    <input type="text" id="search" name="search" class="form-control" placeholder="Procurar..">
    <input type="submit" class="btn btn-primary" value="Pesquisar">
  </form>
</div>
<div id="events-container" class="col-md-12">
  @if($search)
  <h2>Buscando por: {{$search}}</h2>
  @else
  <h2>Proximos Eventos</h2>
  <p class="subtitle">Veja os eventos dos proximos dias</p>
  @endif
  <div id="cards-container" class="row">
    @foreach($events as $event)
    <div class="col-md-3">
      <img src="img/events/{{ $event->image }}" alt="{{$event->title}}">
      <div class="card-body">
        <p class="card-date">{{date('d/m/Y', strtotime($event->date))}}</p>
        <h5 class="card-title">{{$event->title}}</h5>
        <p class="card-participantes">{{count($event->users)}} participantes</p>
        <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
      </div>
    </div>
    @endforeach
    @if(count($events) == 0 && $search)
    <p>Não foi possível encontrar nenhum evento com {{$search}} ! <a href="/">Veja todos</a></p>
    @elseif (count($events) == 0)
    <h4 style="color:#F2A340;">Não há eventos disponíveis</h4>
    @endif
  </div>
</div>
@endsection