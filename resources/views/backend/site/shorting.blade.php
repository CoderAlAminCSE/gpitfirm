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
                        <!--begin::Card body-->
                        <div class="card-body py-4 overflow-x-scroll">
                            <!--begin::Table-->

                            <table id="table" class="table table-striped table-hover">
                                <thead>
                                    <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th></th>
                                        <th>Website Name</th>
                                        <th>Website URL</th>
                                        <th>DA</th>
                                        <th>PA</th>
                                        <th>Traffic</th>
                                        <th>Category</th>
                                        <th>Google News</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="tablecontents">
                                    @foreach ($sites as $site)
                                        <tr class="row1" data-id="{{ $site->id }}">
                                            <td class="pl-3"><i class="fa fa-sort"></i></td>
                                            <td>{{ $site->website_name }}</td>
                                            <td><a target="_blank"
                                                    href="{{ $site->website_url }}">{{ $site->website_url }}</a></td>
                                            <td>{{ $site->da }}</td>
                                            <td>{{ $site->pa }}</td>
                                            <td>{{ $site->traffic }}K</td>
                                            <td>
                                                @php
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

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
    <script src="{{ asset('assets/backend') }}/js/site.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#table").DataTable();

            $("#tablecontents").sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
                var order = [];
                var token = $('meta[name="csrf-token"]').attr('content');
                $('tr.row1').each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('dashboard/sites/site/sortable') }}",
                    data: {
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }
        });
    </script>
@endsection
