@extends('admin.layouts.backend')

@section('css')
@endsection()

@section('content')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profile</h1>
        </div>
        <!-- End Page Title -->
        <section class="section profile">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">
                                        Edit Profile
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                    <!-- Profile Edit Form -->
                                    @foreach($users as $user)
                                        <form action="{{ route('user.update') }}" method="post">
                                            @csrf
                                            @method("PUT")
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                                    Name</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="name" type="text" class="form-control" id="fullName"
                                                           value="{{$user->name}}">
                                                    @error("name")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="row mb-3">
                                                <label for="Email"
                                                       class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="email" type="email" class="form-control" id="Email"
                                                           value="{{$user->email}}">
                                                    @error('email')
                                                    <small style="color: red;">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <input type="hidden" name="password" value="{{ $user->password }}">

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form><!-- End Profile Edit Form -->
                                    @endforeach

                                </div>
                            </div><!-- End Bordered Tabs -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection()

@section('js')
@endsection()
