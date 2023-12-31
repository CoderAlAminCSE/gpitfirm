@extends('backend.layout.master')
@section('title', ' Service | Update')
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Update Service</h3>
                </div>
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form action="{{ route('service.update', $service->id) }}" method="POST"
                    class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Row-->
                        <div class="row gx-10 mb-5">

                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Image</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url('{{ !empty($service->image) ? asset('storage/' . $service->image) : '' }}')">
                                        </div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
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
                            <!--begin::Col-->
                            <div class="col-lg-6">
                                <label class="form-label fs-6 fw-bold required text-gray-700 mb-3">Name</label>
                                <!--begin::Input group-->
                                <div class="mb-5">
                                    <div class="controls">
                                        <input type="text" name="name" value="{{ $service->name }}" placeholder="Name"
                                            class="form-control form-control-solid @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!--end::Input group-->
                                <label class="form-label fs-6 fw-bold required text-gray-700 mb-3">Price</label>
                                <!--begin::Input group-->
                                <div class="mb-5">
                                    <div class="controls">
                                        <input type="number" name="price" value="{{ $service->price }}"
                                            placeholder="Price"
                                            class="form-control form-control-solid @error('price') is-invalid @enderror">
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6">
                                <!--end::Input group-->
                                <label class="form-label fs-6 fw-bold required text-gray-700 mb-3">Title</label>
                                <!--begin::Input group-->
                                <div class="mb-5">
                                    <div class="controls">
                                        <input type="text" name="title" value="{{ $service->title }}"
                                            placeholder="Title"
                                            class="form-control form-control-solid @error('price') is-invalid @enderror">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <label class="form-label fs-6 fw-bold required text-gray-700 mb-3">Category</label>
                                <!--begin::Input group-->
                                <div class="mb-5">
                                    <div class="w-100">
                                        <!--begin::Select2-->
                                        <select class="form-select form-select-solid" name="category_id"
                                            data-control="select2" data-hide-search="true"
                                            data-placeholder="Select a category">
                                            @foreach (activeCategory() as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $service->category_id == $category->id ? 'selected' : null }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <!--end::Select2-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>

                            <div class="row mb-10 mt-5">
                                <!-- Column 1 -->
                                <div class="col-lg-12">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <!--begin::Label-->
                                        <label class="required fw-semibold fs-6 mb-2">Description
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea id="kt_docs_tinymce_basic" name="description" class="tox-target">{{ $service->description }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>

                            <!--end::Col-->
                            <div class="row mb-10">
                                <!-- Column 2 -->
                                <div class="col-lg-6">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <div class="form-check">
                                            <input class="form-check-input" name="active" type="checkbox"
                                                value="1" id="flexCheckChecked"
                                                {{ $service->active == 1 ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary"
                            id="kt_account_profile_details_submit">Update</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/backend') }}/plugins/custom/tinymce/tinymce.bundle.js"></script>
    <script src="{{ asset('assets/backend') }}/js/services.js"></script>
@endsection
