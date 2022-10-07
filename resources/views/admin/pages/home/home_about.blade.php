@extends('admin.layouts.backend')

@section('title')
@endsection()

@section('css')
@endsection()

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Home About</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Home About</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <h5 class="card-title">Home About</h5>
                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('homeabout.update') }}"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $homeabout->id }}">

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">İmage</label>
                                    <div class="col-sm-10">
                                        <img width="80px" height="80px" src="../../../frontend/img/{{ $homeabout->photo }}" alt="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputFile" class="col-sm-2 col-form-label">File Upload</label>
                                    <div class="col-sm-10">
                                        <input name="image" class="form-control" type="file" id="formFile">
                                        @error('image')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input name="title" value="{{ $homeabout->title }}" type="text" class="form-control">
                                        @error('title')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" class="form-control" style="height: 100px">{{ $homeabout->description }}</textarea>
                                        @error('description')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form><!-- End General Form Elements -->
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main><!-- End #main -->
@endsection()

@section('js')
@endsection()
