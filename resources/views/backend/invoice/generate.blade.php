@extends('backend.layout.master')
@section('title', 'Invoices Generate')
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form action="{{ route('invoice.store') }}" method="POST">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body p-12">
                        <!--begin::Form-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start flex-xxl-row">
                            <!--begin::Input group-->
                            <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4"
                                data-bs-toggle="tooltip" data-bs-trigger="hover" title="Enter invoice number">
                                <span class="fs-2x fw-bold text-gray-800">Invoice Generate </span>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Top-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-10"></div>
                        <!--end::Separator-->
                        <!--begin::Wrapper-->
                        <div class="mb-0">
                            <!--begin::Row-->
                            <div class="row gx-10 mb-5">
                                <div class="col-lg-6">
                                    <label class="form-label fs-6 fw-bold text-gray-700 mb-3">Bill
                                        From</label>
                                    <!--begin::Input group-->
                                    <div class="mb-5">
                                        <input type="text" class="form-control form-control-solid"
                                            value="{{ siteSetting('company_name') ?? null }}" readonly />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-5">
                                        <input type="text" class="form-control form-control-solid"
                                            value="{{ siteSetting('company_email') ?? null }}" readonly />
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label required fs-6 fw-bold text-gray-700 mb-3">Bill
                                        To </label>
                                    <div class="mb-5">
                                        <input type="text" name="name" class="form-control form-control-solid"
                                            placeholder="Name" required />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-5">
                                        <input type="email" name="email" class="form-control form-control-solid"
                                            placeholder="Email" required />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <br><br><br>
                            <div class="table-responsive mb-10">
                                <table class="table g-5 gs-0 mb-0 fw-bold text-gray-700" data-kt-element="items">
                                    <thead>
                                        <tr class="border-bottom fs-7 fw-bold text-gray-700 text-uppercase">
                                            <th class="min-w-200px w-375px">Item</th>
                                            <th class="min-w-200px w-250px text-end">Price</th>
                                            <th class="min-w-200px w-250px text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="item-list">
                                        <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                            <td class="pe-7">
                                                <div class="mb-10">
                                                    <select name="products[]" aria-label="Select a Timezone"
                                                        data-control="select2" data-placeholder="Select Product"
                                                        class="form-select form-select-solid">
                                                        <option value=""></option>
                                                        @foreach (activeServices() as $service)
                                                            <option value="{{ $service->id }}"
                                                                data-price="{{ $service->price }}">
                                                                {{ $service->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('products[]')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td class="pt-8 text-end text-nowrap">$
                                                <span data-kt-element="price">0.00</span>
                                            </td>
                                            <td class="pt-5 text-end">
                                                <button type="button" class="btn btn-sm btn-icon btn-active-color-primary"
                                                    data-kt-element="remove-item">
                                                    <i class="ki-duotone ki-trash fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="align-top fw-bold text-gray-700">
                                            <th class="text-primary">
                                                <a href="#" class="py-1" id="add-item">Add item</a>
                                            </th>
                                            <th colspan="2" class="fs-4 ps-0">Subtotal</th>
                                            <th colspan="2" class="text-end fs-4 text-nowrap">$
                                                <span data-kt-element="grand-total">0.00</span>
                                            </th>
                                        </tr>
                                        <tr class="align-top fw-bold text-gray-700">
                                            <th></th>
                                            <th colspan="2" class="fs-4 ps-0">Total</th>
                                            <th colspan="2" class="text-end fs-4 text-nowrap">$
                                                <span data-kt-element="grand-total">0.00</span>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary"
                            id="kt_account_profile_details_submit">Generate</button>
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
        $(document).ready(function() {
            $('body').on('change', 'select[name="products[]"]', function() {
                updateItemPrice($(this));
            });

            $('#add-item').on('click', function(e) {
                e.preventDefault();

                // Create a new row with the necessary HTML structure
                var $newItem = $('<tr class="border-bottom border-bottom-dashed" data-kt-element="item">' +
                    '<td class="pe-7">' +
                    '<div class="mb-10">' +
                    '<select name="products[]" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Product" class="form-select form-select-solid">' +
                    '<option value=""></option>' +
                    '@foreach (activeServices() as $service)' +
                    '<option value="{{ $service->id }}" data-price="{{ $service->price }}">{{ $service->name }}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +
                    '</td>' +
                    '<td class="pt-8 text-end text-nowrap">$<span data-kt-element="price">0.00</span></td>' +
                    '<td class="pt-5 text-end">' +
                    '<button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-kt-element="remove-item">' +
                    '<i class="ki-duotone ki-trash fs-3">' +
                    '<span class="path1"></span>' +
                    '<span class="path2"></span>' +
                    '<span class="path3"></span>' +
                    '<span class="path4"></span>' +
                    '<span class="path5"></span>' +
                    '</i>' +
                    '</button>' +
                    '</td>' +
                    '</tr>');

                // Append the new item to the table
                $('#item-list').append($newItem);

                // Initialize Select2 and attach change event listener
                var $productSelect = $newItem.find('select[name="product"]');
                $productSelect.select2({
                    placeholder: 'Select Product'
                }).on('change', function() {
                    updateItemPrice($(this));
                });

                calculateTotals();
            });

            $('body').on('click', '[data-kt-element="remove-item"]', function() {
                var $itemRow = $(this).closest('[data-kt-element="item"]');
                $itemRow.remove();

                calculateTotals();
            });

            function updateItemPrice($select) {
                var selectedOption = $select.find('option:selected');
                var price = parseFloat(selectedOption.data('price'));
                if (!isNaN(price)) {
                    $select.closest('tr').find('[data-kt-element="price"]').text(price.toFixed(2));
                    calculateTotals();
                }
            }

            function calculateTotals() {
                var subtotal = 0;
                $('tbody [data-kt-element="item"]').each(function() {
                    var price = parseFloat($(this).find('[data-kt-element="price"]').text());

                    if (!isNaN(price)) {
                        subtotal += price;
                    }
                });
                $('[data-kt-element="grand-total"]').text(subtotal.toFixed(2));
            }
        });
    </script>
@endsection
