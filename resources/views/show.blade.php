@extends('templates.template')
@section('content')
    <h1 class="text-center">View</h1>

    <div class="col-8 m-auto">
        @php
            $user=$book->find($book->id)->relUsers;
        @endphp
       Title: {{$book->title}}<br>
       Pages: {{$book->pages}}<br>
       Price: R${{$book->pages}}<br>
       Author: {{$user->name}}<br>
       Author's E-mail: {{$user->email}}<br>

    </div>
@endsection