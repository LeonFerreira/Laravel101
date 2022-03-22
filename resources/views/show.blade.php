@extends('templates.template')
@section('content')
    <h1 class="text-center">View</h1>

    <div class="col-8 m-auto">
       Title: {{$book->title}}<br>
       Pages: {{$book->pages}}<br>
       Price: R${{$book->pages}}<br>
       Author: {{$book->user->name}}<br>
       Author's E-mail: {{$book->user->email}}<br>
    </div>
@endsection