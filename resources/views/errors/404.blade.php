@if (auth()->user())


@extends('layouts.master2')
@section('title','404')
@section('content')
    <!-- Main-error-wrapper -->
    <div class="main-error-wrapper  page page-h ">
        <img src="{{URL::asset('assets/img/media/404.png')}}" class="error-page" alt="error">
        <h2> Page is not found  </h2>
        <a class="btn btn-danger" href="{{ route('home') }}">Go To Homepage</a>
    </div>
    <!-- /Main-error-wrapper -->
@endsection

@else



@endif
