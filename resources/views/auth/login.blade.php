@extends('layouts.master')

@section('content')
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">
            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-6 col-xl-4 mx-auto">
                    <!--begin::Card-->
                    <div class="card">
                        <div class="auth-form-wrapper px-4 py-5">
                            <!--begin::Brand logo-->
                            <img src="{{ Vite::asset('resources/images/logos/rumah-drone.png') }}"
                                 class="w-50 mb-3" alt="logo">
                            <!--end::Brand logo-->
                            <!--begin::Caption-->
                            <h5 class="text-muted font-weight-normal mb-4">Selamat datang! di Sistem Informasi
                                Inventaris.</h5>
                            <!--end::Caption-->
                            <!--begin::Alert-->
                            @if (Session::has('error'))
                                <div class="alert alert-icon-danger d-flex align-items-top" role="alert">
                                    <!--begin::Icon-->
                                    <i data-feather="alert-circle" class="mr-2" style="width: 24px; height: 24px;"></i>
                                    <!--end::Icon-->
                                    <div class="d-flex flex-column">
                                        <h5 class="alert-heading mb-1">Login Gagal!</h5>
                                        <p>{!! Session::get('error') !!}</p>
                                    </div>
                                </div>
                            @endif
                            <!--end::Alert-->
                            <!--begin::Form-->
                            <form class="forms-sample" action="{{ route('auth.login') }}" method="POST">
                                @csrf
                                <!--begin::Input group-->
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                           id="username" name="username" placeholder="Username"
                                           value="{{ old('username') }}">
                                    <!--begin::Error Message-->
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                    <!--end::Error Message-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password" autocomplete="current-password"
                                           placeholder="Password">
                                    <!--begin::Error Message-->
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                    <!--end::Error Message-->
                                </div>
                                <!--end::Input group-->
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">
                                        Masuk
                                    </button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
    </div>
@endsection
