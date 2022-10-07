@extends('admin.layouts.backend')

@section('title')
@endsection()

@section('css')
@endsection()

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>About Team</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">About Team</li>
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
                                <a href="{{ route('aboutteam.create') }}" class="btn btn-primary"><i class="bi bi-plus-square"></i> New About Team
                                </a>
                            </h5>
                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Authority</th>
                                    <th scope="col">Transactions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($aboutteams as $aboutteam)
                                    <tr>
                                        <td>{{ $aboutteam->name }}</td>
                                        <td>
                                            <img width="80px" height="80px" src="../../frontend/img/{{ $aboutteam->photo }}" alt="">
                                        </td>
                                        <td>{{ $aboutteam->authority }}</td>

                                        <td>
                                            <a href="{{ route('aboutteam.edit',$aboutteam->id) }}">
                                                <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                            </a>
                                            <a href="{{ route('aboutteam.destroy',$aboutteam->id) }}">
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
