@extends('backend.layout.master')
@section('title', 'Orders')
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
                            Invoice Details
                        </h1>
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
                            <li class="breadcrumb-item text-muted">Order Management</li>
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
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body p-lg-20">
                            <!--begin::Layout-->
                            <div class="d-flex flex-column flex-xl-row">
                                <!--begin::Content-->
                                <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                                    <!--begin::Invoice 2 content-->
                                    <div class="mt-n1">
                                        <!--begin::Top-->
                                        <div class="d-flex flex-stack pb-10">
                                            <!--begin::Logo-->
                                            <a>
                                                <img alt="Favicon" src="{{ asset('storage/' . siteSetting('favicon')) }}"
                                                    width="50px">
                                            </a>
                                            <!--end::Logo-->
                                            <!--begin::Action-->
                                            @if ($invoice->order->canceled_at != null)
                                                <span class="badge badge-light-danger me-2">Canceled</span>
                                            @elseif($invoice->order->payment_status == 1)
                                                <span class="badge badge-light-success me-2">Confirmed</span>
                                            @else
                                                <span class="badge badge-light-warning me-2">Pending Payment</span>
                                            @endif
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Top-->
                                        <!--begin::Wrapper-->
                                        <div class="m-0">
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-3 text-gray-800 mb-8">Invoice number:
                                                {{ $invoice->invoice_number }}
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Row-->
                                            <div class="row g-5 mb-11">
                                                <!--end::Col-->
                                                <div class="col-sm-6">
                                                    <!--end::Label-->
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Issue Date:</div>
                                                    <!--end::Label-->
                                                    <!--end::Col-->
                                                    <div class="fw-bold fs-6 text-gray-800">
                                                        {{ $invoice->order->created_at }}
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Row-->
                                            <div class="row g-5 mb-12">
                                                <!--end::Col-->
                                                <div class="col-sm-6">
                                                    <!--end::Label-->
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Issue For:</div>
                                                    <!--end::Label-->
                                                    <!--end::Text-->
                                                    <div class="fw-semibold fs-6 text-gray-800">Name:
                                                        {{ $invoice->user->name }}</div>

                                                    <div class="fw-semibold fs-6 text-gray-800"> Email:
                                                        {{ $invoice->user->email }}</div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Col-->
                                                <!--end::Col-->
                                                <div class="col-sm-6">
                                                    <!--end::Label-->
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Issued By:</div>
                                                    <!--end::Label-->
                                                    <!--end::Text-->
                                                    <div class="fw-bold fs-6 text-gray-800">
                                                        {{ siteSetting('company_name') }}</div>
                                                    <!--end::Text-->
                                                    <!--end::Description-->
                                                    <div class="fw-semibold fs-7 text-gray-600">
                                                        {{ siteSetting('company_email') }}</div>

                                                    <div class="fw-semibold fs-7 text-gray-600">
                                                        {{ siteSetting('company_address') }}
                                                    </div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Content-->
                                            @if ($invoice->order->items->count() > 0)
                                                <div class="flex-grow-1">
                                                    <!--begin::Table-->

                                                    <div class="table-responsive border-bottom mb-9">
                                                        <table class="table mb-3">
                                                            <thead>
                                                                <tr class="border-bottom fs-6 fw-bold text-muted">
                                                                    <th class="min-w-175px pb-2">Service</th>
                                                                    <th class="min-w-50px text-end pb-2">Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($invoice->order->items as $item)
                                                                    @if ($item->service_id == null)
                                                                        <tr class="fw-bold text-gray-700 fs-5">
                                                                            <td class="d-flex align-items-center pt-6">
                                                                                <i
                                                                                    class="fa fa-genderless text-primary fs-1 me-2"></i>{{ $item->custom_service_name }}
                                                                            </td>
                                                                            <td
                                                                                class="fw-semibold fs-6 text-gray-800 pt-5 text-end">
                                                                                {{ $item->custom_service_price }}</td>
                                                                        </tr>
                                                                    @else
                                                                        <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                            <td class="d-flex align-items-center pt-6">
                                                                                <i
                                                                                    class="fa fa-genderless text-primary fs-1 me-2"></i>{{ serviceInfo($item->service_id)->name }}
                                                                            </td>
                                                                            <td class="fw-semibold fs-6 text-gray-800 pt-5">
                                                                                {{ serviceInfo($item->service_id)->price }}
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--end::Table-->
                                                    <!--begin::Container-->
                                                    <div class="d-flex justify-content-end">
                                                        <!--begin::Section-->
                                                        <div class="mw-300px">
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-stack mb-3">
                                                                <!--begin::Accountname-->
                                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Subtotal:
                                                                </div>
                                                                <!--end::Accountname-->
                                                                <!--begin::Label-->
                                                                <div class="text-end fw-bold fs-6 text-gray-800">
                                                                    {{ $invoice->order->total_amount }}</div>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-stack">
                                                                <!--begin::Code-->
                                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Total:
                                                                </div>
                                                                <!--end::Code-->
                                                                <!--begin::Label-->
                                                                <div class="text-end fw-bold fs-6 text-gray-800">
                                                                    {{ $invoice->order->total_amount }}</div>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Item-->
                                                        </div>
                                                        <!--end::Section-->
                                                    </div>
                                                    <!--end::Container-->
                                                </div>
                                            @endif
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Invoice 2 content-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Layout-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
@endsection

@section('script')

@endsection
