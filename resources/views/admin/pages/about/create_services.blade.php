@extends('admin.layouts.backend')

@section('title')
@endsection()

@section('css')
@endsection()

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>New Home Services</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item active">New Service</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">New Service</h5>
                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('aboutservices.store') }}"  enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input name="title" type="text" class="form-control">
                                        @error('title')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputLink" class="col-sm-2 col-form-label">Icon</label>
                                    <div class="col-sm-10">
                                        <input name="icon" type="text" value="bi bi-easel" class="form-control">
                                        <span>https://icons.getbootstrap.com/</span>
                                        @error('icon')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputLink" class="col-sm-2 col-form-label">Number</label>
                                    <div class="col-sm-10">
                                        <input name="number" type="text"  class="form-control">
                                        @error('number')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <button type="submit" class="btn btn-primary">Create</button>
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
