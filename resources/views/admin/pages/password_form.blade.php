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

                                <li class="nav-item active">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#profile-change-password">Change Password
                                    </button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">
                                @foreach($users as $user)
                                <div class="tab-pane fade show active pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form action="{{ route('user.changePassword') }}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>

                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                       id="password">
                                                @error("password")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>

                                            <div class="col-md-8 col-lg-9">
                                                <input name="password_confirmation" type="password" class="form-control"
                                                       id="password_confirmation">
                                                @error("password_confirmation")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>
                                @endforeach
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
