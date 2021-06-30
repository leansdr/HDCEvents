@extends('layouts.main')

@section('title', $event->title)

@section('content')

<div class="col-md-10 offset-md-1">
  <div class="row">
    <div id="image-container" class="col-md-6">
      <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{$event->title}}">
    </div>
    <div id="info-container" class="col-md-6">
      <h1>{{$event->title}}</h1>
      <p class="event-city">
        <ion-icon name="pin"></ion-icon>{{$event->city}}
      </p>
      <p class="events-participants">
        <ion-icon name="people"></ion-icon>
        {{count($event->users)}} participantes
      </p>
      <p class="event-owner">
        <ion-icon name="star"></ion-icon>{{$eventOwner['name']}}
      </p>
      <form action="/events/join/{{$event->id}}" method="POST">
        @csrf
        <a href="/events/join/{{$event->id}}" class="btn btn-primary" id="event-submit"
          onclick="event.preventDefault();this.closest('form').submit();">Confirmar
          presença</a>
      </form>
      <h3>O evento conta com:</h3>
      <ul id="items-list">
        @foreach($event->items as $items)
        <li>
          <ion-icon name="play"></ion-icon><span>{{$items}}</span>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="col-md-12" id="description-container">
      <h3>Sobre o evento</h3>
      <p class="events-description">{{$event->description}}</p>
    </div>
  </div>
</div>
@endsection