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
                        <a href="#">Book Update Form</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('book.index') }}" class="btn btn-primary" role="button">Back to Books</a>
                </div>
                {{-- <div class="card-body">
                    <img src="{{ $book->cover ? asset('storage/app/public/uploads/' . $book->cover) : asset('storage/uploads/default.jpg') }}"
                        alt="Book Cover" class="img-thumbnail mb-3" style="max-width: 200px;">
                </div> --}}
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('book.update', $book->isbn) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" maxlength="13" autofocus required
                                value="{{ old('isbn', $book->isbn) }}" disabled>
                            @error('isbn')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" maxlength="60" required
                                value="{{ old('title', $book->title) }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" name="author" maxlength="60" required
                                value="{{ old('author', $book->author) }}">
                            @error('author')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="publish_year">Publish Year</label>
                            <input type="number" class="form-control" id="publish_year" name="publish_year" maxlength="4"
                                required value="{{ old('publish_year', $book->publish_year) }}">
                            @error('publish_year')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4"
                                maxlength="150">{{ old('description', $book->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="cover">Cover</label>
                            <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
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