@extends('backend.layout.master')
@section('title', 'Invoices Generate')
@section('content')
    {{-- @dd($invoice) --}}
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form action="{{ route('invoice.update', $invoice->id) }}" method="POST">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body p-12">
                        <!--begin::Form-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start flex-xxl-row">
                            <!--begin::Input group-->
                            <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4"
                                data-bs-toggle="tooltip">
                                <span class="fs-2x fw-bold text-gray-800">Update Invoice</span>
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

                                    <div class="form-check"
                                        style="display: flex; align-items: start; margin-left:0px; padding-left:0px; ">
                                        <label class="form-label required fs-6 fw-bold text-gray-700 ">Bill To</label>
                                    </div>

                                    {{-- <div id="existingCustomer" class="mb-5">
                                        <select name="customerId" aria-label="Select a Timezone" data-control="select2"
                                            data-placeholder="Select Customer" class="form-select form-select-solid">
                                            <option value=""></option>
                                            @foreach (allCustomers() as $customer)
                                                <option value="{{ $customer->id }}"
                                                    {{ $customer->id == $invoice->user->id ? 'selected' : '' }}>
                                                    {{ $customer->email }}</option>
                                            @endforeach
                                        </select>
                                        @error('customerId')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div> --}}

                                    <div id="customUser">
                                        <div class="mb-5 d-none">
                                            <input type="hidden" name="userId" id="updateIdInput"
                                                class="form-control form-control-solid" />
                                        </div>
                                        <div class="mb-5">
                                            <input type="text" name="name" id="updateNameInput"
                                                class="form-control form-control-solid" placeholder="Enter name"
                                                value="{{ $invoice->user->name }}" />
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-5">
                                            <input type="text" name="business_name" id="updateBusinessNameInput"
                                                class="form-control form-control-solid" placeholder="Business name"
                                                value="{{ $invoice->user->business_name }}" />
                                            @error('business_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-5">
                                            <input type="email" name="email" id="updateEmailInput"
                                                class="form-control form-control-solid" placeholder="Enter email"
                                                value="{{ $invoice->user->email }}" />
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div id="updateEmailResults"></div>
                                        <div class="mb-5">
                                            <input type="text" name="address" id="updateAddressInput"
                                                class="form-control form-control-solid"
                                                placeholder="Address: ex- 3455 Geraldine Lane, New York 10013 United States"
                                                value="{{ $invoice->user->address }}" />
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-5">
                                            <input type="text" name="password" id="updatePasswordInput"
                                                class="form-control form-control-solid" placeholder="Enter new password" />
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <br><br><br>
                            <div class="row gx-10 mb-5">
                                <div class="col-lg-6">
                                    <div class="mb-5">
                                        <label class="form-label fs-6 fw-bold text-gray-700 mb-3">Order Number</label>
                                        <input type="text" name="custom_order_number"
                                            class="form-control form-control-solid" placeholder="Order Number"
                                            value="{{ $invoice->custom_order_number }}" />
                                        @error('custom_order_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            @if ($custom_service == 'NO')
                                <div id="existingProduct" class="table-responsive mb-10">
                                    <table class="table g-5 gs-0 mb-0 fw-bold text-gray-700" data-kt-element="items">
                                        <thead>
                                            <tr class="border-bottom fs-7 fw-bold text-gray-700 text-uppercase">
                                                <th class="min-w-200px w-375px">Item</th>
                                                <th class="min-w-200px w-250px text-end">Price</th>
                                                <th class="min-w-200px w-250px text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="item-list">
                                            @foreach ($invoice->order->items as $item)
                                                <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                                    <td class="pe-7">
                                                        <div class="mb-10">
                                                            <select name="products[]" aria-label="Select a Timezone"
                                                                data-control="select2" data-placeholder="Select Product"
                                                                class="form-select form-select-solid">
                                                                <option value=""></option>


                                                                @foreach (activeServices() as $service)
                                                                    <option value="{{ $service->id }}"
                                                                        {{ $service->id == $item->service_id ? 'selected' : '' }}
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
                                                        <span
                                                            data-kt-element="price">{{ serviceInfo($item->service_id)->price }}</span>
                                                    </td>
                                                    <td class="pt-5 text-end">
                                                        <button type="button"
                                                            class="btn btn-sm btn-icon btn-active-color-primary"
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
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="align-top fw-bold text-gray-700">
                                                <th class="text-primary">
                                                    <a href="#" class=" p-1 m-0" id="add-item">Add
                                                        item</a>
                                                </th>
                                                <th colspan="2" class="fs-4 ps-0">Subtotal</th>
                                                <th colspan="2" class="text-end fs-4 text-nowrap">$
                                                    <span data-kt-element="grand-total">{{ $totalPriceFormatted }}</span>
                                                </th>
                                            </tr>
                                            <tr class="align-top fw-bold text-gray-700">
                                                <th></th>
                                                <th colspan="2" class="fs-4 ps-0">Total</th>
                                                <th colspan="2" class="text-end fs-4 text-nowrap">$
                                                    <span data-kt-element="grand-total">{{ $totalPriceFormatted }}</span>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <input type="hidden" name="existingService" value="1">
                            @endif


                            @if ($custom_service == 'YES')
                                <div id="customProduct" class="table-responsive mb-10">
                                    <table class="table g-5 gs-0 mb-0 fw-bold text-gray-700" data-kt-element="items">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="border-bottom fs-7 fw-bold text-gray-700 text-uppercase">
                                                <th class="min-w-300px w-475px">Item</th>
                                                <th class="min-w-150px w-150px">Price</th>
                                                <th class="min-w-175px w-175px text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody id="custom-item-list">
                                            @foreach ($invoice->order->items as $item)
                                                <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                                    <td class="pe-7">
                                                        <input type="text" class="form-control form-control-solid mb-2"
                                                            name="custom_service_name[]"
                                                            value=" {{ $item->custom_service_name }} "
                                                            placeholder="Item name" />
                                                        <input type="text" class="form-control form-control-solid"
                                                            name="custom_service_description[]"
                                                            value=" {{ $item->custom_service_description }} "
                                                            placeholder="Description" />
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control form-control-solid text-end"
                                                            name="custom_service_price[]" placeholder="0.00"
                                                            value=" {{ $item->custom_service_price }} "
                                                            data-kt-element="price" />
                                                    </td>
                                                    <td class="pt-5 text-end">
                                                        <button type="button"
                                                            class="btn btn-sm btn-icon btn-active-color-primary"
                                                            data-kt-element="remove-custom-item">
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
                                            @endforeach

                                        </tbody>
                                        <!--end::Table body-->
                                        <!--begin::Table foot-->
                                        <tfoot>
                                            <tr class="border-top border-top-dashed align-top fs-6 fw-bold text-gray-700">
                                                <th class="text-primary">
                                                    <a class=" p-1 m-0" id="add-custom-item" style="cursor: pointer;">Add
                                                        item</a>
                                                </th>
                                                </th>
                                                <th colspan="2" class="border-bottom border-bottom-dashed ps-0">
                                                    <div class="d-flex flex-column align-items-start">
                                                        <div class="fs-5">Subtotal</div>
                                                    </div>
                                                </th>
                                                <th colspan="2" class="border-bottom border-bottom-dashed text-end">$
                                                    <span id="customServiceSubtotal">{{ $totalPriceFormatted }}</span>
                                                </th>
                                            </tr>
                                            <tr class="align-top fw-bold text-gray-700">
                                                <th></th>
                                                <th colspan="2" class="fs-4 ps-0">Total</th>
                                                <th colspan="2" class="text-end fs-4 text-nowrap">$
                                                    <span id="customServiceTotal">{{ $totalPriceFormatted }}</span>
                                                </th>
                                            </tr>
                                        </tfoot>
                                        <!--end::Table foot-->
                                    </table>
                                </div>
                            @endif


                            <!--begin::Notes-->
                            <div class="mb-0">
                                <label class="form-label fs-6 fw-bold text-gray-700">Notes
                                    <small>(optional)</small></label>
                                <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Notes">{{ $invoice->notes }}</textarea>
                            </div>
                            <!--end::Notes-->



                        </div>
                        <!--end::Wrapper-->
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

    <input type="hidden" id="update_invoice_check_email" value="{{ route('invoice.check.email') }}">


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

    <script>
        $(document).ready(function() {
            $("#customerCheck").on("change", function() {
                if ($(this).prop("checked")) {
                    $("#existingCustomer").removeClass("d-none");
                    $("#customUser").addClass("d-none");
                } else {
                    $("#existingCustomer").addClass("d-none");
                    $("#customUser").removeClass("d-none");
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $("#customService").on("change", function() {
                if ($(this).prop("checked")) {
                    $("#existingProduct").removeClass("d-none");
                    $("#customProduct").addClass("d-none");
                } else {
                    $("#existingProduct").addClass("d-none");
                    $("#customProduct").removeClass("d-none");
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#add-custom-item").click(function() {
                var newRow = `
                <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                    <td class="pe-7">
                        <input type="text" class="form-control form-control-solid mb-2"
                            name="custom_service_name[]" placeholder="Item name" />
                        <input type="text" class="form-control form-control-solid"
                            name="custom_service_description[]" placeholder="Description" />
                    </td>
                    <td>
                        <input type="number" class="form-control form-control-solid text-end"
                            name="custom_service_price[]" placeholder="0.00" value="0"
                            data-kt-element="price" />
                    </td>
                    <td class="pt-5 text-end">
                        <button type="button"
                            class="btn btn-sm btn-icon btn-active-color-primary"
                            data-kt-element="remove-custom-item">
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
            `;
                $("#custom-item-list").append(newRow);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            function updateSubtotalAndTotal() {
                var subtotal = 0;
                $('input[name="custom_service_price[]"]').each(function() {
                    subtotal += parseFloat($(this).val() || 0);
                });
                $('#customServiceSubtotal').text(subtotal.toFixed(2));

                var total = subtotal;
                $('#customServiceTotal').text(total.toFixed(2));
            }
            updateSubtotalAndTotal();
            $('#add-custom-item').on('click', function() {
                var newRow = `
                <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                </tr>
                `;
                $('#custom-item-list').append(newRow);
                updateSubtotalAndTotal();
            });
            $(document).on('input', 'input[name="custom_service_price[]"]', function() {
                updateSubtotalAndTotal();
            });
            $(document).on('click', '[data-kt-element="remove-custom-item"]', function() {
                $(this).closest('tr').remove();
                updateSubtotalAndTotal();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#updateEmailInput').on('input', function() {
                console.log('dgf');
                const email = $(this).val();
                var formUrl = $("#update_invoice_check_email").val();
                $.ajax({
                    url: formUrl,
                    method: 'POST',
                    data: {
                        email: email,
                        "_token": $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('Response:', response);
                        // Clear previous results
                        $('#updateEmailResults').empty();

                        // Display the matching email results below the email input
                        if (response && response.user && response.user
                            .length > 0) {
                            response.user.forEach(function(user) {
                                const resultDiv = $(
                                    '<div class="updateEmailResult list-group list-group-item list-group-item-action p-3 rounded mb-1"><a href="#" class="updateEmailResult list-group-item list-group-item-action active border border-primary" aria-current="true"></a></div>'
                                );
                                resultDiv.text(user.email);
                                resultDiv.data('user', user); // Store user data
                                $('#updateEmailResults').append(resultDiv);
                            });
                        }
                    }
                });
            });

            // Event listener for selecting an user info from the results
            $(document).on('click', '.updateEmailResult', function() {
                const selectedUser = $(this).data('user');

                $('#updateIdInput').val(selectedUser.id);
                $('#updateEmailInput').val(selectedUser.email);
                $('#updateNameInput').val(selectedUser.name);
                $('#updateAddressInput').val(selectedUser.address);
                $('#updateBusinessNameInput').val(selectedUser.business_name);
                $('#updateEmailResults').empty();
            });
        });
    </script>


@endsection
