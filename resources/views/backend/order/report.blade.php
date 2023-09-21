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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Order
                            Report
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

            <!--begin::Modal-->
            <div class="modal fade" tabindex="-1" id="kt_modal_1">
                <div class="modal-dialog">
                    <form id="SearchForm" action="{{ route('order.report') }}" method="GET">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Choose Custom Date</h5>

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span class="svg-icon fs-2x"></span>
                                </div>
                                <!--end::Close-->
                            </div>

                            <div class="modal-body">
                                <div class="mb-0">
                                    <label class="form-label">Basic example</label>
                                    <input class="form-control form-control-solid" name="time_range"
                                        placeholder="Pick date rage" id="kt_daterangepicker_1" />
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--end::Modal-->

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
                                {{-- <div class="d-flex align-items-center position-relative my-1"
                                    onclick="document.getElementById('SearchForm').submit()">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <form id="SearchForm" action="{{ route('order.index') }}" method="get">
                                    @csrf
                                    <input type="text" data-kt-subscription-table-filter="search" name="search"
                                        value="{{ request('search') }}"
                                        class="form-control form-control-solid w-250px ps-14"
                                        placeholder="Search Order"form="SearchForm" />
                                </form> --}}
                                <!--end::Search-->

                                <div>
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
                                        <div class="menu-item px-3"
                                            onclick="document.getElementById('SearchForm').submit()">
                                            <a href="#" class="menu-link px-3">Today</a>
                                            <form id="SearchForm" action="{{ route('order.report') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="time_range" value="today">
                                            </form>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3"
                                            onclick="document.getElementById('SearchForm7days').submit()">
                                            <a href="#" class="menu-link px-3">Last 7 Days</a>
                                            <form id="SearchForm7days" action="{{ route('order.report') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="time_range" value="last7days">
                                            </form>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3"
                                            onclick="document.getElementById('SearchForm30days').submit()">
                                            <a href="#" class="menu-link px-3">Last 30 Days</a>
                                            <form id="SearchForm30days" action="{{ route('order.report') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="time_range" value="last30days">
                                            </form>
                                        </div>
                                        <!--end::Menu item-->


                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_1">Custom Range</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu 3-->
                                </div>

                                <!--begin::Menu 3-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <form id="SearchForm" action="{{ route('order.index') }}" method="get">
                                            @csrf
                                            <input type="text" data-kt-subscription-table-filter="search"
                                                name="search" value="{{ request('search') }}"
                                                class="form-control form-control-solid w-250px ps-14"
                                                placeholder="Search Order"form="SearchForm" />
                                            <button type="submit" class="menu-link px-3">Today</button>
                                        </form>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Last 7 Days</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Last 30 Days</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Custom Range</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu 3-->
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4 overflow-x-scroll">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <thead>
                                    <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-50px">SL</th>
                                        <th class="min-w-100px">Ord Number</th>
                                        <th class="min-w-125px">Customer</th>
                                        <th class="min-w-100px">Amount</th>
                                        <th class="min-w-70px">Status</th>
                                        <th class="min-w-70px">Ord Type</th>
                                        <th class="min-w-70px">Order Date</th>
                                        <th class="text-end min-w-100px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                    @forelse ($orders as $order)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ userData($order->user_id)->name }}</td>
                                            <td>${{ $order->total_amount }}</td>
                                            <td>
                                                <div
                                                    class="badge @if ($order->canceled_at != null) badge-light-danger
                                                @elseif($order->payment_status == 1)
                                                badge-light-success
                                                @else
                                                badge-light-warning @endif ">
                                                    @if ($order->canceled_at != null)
                                                        Canceled
                                                    @elseif($order->payment_status == 1)
                                                        Confirmed
                                                    @else
                                                        Pending payment
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ $order->order_type }}</td>
                                            <td>{{ $order->created_at }}</td>
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
                                                        <a href="{{ route('order.show', $order->id) }}"
                                                            class="menu-link px-3">View</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    @if ($order->canceled_at == null && $order->payment_status == 0)
                                                        <div class="menu-item px-3">
                                                            <a href="{{ route('order.cancel', $order->id) }}"
                                                                class="menu-link px-3">Cancel</a>
                                                        </div>
                                                    @endif

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
                                    {{ $orders->links() }}
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var $test = $('#kt_daterangepicker_1');
        $test.daterangepicker();
    });
</script>

@section('script')
    <script src="{{ asset('assets/backend') }}/js/site.js"></script>
@endsection
