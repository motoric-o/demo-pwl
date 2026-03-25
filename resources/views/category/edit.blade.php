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
                    <a href="#">Category Update Form</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <a href="{{ route('category.index') }}" class="btn btn-primary" role="button">Back to Category</a>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('category.update', $category->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="number" class="form-control" id="id" name="id" value="{{ $category->id }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" maxlength="60" value="{{ $category->name }}" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" maxlength="150">{{ $category->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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