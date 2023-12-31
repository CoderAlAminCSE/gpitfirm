@extends('backend.layout.master')
@section('title', 'General Settings')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Paypal Settings</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Settings</li>
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Paypal Settings</li>
                            <!--end::Item-->
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Card-->
                    <div class="card card-flush">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Form-->
                            <form action="{{ route('payment.paypal.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <!--begin:::Tab content-->
                                <div class="tab-content" id="myTabContent">
                                    <!--begin:::Tab pane-->
                                    <div class="tab-pane fade show active" id="kt_ecommerce_settings_general"
                                        role="tabpanel">

                                        @if (env('PAYPAL_MODE') == 'sandbox')
                                            <!--begin::Input group-->
                                            <div class="row fv-row mb-7">
                                                <div class="col-md-3 text-md-end">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold form-label mt-3">
                                                        <span class="required">Paypal Sandbox Client ID</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip"
                                                            title="Paypal Sandbox Client ID">
                                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <div class="col-md-9">
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid"
                                                        name="PAYPAL_SANDBOX_CLIENT_ID"
                                                        value="{{ env('PAYPAL_SANDBOX_CLIENT_ID') ?? '' }}" />
                                                    @error('PAYPAL_SANDBOX_CLIENT_ID')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row fv-row mb-7">
                                                <div class="col-md-3 text-md-end">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold form-label mt-3">
                                                        <span class="required">Paypal Sandbox Secret Key</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip"
                                                            title="Paypal Sandbox Secret Key">
                                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <div class="col-md-9">
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid"
                                                        name="PAYPAL_SANDBOX_CLIENT_SECRET"
                                                        value="{{ env('PAYPAL_SANDBOX_CLIENT_SECRET') ?? '' }}" />
                                                    @error('PAYPAL_SANDBOX_CLIENT_SECRET')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                        @else
                                            <!--begin::Input group-->
                                            <div class="row fv-row mb-7">
                                                <div class="col-md-3 text-md-end">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold form-label mt-3">
                                                        <span class="required">Paypal Live Client ID</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip"
                                                            title="Paypal Live Client ID">
                                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <div class="col-md-9">
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid"
                                                        name="PAYPAL_LIVE_CLIENT_ID"
                                                        value="{{ env('PAYPAL_LIVE_CLIENT_ID') ?? '' }}" />
                                                    @error('PAYPAL_LIVE_CLIENT_ID')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row fv-row mb-7">
                                                <div class="col-md-3 text-md-end">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold form-label mt-3">
                                                        <span class="required">Paypal Live Secret Key</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip"
                                                            title="Paypal Live Secret Key">
                                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <div class="col-md-9">
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid"
                                                        name="PAYPAL_LIVE_CLIENT_SECRET"
                                                        value="{{ env('PAYPAL_LIVE_CLIENT_SECRET') ?? '' }}" />
                                                    @error('PAYPAL_LIVE_CLIENT_SECRET')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                        @endif




                                        <!--end::Form-->
                                        <div class="form-check" style="margin-left: 220px; margin-top: 30px;">
                                            <input class="form-check-input" name="PAYPAL_PAYMENT_ACTIVE" type="checkbox"
                                                value="1" id="flexCheckChecked"
                                                {{ env('PAYPAL_PAYMENT_ACTIVE') == 'YES' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Active
                                            </label>
                                        </div>

                                        <div class="form-check" style="margin-left: 220px; margin-top: 30px;">
                                            <input class="form-check-input" name="PAYPAL_MODE" type="checkbox"
                                                value="1" id="liveOrSandbox"
                                                {{ env('PAYPAL_MODE') == 'live' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="liveOrSand">
                                                Paypal Mode ( {{ env('PAYPAL_MODE') }} )
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title=" {{ env('PAYPAL_MODE') == 'live' ? 'PayPal is currently in Live Mode. Uncheck to switch to Sandbox Mode.' : 'PayPal is currently in Sandbox Mode. Check to switch to Live Mode.' }} ">
                                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <!--end:::Tab pane-->
                                    <!--begin::Action buttons-->
                                    <div class="row py-5">
                                        <div class="col-md-9 offset-md-3">
                                            <div class="d-flex justify-content-end">
                                                <!--begin::Button-->
                                                <button type="submit" data-kt-ecommerce-settings-type="submit"
                                                    class="btn btn-primary">
                                                    <span class="indicator-label">Update</span>
                                                </button>
                                                <!--end::Button-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Action buttons-->
                                </div>
                            </form>
                            <!--end::Form-->
                            <!--end:::Tab content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
    <input type="hidden" id="paypal_mode_change_url" value="{{ route('payment.paypal.mood.update') }}">
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#liveOrSandbox').on('click', function() {
                let url = $('#paypal_mode_change_url').val();
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        toastr.options = {
                            closeButton: false,
                            debug: false,
                            newestOnTop: false,
                            progressBar: false,
                            positionClass: "toastr-top-right",
                            preventDuplicates: false,
                            onclick: null,
                            showDuration: "200",
                            hideDuration: "500",
                            timeOut: "5000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                        };
                        toastr.success("Paypal Mode Changed Successfully");
                        location.reload();
                    },
                    error: function(error) {
                        console.error('Error: ', error);
                    }
                });
            });
        });
    </script>
@endsection
