@extends('layouts.master')
@section('title', 'Albums')
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><i class="fas fa-images"></i> Albums </h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <div class="d-flex my-xl-auto right-content">
                    <a class="btn btn-primary" href="{{route('albums.create')}}"> <i class="fas fa-plus-square"></i> Add a new album </a>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row row-sm">

        <!-- /Col -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if(isset($albums) AND count($albums) > 0)

                        <div class="table-responsive">
                            <table class="table text-md-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Total Photos</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($albums as $album)
                                    <tr>
                                        <th>{{$album->id}}</th>
                                        <th>{{$album->name}}</th>
                                        <th>{{$album->photos()->count()}}</th>
                                        <th class="td_nowrap">
                                            <a href="{{route('albums.edit',$album->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                            <form method="post" action="{{route('albums.destroy',$album->id)}}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="@if($album->photos()->count() > 0) show_confirm @endif btn btn-danger btn-sm">Delete</button>
                                            </form>
                                            @if($album->photos()->count() > 0)
                                                <form method="post" action="{{ route('photos.deleteAll',$album->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning btn-sm confirm_delete_all">Delete All Photos</button>
                                                </form>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h3>There is no albums</h3>
                    @endif

                </div>

            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

@endsection
@section('js')
    <script type="text/javascript">

        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            showConfirmation("Are you sure you want to delete an album with photos?", form);
        });

        $('.confirm_delete_all').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            showConfirmation("Are you sure to delete all the photos inside the album?", form);
        });

    </script>
@endsection

