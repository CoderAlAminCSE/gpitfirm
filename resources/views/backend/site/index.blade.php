@extends('backend.layout.master')
@section('title', 'Sites')
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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Sites
                            List
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
                            <li class="breadcrumb-item text-muted">Sites</li>
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
                                <form id="SearchForm" action="{{ route('sites.index') }}" method="get">
                                    @csrf
                                    <input type="text" data-kt-subscription-table-filter="search" name="search"
                                        value="{{ request('search') }}"
                                        class="form-control form-control-solid w-250px ps-14"
                                        placeholder="Search Sites"form="SearchForm" />
                                </form>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <!--begin::Add user-->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_export_users">
                                        <i class="ki-duotone ki-plus fs-2"></i>Add Sites</button>
                                    <!--end::Add user-->
                                </div>
                                <!--end::Toolbar-->
                                <!--begin::Modal - Adjust Balance-->
                                <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-850px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">Add Sites</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                    data-kt-users-modal-action="close">
                                                    <i class="ki-duotone ki-cross fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Form-->
                                                <form action="{{ route('site.crete') }}" method="POST"
                                                    class="form fv-plugins-bootstrap5 fv-plugins-framework">
                                                    @csrf
                                                    <div class="row mb-10">
                                                        <!-- Column 1 -->
                                                        <div class="col-lg-6">
                                                            <!--begin::Input group-->
                                                            <div class="fv-row">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Website
                                                                    Name</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="text" name="website_name"
                                                                    class="form-control form-control-solid mb-3"
                                                                    placeholder="Website name"
                                                                    value="{{ old('website_name') }}" />
                                                                @error('website_name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>

                                                        <!-- Column 2 -->
                                                        <div class="col-lg-6">
                                                            <!--begin::Input group-->
                                                            <div class="fv-row">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Website
                                                                    Url</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="text" name="website_url"
                                                                    class="form-control form-control-solid mb-3"
                                                                    placeholder="Website url"
                                                                    value="{{ old('website_url') }}" />
                                                                @error('website_url')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>
                                                    </div>

                                                    <div class="row mb-10">
                                                        <!-- Column 1 -->
                                                        <div class="col-lg-6">
                                                            <!--begin::Input group-->
                                                            <div class="fv-row">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">DA
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="number" name="da"
                                                                    class="form-control form-control-solid mb-3"
                                                                    placeholder="DA" value="{{ old('da') }}" />
                                                                @error('da')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>

                                                        <!-- Column 2 -->
                                                        <div class="col-lg-6">
                                                            <!--begin::Input group-->
                                                            <div class="fv-row">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">PA
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="number" name="pa"
                                                                    class="form-control form-control-solid mb-3"
                                                                    placeholder="PA" value="{{ old('pa') }}" />
                                                                @error('pa')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>
                                                    </div>

                                                    <div class="row mb-10">
                                                        <!-- Column 1 -->
                                                        <div class="col-lg-6">
                                                            <!--begin::Input group-->
                                                            <div class="fv-row">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">DR
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="number" name="dr"
                                                                    class="form-control form-control-solid mb-3"
                                                                    placeholder="DR" value="{{ old('dr') }}" />
                                                                @error('dr')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>

                                                        <!-- Column 2 -->
                                                        <div class="col-lg-6">
                                                            <!--begin::Input group-->
                                                            <div class="fv-row">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Traffic
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="number" name="traffic"
                                                                    class="form-control form-control-solid mb-3"
                                                                    placeholder="Traffic" value="{{ old('traffic') }}" />
                                                                @error('traffic')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>
                                                    </div>

                                                    <div class="row mb-10">
                                                        <!-- Column 1 -->
                                                        <div class="col-lg-12">
                                                            <!--begin::Input group-->
                                                            <div class="fv-row">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="required fw-semibold fs-6 mb-2">Niche/Category
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input class="form-control form-control-solid"
                                                                    name="category" value=""
                                                                    placeholder="Type a category/niche and press ENTER button"
                                                                    id="kt_tagify_2" />
                                                                @error('category')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>
                                                    </div>

                                                    <div class="row mb-10">
                                                        <!-- Column 1 -->
                                                        <div class="col-lg-6">
                                                            <!--begin::Input group-->
                                                            <div class="fv-row">
                                                                <div class="form-check">
                                                                    <!--begin::Label-->
                                                                    <input class="form-check-input" name="google_news"
                                                                        type="checkbox" value="1"
                                                                        id="flexCheckChecked" checked />
                                                                    <label class="form-check-label"
                                                                        for="flexCheckChecked">
                                                                        Google News
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>

                                                        <!-- Column 2 -->
                                                        <div class="col-lg-6">
                                                            <!--begin::Input group-->
                                                            <div class="fv-row">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" name="active"
                                                                        type="checkbox" value="1"
                                                                        id="flexCheckChecked" checked />
                                                                    <label class="form-check-label"
                                                                        for="flexCheckChecked">
                                                                        Active
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>
                                                    </div>
                                                    <!--begin::Actions-->
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary"
                                                            data-kt-users-modal-action="submit">
                                                            <span class="indicator-label">Submit</span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>

                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <!--end::Modal - New Card-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <thead>
                                    <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-50px">SL</th>
                                        <th class="min-w-125px">Website Name</th>
                                        <th class="min-w-125px">Website Url</th>
                                        <th class="min-w-125px">DA</th>
                                        <th class="min-w-125px">PA</th>
                                        <th class="min-w-125px">DR</th>
                                        <th class="min-w-125px">Traffic</th>
                                        <th class="min-w-125px">Category</th>
                                        <th class="min-w-125px">Google News</th>
                                        <th class="min-w-125px">Status</th>
                                        <th class="text-end min-w-100px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                    @forelse ($sites as $site)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $site->website_name }}</td>
                                            <td>{{ $site->website_url }}</td>
                                            <td>{{ $site->da }}</td>
                                            <td>{{ $site->pa }}</td>
                                            <td>{{ $site->dr }}</td>
                                            <td>{{ $site->traffic }}K</td>
                                            <td>
                                                @php
                                                    // Decode the JSON data into an array of objects
                                                    $categories = json_decode($site->category);
                                                @endphp
                                                @if (is_array($categories))
                                                    @foreach ($categories as $categoryObj)
                                                        <div class="badge badge-light-success">
                                                            {{ $categoryObj->value }}
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <div
                                                    class="badge {{ $site->google_news == 1 ? 'badge-light-success' : 'badge-light-danger' }}">
                                                    {{ $site->google_news == 1 ? 'YES' : 'NO' }} </div>
                                            </td>
                                            <td>
                                                <div
                                                    class="badge {{ $site->active == 1 ? 'badge-light-success' : 'badge-light-danger' }}">
                                                    {{ $site->active == 1 ? 'Active' : 'Inactive' }} </div>
                                            </td>
                                            <td class="text-end">
                                                <a href="#"
                                                    class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">Actions
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('site.edit', $site->id) }}"
                                                            class="menu-link px-3">Update</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a class="menu-link px-3 btn-promo-delete"
                                                            data-promo-id="{{ $site->id }}">Delete</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center">No data found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                <nav aria-label="Page navigation">
                                    {{ $sites->links() }}
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var input2 = document.querySelector("#kt_tagify_2");
            new Tagify(input2);
        });
    </script>
@endsection
