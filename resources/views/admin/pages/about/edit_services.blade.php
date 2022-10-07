@extends('admin.layouts.backend')

@section('title')
@endsection()

@section('css')
@endsection()

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Slider</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">About</li>
                    <li class="breadcrumb-item active">Edit About Services</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Services</h5>
                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('aboutservices.update') }}"  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $aboutservices->id }}">

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input name="title" type="text" class="form-control" value="{{ $aboutservices->title }}">
                                        @error('title')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputLink" class="col-sm-2 col-form-label">Icon</label>
                                    <div class="col-sm-10">
                                        <input name="icon" type="text" value="{{ $aboutservices->icon }}" class="form-control">
                                        @error('link')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputLink" class="col-sm-2 col-form-label">Number</label>
                                    <div class="col-sm-10">
                                        <input name="number" type="text" value="{{ $aboutservices->number }}" class="form-control">
                                        @error('number')
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
