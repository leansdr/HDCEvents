@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')


<h1>Algun titulo</h1>
<img src="/img/banner.jpg" alt="">
<p>{{$nome}}</p>

@if($nome == "Pedro")
<p>O nome é Pedro</p>
@elseif($nome == "Leandro")
<p>O nome é {{$nome}} e ele tem {{$idade}} e trabalha como {{$profissao}}</p>
@else
<p>O nome não é Pedro</p>
@endif


@for($i = 0; $i < count($arr); $i++) <p>{{ $arr[$i]}} - {{$i}} </p>

    @endfor

    @php

    $nome = 'Leandro';
    echo $nome;

    @endphp

    <!--Comentario do HTML-->
    {{--Este é o comentario do Blade--}}

    @foreach($nomes as $nome)
    <p>{{$loop->index}}</p>
    <p>{{$nome}}</p>
    @endforeach

    @endsection