@extends('backend.layout.master')
@section('title', 'Contact-Messages')
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
                            Contact Message List
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
                            <li class="breadcrumb-item text-muted">Contact Messages</li>
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
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1"
                                    onclick="document.getElementById('SearchForm').submit()">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <form id="SearchForm" action="{{ route('contact.message.index') }}" method="get">
                                    @csrf
                                    <input type="text" data-kt-subscription-table-filter="search" name="search"
                                        value="{{ request('search') }}"
                                        class="form-control form-control-solid w-250px ps-14"
                                        placeholder="Search Promo"form="SearchForm" />
                                </form>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <thead>
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">SL</th>
                                        <th class="min-w-125px">Name</th>
                                        <th class="min-w-125px">Email</th>
                                        <th class="min-w-125px">Message</th>
                                        <th class="min-w-125px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                    @forelse ($contactMessages as $contactMessage)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $contactMessage->name }}</td>
                                            <td>{{ $contactMessage->email }}</td>
                                            <td>{{ $contactMessage->messages }}</td>
                                            <td>
                                                <a href="#"
                                                    class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a class="menu-link px-3 btn-contactMessage-delete"
                                                            data-contact-id="{{ $contactMessage->id }}">Delete</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No data found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                <nav aria-label="Page navigation">
                                    {{ $contactMessages->links() }}
                                </nav>
                            </div>
                            <!--end::Table-->
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
@endsection

@section('script')
    <script src="{{ asset('assets/backend') }}/js/contactMessage.js"></script>
@endsection
