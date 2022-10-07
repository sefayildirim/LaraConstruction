@extends('admin.layouts.backend')

@section('title')
@endsection()

@section('css')
@endsection()

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Home Features</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Home Features</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                <a href="{{ route('homefeatures.create') }}" class="btn btn-primary"><i class="bi bi-plus-square"></i> New Features
                                </a>
                            </h5>
                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Subtitle</th>
                                    <th scope="col">Transactions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($homefeatures as $features)
                                    <tr>
                                        <td>{{ $features->title }}</td>
                                        <td>
                                            <img width="80px" height="80px" src="../../frontend/img/{{ $features->photo }}" alt="">
                                        </td>
                                        <td>
                                            {{ $features->subtitle }}
                                        </td>
                                        <td>
                                            <a href="{{ route('homefeatures.edit',$features->id) }}">
                                                <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                            </a>
                                            <a href="{{ route('homefeatures.destroy',$features->id) }}">
                                                <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection()

@section('js')
@endsection()
