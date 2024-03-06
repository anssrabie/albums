@extends('layouts.master')
@section('title', 'Edit album')
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><i class="fas fa-edit"></i> Edit album </h4>
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

                    <form method="post" action="{{route('albums.update',$album->id)}}" enctype="multipart/form-data"
                          id="albumForm">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label>Album Name <span class="text-danger">*</span></label>
                            <input class="form-control" value="{{$album->name}}" name="name" type="text"
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
                                            <input type="file" class="form-control" name="photo[]" accept="image/*" >
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

                                    <button type="submit" class="btn btn-success">Save</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    <button type="button" class="btn btn-info" id="addSection">Add Image</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="card">
                <div class="card-header">Current photos</div>
                <div class="card-body">
                    @if ($photos->count() > 0)
                        <div class="mb-3">
                            <form method="post" action="{{ route('photos.deleteAll',$album->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger confirm_delete_all">Delete All Photos</button>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered text-md-nowrap">
                                <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                    <th>Move to album</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($photos as $photo)
                                    <tr>
                                        <td class="text-center">
                                            <a href="#" class="image-popup">
                                                <img width="50px" height="50px" src="{{ showImage($photo->path) }}" class="img-fluid" alt="Photo">
                                            </a>
                                        </td>
                                        <td>{{ $photo->name }}</td>
                                        <td>
                                            <form method="post" action="{{route('photos.destroy',$photo->id)}}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="show_confirm btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('photos.move', $photo->id) }}">
                                                @csrf
                                                @if(count($albums) > 0)

                                                <div class="form-group d-flex justify-content-between">
                                                    <select name="album_id" class="form-control" style="flex: 1;">
                                                        @foreach($albums as $album)
                                                            <option value="{{ $album->id }}">{{ $album->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="btn btn-primary confirm_move btn-sm ml-2">Move to Album</button>
                                                    @else
                                                        <h6>There are no albums</h6>
                                                    @endif
                                                </div>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No photos available.</p>
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
   <script src="{{asset('assets/js/dynamic-image.js')}}"></script>
   <script type="text/javascript">

       $('.show_confirm').click(function(event) {
           var form = $(this).closest("form");
           event.preventDefault();
           showConfirmation("Are you sure you want to delete this photo?", form);
       });

       $('.confirm_move').click(function(event) {
           var form = $(this).closest("form");
           event.preventDefault();
           showConfirmation("Are you sure you want to move this photo to another album?", form);
       });


       $('.confirm_delete_all').click(function(event) {
           var form = $(this).closest("form");
           event.preventDefault();
           showConfirmation("Are you sure to delete all the photos inside the album?", form);
       });
   </script>
@endsection
