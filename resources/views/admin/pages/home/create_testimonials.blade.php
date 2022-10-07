@extends('admin.layouts.backend')

@section('title')
@endsection()

@section('css')
@endsection()

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>New Testimonials</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Testimonials</li>
                    <li class="breadcrumb-item active">New Testimonials</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">New Testimonials</h5>
                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('hometestimonials.store') }}"  enctype="multipart/form-data">
                                @csrf
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
                                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input name="name" type="text" class="form-control">
                                        @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputLink" class="col-sm-2 col-form-label">Authority</label>
                                    <div class="col-sm-10">
                                        <input name="authority" type="text" class="form-control">
                                        @error('authority')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Point</label>
                                    <div class="col-sm-10">
                                        <select name="point" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected value="5">5</option>
                                            <option value="4">4</option>
                                            <option value="3">3</option>
                                            <option value="2">2</option>
                                            <option value="1">1</option>
                                        </select>
                                        @error('point')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" class="form-control" style="height: 100px"></textarea>
                                        @error('description')
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
