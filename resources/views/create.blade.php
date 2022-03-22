@extends('templates.template')
@section('content')
    <h1 class="text-center">@if(isset($book))Edit @else Register @endif</h1>

    <div class="col-8 m-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(isset($book))
            <form name="formEdit" id="formEdit" method="POST" action="{{url("books/$book->id")}}">
                @method('PUT')
        @else
            <form name="formCad" id="formCad" method="POST" action="{{url('books')}}">
        @endif

            @csrf
            <input class="form-control" type="text" name="title" id="title" placeholder="Title:" value="{{$book->title ?? ''}}" required>
            <select class="form-control" name="id_user" id="id_user" required>
                <option value="{{$book->relUsers->id ?? ''}}">{{$book->relUsers->name ?? 'Author'}}</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <input class="form-control" type="text" name="pages" id="pages" placeholder="Pages:" value="{{$book->pages ?? ''}}" required>
            <input class="form-control" type="text" name="price" id="price" placeholder="Price:" value="{{$book->price ?? ''}}" required>
            <input class="btn btn-primary" type="submit" value="@if(isset($book))Edit @else Register @endif">
        </form>
    </div>
@endsection
