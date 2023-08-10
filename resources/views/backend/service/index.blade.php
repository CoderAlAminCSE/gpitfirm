@extends('backend.layout.master')
@section('title', 'Category')
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
                            Services List
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
                            <li class="breadcrumb-item text-muted">Service Management</li>
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Services</li>
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
                    <!--begin::Pricing card-->
                    <div class="card mb-5 mb-xl-10">

                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                            data-bs-target="#kt_account_profile_details" aria-expanded="true"
                            aria-controls="kt_account_profile_details">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Services list</h3>
                            </div>

                            <div class="card-header d-flex justify-content-end py-6 px-9">
                                <form action="{{ route('smtp.test') }}" method="POST">
                                    @csrf
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_export_users">
                                        <i class="ki-duotone ki-plus fs-2"></i>Add Service</button>
                                </form>
                            </div>
                            <!--end::Card title-->
                        </div>

                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card header-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Modal - Adjust Balance-->
                                <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-850px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">Add Service</h2>
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
                                                <form action="{{ route('service.store') }}" method="POST"
                                                    enctype="multipart/form-data"
                                                    class="form fv-plugins-bootstrap5 fv-plugins-framework">
                                                    @csrf


                                                    <div class="row mb-6">
                                                        <!--begin::Label-->
                                                        <label
                                                            class="col-lg-4 col-form-label fw-semibold fs-6 required">Image</label>
                                                        <!--end::Label-->
                                                        <!--begin::Col-->
                                                        <div class="col-lg-8">
                                                            <!--begin::Image input-->
                                                            <div class="image-input image-input-outline"
                                                                data-kt-image-input="true"
                                                                style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                                <!--begin::Preview existing avatar-->
                                                                <div class="image-input-wrapper w-125px h-125px"
                                                                    style="background-image: ' ' }}')">
                                                                </div>
                                                                <!--end::Preview existing avatar-->
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                    data-kt-image-input-action="change"
                                                                    data-bs-toggle="tooltip" title="Change avatar">
                                                                    <i class="ki-duotone ki-pencil fs-7">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                    <!--begin::Inputs-->
                                                                    <input type="file" name="image"
                                                                        accept=".png, .jpg, .jpeg" />
                                                                    <input type="hidden" name="avatar_remove" />
                                                                    <!--end::Inputs-->
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Cancel-->
                                                                <span
                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                    data-kt-image-input-action="cancel"
                                                                    data-bs-toggle="tooltip" title="Cancel avatar">
                                                                    <i class="ki-duotone ki-cross fs-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </span>
                                                                <!--end::Cancel-->
                                                                <!--begin::Remove-->
                                                                <span
                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                    data-kt-image-input-action="remove"
                                                                    data-bs-toggle="tooltip" title="Remove avatar">
                                                                    <i class="ki-duotone ki-cross fs-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </span>
                                                                <!--end::Remove-->
                                                            </div>
                                                            <!--end::Image input-->
                                                            <!--begin::Hint-->
                                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                            @error('image')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                            <!--end::Hint-->
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>

                                                    <div class="row mb-10">
                                                        <!-- Column 1 -->
                                                        <div class="col-lg-6">
                                                            <!--begin::Input group-->
                                                            <div class="fv-row">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">
                                                                    Name</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="text" name="name"
                                                                    class="form-control form-control-solid mb-3"
                                                                    placeholder="Service name"
                                                                    value="{{ old('name') }}" />
                                                                @error('name')
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
                                                                <label class="required fw-semibold fs-6 mb-2">Title
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="text" name="title"
                                                                    class="form-control form-control-solid mb-3"
                                                                    placeholder="Title" value="{{ old('title') }}" />
                                                                @error('title')
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
                                                                <label class="required fw-semibold fs-6 mb-2">Price
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="number" name="price"
                                                                    class="form-control form-control-solid mb-3"
                                                                    placeholder="Price" value="{{ old('price') }}" />
                                                                @error('price')
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
                                                                <div class="mb-10">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="form-label fw-bold fs-6 text-gray-700 required">Category</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Select-->
                                                                    <select name="category_id"
                                                                        aria-label="Select a category"
                                                                        data-control="select2"
                                                                        data-placeholder="Select Category"
                                                                        class="form-select form-select-solid">
                                                                        @foreach (activeCategory() as $category)
                                                                            <option value="{{ $category->id }}">
                                                                                {{ $category->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <!--end::Select-->
                                                                </div>
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>

                                                        <div class="row mb-10">
                                                            <!-- Column 1 -->
                                                            <div class="col-lg-12">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fw-semibold fs-6 mb-2">Description
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <textarea id="kt_docs_tinymce_basic" name="description" class="tox-target">
                                              </textarea>
                                                                    @error('description')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row mb-10">
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

                            <!--end::Card header-->

                            <div class="card-body py-4">
                                <!--begin::Plans-->
                                <div class="d-flex flex-column">
                                    <!--begin::Row-->
                                    <div class="row g-10">

                                        @foreach ($services as $service)
                                            <!--begin::Col-->
                                            <div class="col-xl-4">
                                                <div class="d-flex h-100 align-items-center">
                                                    <!--begin::Option-->
                                                    <div
                                                        class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                                        <!--begin::Heading-->
                                                        <div class="mb-7 text-center">
                                                            <!--begin::Title-->
                                                            <h1 class="text-dark mb-5 fw-bolder">{{ $service->title }}
                                                            </h1>
                                                            <!--end::Title-->

                                                            <!--begin::Price-->
                                                            <div class="text-center">
                                                                <span class="mb-2 text-primary">$</span>
                                                                <span
                                                                    class="fs-3x fw-bold text-primary">{{ $service->price }}</span>
                                                            </div>
                                                            <!--end::Price-->
                                                        </div>
                                                        <!--end::Heading-->
                                                        <!--begin::Features-->
                                                        <div class="w-100 mb-10">
                                                            <!--begin::Description-->
                                                            <div class="text-gray-600 fw-semibold mb-5">
                                                                {!! $service->description !!}
                                                            </div>
                                                            <!--end::Description-->
                                                        </div>
                                                        <!--end::Features-->
                                                        <!--begin::Select-->
                                                        <div class="w-100 mb-10">
                                                            <a href="{{ route('service.edit', $service->id) }}"
                                                                class="btn btn-sm btn-primary">Update</a>
                                                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                                        </div>
                                                        <!--end::Select-->
                                                    </div>
                                                    <!--end::Option-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        @endforeach
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Plans-->
                                <!--end::Card body-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Pricing card-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/backend') }}/plugins/custom/tinymce/tinymce.bundle.js"></script>
    <script src="{{ asset('assets/backend') }}/js/services.js"></script>
@endsection
