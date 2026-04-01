@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Pages</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Books List</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                @if (Auth::user()->role_id == 1)
                    <div class="card-header">
                        <a href="{{ route('book.create') }}" class="btn btn-primary" role="button">Add Book</a>
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ISBN</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Publisher</th>
                                <th>Description</th>
                                <th>Category</th>
                                @if (Auth::user()->role_id == 1)
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->isbn }}</td>
                                    <td>
                                        @if($book->cover)
                                            <img src="{{ asset('storage/uploads/' . $book->cover) }}" alt="Book Cover"
                                                class="img-thumbnail">
                                        @endif
                                        {{ $book->title }}
                                    </td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->publish_year }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    @if (Auth::user()->role_id == 1)
                                        <td>
                                            <a href="{{ route('book.edit', $book->isbn) }}" class="btn btn-sm btn-warning"
                                                role="button">Edit</a>
                                            <form action="{{ route('book.destroy', $book->isbn) }}" method="post"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete the data: {{ $book->title }} of ID: {{ $book->isbn }}?')">Delete</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="page-category">Hello world!</div>
        </div>
    </div>
@endsection

@section('MasterCSS')
    <style>
        /* .page-category {
                                    color: red;
                                } */
    </style>
@endsection

@section('MasterJS')
    <script>
        // alert('Hello world!');
    </script>
@endsection