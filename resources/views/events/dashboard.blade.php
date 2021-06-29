@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
  <h1>Meus Eventos</h1>
</div>
<div class="col-md-0 offset-md-1 dashboard-events-container">
  @if(count($events) > 0)
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Participantes</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($events as $event)
      <tr></tr>
      @endforeach
    </tbody>
  </table>
  @else
  <p>Voçê ainda não tem eventos.<a href="/events/create">Criar um evento</a></p>
  @endif
</div>


@endsection