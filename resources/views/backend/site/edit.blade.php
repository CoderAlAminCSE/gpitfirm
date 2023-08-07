@extends('backend.layout.master')
@section('title', 'Site | Update')
@section('content')

    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Site Update</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form action="{{ route('site.update', $site->id) }}" method="POST"
                    class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Website Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="website_name"
                                    class="form-control form-control-lg form-control-solid" placeholder="website name"
                                    value="{{ $site->website_name }}" />
                                @error('website_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Website Url</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="website_url"
                                    class="form-control form-control-lg form-control-solid" placeholder="website url"
                                    value="{{ $site->website_url }}" />
                                @error('website_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">DA</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="number" name="da" class="form-control form-control-lg form-control-solid"
                                    placeholder="DA" value="{{ $site->da }}" />
                                @error('da')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">PA</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="number" name="pa" class="form-control form-control-lg form-control-solid"
                                    placeholder="PA" value="{{ $site->pa }}" />
                                @error('pa')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->


                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">DR</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="number" name="dr" class="form-control form-control-lg form-control-solid"
                                    placeholder="DR" value="{{ $site->dr }}" />
                                @error('dr')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Traffic</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="number" name="traffic" class="form-control form-control-lg form-control-solid"
                                    placeholder="Traffic" value="{{ $site->traffic }}" />
                                @error('traffic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Niche/Category</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                @php
                                    // Decode the JSON data into an array of objects
                                    $categories = json_decode($site->category);
                                    $tagifyValues = [];
                                    if (is_array($categories)) {
                                        foreach ($categories as $categoryObj) {
                                            $tagifyValues[] = $categoryObj->value;
                                        }
                                    }
                                @endphp
                                <input class="form-control form-control-solid" name="category"
                                    value="{{ implode(',', $tagifyValues) }}"
                                    placeholder="Type a category/niche and press ENTER button" id="kt_tagify_2" />
                                @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->


                        <div class="form-check">
                            <label class="form-check-label" for="flexCheckChecked">
                                Google News
                            </label>
                            <input class="form-check-input" name="google_news" type="checkbox" value="1"
                                id="flexCheckChecked" {{ $site->google_news == 1 ? 'checked' : ' ' }} />
                        </div><br>

                        <div class="form-check">
                            <label class="form-check-label" for="flexCheckChecked">
                                Active
                            </label>
                            <input class="form-check-input" name="active" type="checkbox" value="1"
                                id="flexCheckChecked" {{ $site->active == 1 ? 'checked' : ' ' }} />
                        </div>

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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var input2 = document.querySelector("#kt_tagify_2");
            new Tagify(input2);
        });
    </script>
@endsection
