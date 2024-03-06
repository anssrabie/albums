@extends('layouts.master')
@section('title', 'Add a new album')
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><i class="fas fa-plus-square"></i> Add a new album </h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
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

                    <form method="post" action="{{route('albums.store')}}" enctype="multipart/form-data"
                          id="albumForm">
                        @csrf

                        <div class="form-group">
                            <label>Album Name <span class="text-danger">*</span></label>
                            <input class="form-control" value="{{old('name')}}" name="name" type="text"
                                   required maxlength="255">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="row" id="dynamicSections">

                            <div class="col-sm-12 dynamic-section">

                                <div class="row">
                                    <div class="col-sm-5">

                                        <div class="form-group">
                                            <input maxlength="255" placeholder="Photo name ( Optional )" class="form-control" name="photo_names[]" type="text">
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="photo[]" accept="image/*"  required>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-danger btn-block removeSection" disabled>Remove</button>
                                    </div>

                                </div>


                            </div>

                        </div>

                        <div class="col-sm-12 mt-2">
                            <div class="form-group">
                                <div class="text-center">

                                    <button type="submit" class="btn btn-success">Add</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    <button type="button" class="btn btn-info" id="addSection">Add Image</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
    <script src="{{asset('assets/js/dynamic-image.js')}}"></script>
@endsection
