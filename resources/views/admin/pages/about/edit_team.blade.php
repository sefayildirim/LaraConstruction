@extends('admin.layouts.backend')

@section('title')
@endsection()

@section('css')
@endsection()

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit About Team</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">About</li>
                    <li class="breadcrumb-item active">Edit About Team</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit About Team</h5>
                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('aboutteam.update') }}"  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $aboutteam->id }}">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">İmage</label>
                                    <div class="col-sm-10">
                                        <img width="80px" height="80px" src="../../../frontend/img/{{ $aboutteam->photo }}" alt="">
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
                                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input name="name" type="text" class="form-control" value="{{ $aboutteam->name }}">
                                        @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputLink" class="col-sm-2 col-form-label">Authority</label>
                                    <div class="col-sm-10">
                                        <input name="authority" type="text" value="{{ $aboutteam->authority }}" class="form-control">
                                        @error('authority')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" class="form-control" style="height: 100px" >{{ $aboutteam->description }}</textarea>
                                        @error('description')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputLink" class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input name="facebook_link" type="text" value="{{ $aboutteam->facebook_link }}" class="form-control">
                                        @error('facebook_link')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputLink" class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <input name="twitter_link" type="text" value="{{ $aboutteam->twitter_link }}" class="form-control">
                                        @error('twitter_link')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputLink" class="col-sm-2 col-form-label">Instagram</label>
                                    <div class="col-sm-10">
                                        <input name="instagram_link" type="text" value="{{ $aboutteam->instagram_link }}" class="form-control">
                                        @error('instagram_link')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputLink" class="col-sm-2 col-form-label">Linkedin</label>
                                    <div class="col-sm-10">
                                        <input name="linkedin_link" type="text" value="{{ $aboutteam->linkedin_link }}" class="form-control">
                                        @error('linkedin_link')
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
