@extends('auth.layouts.app')

@section('content')
    <div class="d-flex flex-column flex-root justify-content-center align-items-center" id="kt_app_root">
        <div class="card rounded-3 w-md-550px">
            <!--begin::Card body-->
            <div class="card-body d-flex flex-column p-10 p-lg-20 pb-lg-10">
                <!--begin::Wrapper-->
                <div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-20">
                    <!--begin::Form-->
                    <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework"
                        action="{{ route('verifiy.verification.code') }}" method="POST">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">Forgot Password ?</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-500 fw-semibold fs-6">Enter here the verification code.</div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8 fv-plugins-icon-container">
                            <!--begin::Email-->
                            <input type="number" placeholder="Verification code" name="code" autocomplete="off"
                                class="form-control @error('code') is-invalid @enderror  bg-transparent">
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Email-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <input type="hidden" name="user" value="{{ $user->id }}">
                        <!--begin::Actions-->
                        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                            <button type="submit" class="btn btn-primary me-4">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Submit</span>
                                <!--end::Indicator progress-->
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Card body-->
        </div>
    </div>
@endsection
