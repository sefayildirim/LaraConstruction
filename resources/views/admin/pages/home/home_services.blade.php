@extends('admin.layouts.backend')

@section('title')
@endsection()

@section('css')
@endsection()

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Home Services</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Home Services</li>
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
                                <a href="{{ route('homeservices.create') }}" class="btn btn-primary"><i class="bi bi-plus-square"></i> New Home Services
                                </a>
                            </h5>
                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Transactions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($homeservices as $homeservice)
                                    <tr>
                                        <td>{{ $homeservice->title }}</td>
                                        <td>
                                             <i class="{{ $homeservice->icon }}"></i>
                                        </td>
                                        <td>{{ $homeservice->description }}</td>

                                        <td>
                                            <a href="{{ route('homeservices.edit',$homeservice->id) }}">
                                                <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                            </a>
                                            <a href="{{ route('homeservices.destroy',$homeservice->id) }}">
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
