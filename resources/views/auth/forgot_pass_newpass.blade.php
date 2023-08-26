@extends('auth.layouts.app')

@section('content')
    <div class="card rounded-3 w-md-550px">
        <!--begin::Card body-->
        <div class="card-body d-flex flex-column p-10 p-lg-20 pb-lg-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-20">
                <!--begin::Form-->
                <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{ route('forgotpass.newpass.store') }}" method="POST">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark fw-bolder mb-3">Setup New Password</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-8 fv-plugins-icon-container" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control bg-transparent" type="password" placeholder="Password"
                                    name="password" autocomplete="off">
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                    data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                            </div>
                            <input type="hidden" name="user" value="{{ $user->id }}">
                            <!--end::Input wrapper-->
                        </div>
                        <!--end::Wrapper-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Action-->
                    <div class="d-grid mb-10">
                        <button type="submit" class="btn btn-primary">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Submit</span>
                            <!--end::Indicator label-->
                        </button>
                    </div>
                    <!--end::Action-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Card body-->
    </div>
@endsection
