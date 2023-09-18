@extends('backend.layout.master')
@section('title', 'Dashboard')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Dashboard</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Home</li>
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
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                    <!--begin::Col-->
                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 20-->
                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end mb-5 mb-xl-10"
                            style="background-color: #F1416C;background-image:url('{{ asset('assets/backend') }}/media/patterns/vector-1.png')">
                            <!--begin::Header-->
                            <div class="card-header pt-8 pb-8"> <!-- Increased top and bottom padding -->
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Amount-->
                                    <span
                                        class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ activeServices()->count() }}</span>
                                    <!--end::Amount-->
                                    <!--begin::Subtitle-->
                                    <span class="text-white opacity-75 pt-3 fw-semibold fs-6 mb-5">Active Services</span>
                                    <!-- Increased top and bottom padding -->
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                        </div>
                        <!--end::Card widget 20-->
                    </div>



                    <!--begin::Col-->
                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 20-->
                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end mb-5 mb-xl-10"
                            style="background-color: #F1416C;background-image:url('{{ asset('assets/backend') }}/media/patterns/vector-1.png')">
                            <!--begin::Header-->
                            <div class="card-header pt-8 pb-8"> <!-- Increased top and bottom padding -->
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ orders()->count() }}</span>
                                    <!--end::Amount-->
                                    <!--begin::Subtitle-->
                                    <span class="text-white opacity-75 pt-3 fw-semibold fs-6 mb-5">Total Order</span>
                                    <!-- Increased top and bottom padding -->
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                        </div>
                        <!--end::Card widget 20-->
                    </div>

                    <!--begin::Col-->
                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 20-->
                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end mb-5 mb-xl-10"
                            style="background-color: #F1416C;background-image:url('{{ asset('assets/backend') }}/media/patterns/vector-1.png')">
                            <!--begin::Header-->
                            <div class="card-header pt-8 pb-8"> <!-- Increased top and bottom padding -->
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ invoices()->count() }}</span>
                                    <!--end::Amount-->
                                    <!--begin::Subtitle-->
                                    <span class="text-white opacity-75 pt-3 fw-semibold fs-6 mb-5">Total Invoices</span>
                                    <!-- Increased top and bottom padding -->
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                        </div>
                        <!--end::Card widget 20-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>


        <div id="kt_app_content" class="app-content flex-column-fluid" style="">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-md-5 mb-xl-10">
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10"
                            style="min-width: 200px; min-height: 200px; background-color: #080655;">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Currency-->
                                        <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                        <!--end::Currency-->
                                        <!--begin::Amount-->
                                        <span
                                            class="fs-2hx fw-bold text-gray-400 me-2 lh-1 ls-n2">{{ number_format(orders()->sum('total_amount'), 2, '.', ',') }}</span>
                                        <!--end::Amount-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Order Amount</span>
                                    <!--end::Subtitle-->
                                </div>
                                {{-- <div>
                                    <button
                                        class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-overflow="true">
                                        <i class="ki-duotone ki-dots-square fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </button>
                                    <!--begin::Menu 3-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Paid Details</a>
                                        </div>
                                        <!--end::Menu item-->  
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Pending Details</a>
                                        </div>
                                        <!--end::Menu item--> 
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Cancel Details</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu 3-->
                                </div> --}}
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                                <!--begin::Chart-->
                                <div class="d-flex flex-center me-5 pt-2">
                                    <div id="kt_card_widget_17_chart" data-kt-size="70" data-kt-line="11">
                                        <span></span><canvas height="10" width="10"></canvas>
                                    </div>
                                </div>
                                <!--end::Chart-->
                                <!--begin::Labels-->
                                <div class="d-flex flex-column content-justify-center flex-row-fluid">
                                    <!--begin::Label-->
                                    <div class="d-flex fw-semibold align-items-center">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 flex-grow-1 me-4">Total Paid</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="fw-bolder text-gray-400 text-xxl-end">
                                            ${{ number_format(totalPaidAmount(), 2, '.', ',') }}</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Label-->
                                    <div class="d-flex fw-semibold align-items-center my-3">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 flex-grow-1 me-4">Total Pending</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="fw-bolder text-gray-400 text-xxl-end">
                                            ${{ number_format(totalUnpaidAmount(), 2, '.', ',') }}</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Label-->
                                    <div class="d-flex fw-semibold align-items-center">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-3px rounded-2 me-3 bg-gray">
                                        </div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 flex-grow-1 me-4">Total Canceled</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="fw-bolder text-gray-400 text-xxl-end">
                                            ${{ number_format(totalCanceledAmount(), 2, '.', ',') }}</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Labels-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <!--end::Content-->
    </div>
@endsection
