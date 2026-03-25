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
                    <a href="#">Starter Page</a>
                </li>
            </ul>
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