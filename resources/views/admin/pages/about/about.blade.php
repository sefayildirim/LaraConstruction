@extends('admin.layouts.backend')

@section('title')
@endsection()

@section('css')
@endsection()

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>About</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">About</li>
                    <li class="breadcrumb-item active">About Page</li>
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
                            <h5 class="card-title">About</h5>
                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('about.update') }}"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $about->id }}">

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">İmage</label>
                                    <div class="col-sm-10">
                                        <img width="80px" height="80px" src="../../../frontend/img/{{ $about->photo }}" alt="">
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
                                        <input name="title" value="{{ $about->title }}" type="text" class="form-control">
                                        @error('title')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Video Link</label>
                                    <div class="col-sm-10">
                                        <input name="video_link" value="{{ $about->video_link }}" type="video_link" class="form-control">
                                        @error('video_link')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" class="form-control" style="height: 100px">{{ $about->description }}</textarea>
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
