@extends('templates.template')
@section('content')
    <h1 class="text-center">CRUD</h1>

    <div class="text-center mt-3 mb-4">
        <a href="{{ route('books.create') }}">
            <button class="btn btn-success">Register</button>
        </a>
    </div>

    <div class="col-8 m-auto">
        @csrf
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    @php
                        $user=$book->find($book->id)->relUsers;
                    @endphp
                    <tr>
                        <th scope="row">{{$book->id}}</th>
                        <td>{{$book->title}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$book->price}}</td>
                        <td>
                            <a href="{{ route('books.update', $book) }}">
                                <button class="btn btn-dark">View</button>
                            </a>

                            <a href="{{ route('books.edit', $book) }}">
                                <button class="btn btn-primary">Edit</button>
                            </a>

                            <a href="{{ url("books/$book->id") }}" class="js-del">
                                <button class="btn btn-danger">Delete</button>
                            </a>

                            {{-- <form action="{{ route('book.destroy', $book) }}" method="post">
                            @method('DELETE')
                            @csrf
                                <button type="submit">Apagar</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
