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
                            <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4">
                                <span class="fs-2x fw-bold text-gray-800">Generate An Invoice</span>
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
                                        <label class="form-label required fs-6 fw-bold text-gray-700">Bill To</label>
                                        {{-- <div class="form-check" style="margin-left: 10px;">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="existingCustomr" id="customerCheck" />
                                            <label class="form-check-label" for="customerCheck">Not A Customer?</label>
                                        </div> --}}
                                    </div>

                                    <div id="existingCustomer" class="mb-5 d-none">
                                        <select name="customerId" aria-label="Select a Timezone" data-control="select2"
                                            data-placeholder="Select Customer" class="form-select form-select-solid">
                                            <option value=""></option>
                                            @foreach (allCustomers() as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->email }}</option>
                                            @endforeach
                                        </select>
                                        @error('customerId')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div id="customUser" class="">
                                        <div class="mb-5 d-none">
                                            <input type="hidden" name="userId" id="idInput"
                                                class="form-control form-control-solid" />
                                        </div>
                                        <div class="mb-5">
                                            <input type="text" name="name" id="nameInput"
                                                class="form-control form-control-solid" placeholder="Enter name" />
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-5">
                                            <input type="text" name="business_name" id="businessNameInput"
                                                class="form-control form-control-solid" placeholder="Business name"
                                                value="{{ old('business_name') }}" />
                                            @error('business_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-5">
                                            <input type="email" name="email" id="emailInput"
                                                class="form-control form-control-solid" placeholder="Enter email" />
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div id="emailResults"></div>
                                        <div class="mb-5">
                                            <input type="text" name="address" id="addressInput"
                                                class="form-control form-control-solid"
                                                placeholder="Address: ex- 3455 Geraldine Lane, New York 10013 United States" />
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-5">
                                            <input type="text" name="password" id="passwordInput"
                                                class="form-control form-control-solid" placeholder="Enter password" />
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
                                            value="{{ old('custom_order_number') }}" />
                                        @error('custom_order_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="existingService"
                                    id="customService" checked />
                                <label class="form-check-label" for="customService">Existing Service?</label>
                            </div>

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
                                    </tbody>
                                    <tfoot>
                                        <tr class="align-top fw-bold text-gray-700">
                                            <th class="text-primary">
                                                <a href="#" class=" p-1 m-0" id="add-item">Add
                                                    item</a>
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
                                        <tr class="align-top fw-bold text-gray-700">
                                            <th></th>
                                            <th colspan="2" class="fs-4 ps-0">Discount</th>
                                            <th colspan="5" class="text-end fs-4 text-nowrap">
                                                <input type="text" name="invoice_discount"
                                                    class="form-control form-control-solid text-end" placeholder="0.00"
                                                    value="0" data-kt-element="invoice_discount" />
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>


                            <div id="customProduct" class="table-responsive mb-10 d-none">
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
                                                <span id="customServiceSubtotal">0.00</span>
                                            </th>
                                        </tr>
                                        <tr class="align-top fw-bold text-gray-700">
                                            <th></th>
                                            <th colspan="2" class="fs-4 ps-0">Total</th>
                                            <th colspan="2" class="text-end fs-4 text-nowrap">$
                                                <span id="customServiceTotal">0.00</span>
                                            </th>
                                        </tr>
                                        <tr class="align-top fw-bold text-gray-700">
                                            <th></th>
                                            <th colspan="2" class="fs-4 ps-0">Discount</th>
                                            <th colspan="5" class="text-end fs-4 text-nowrap">
                                                <input type="text" name="custom_invoice_discount"
                                                    class="form-control form-control-solid text-end" placeholder="0.00"
                                                    value="0" data-kt-element="custom_invoice_discount" />
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <!--end::Table foot-->
                                </table>
                            </div>

                            <!--begin::Notes-->
                            <div class="mb-0">
                                <label class="form-label fs-6 fw-bold text-gray-700">Notes
                                    <small>(optional)</small></label>
                                <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Notes"></textarea>
                            </div>
                            <!--end::Notes-->



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

    <input type="hidden" id="invoice_check_email" value="{{ route('invoice.check.email') }}">


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
            // Function to calculate totals
            function calculateTotals() {
                var subtotal = 0;
                $('tbody [data-kt-element="item"]').each(function() {
                    var price = parseFloat($(this).find('[data-kt-element="price"]').text());

                    if (!isNaN(price)) {
                        subtotal += price;
                    }
                });

                // Get the discount amount from the discount field
                var discount = parseFloat($('input[name="invoice_discount"]').val()) || 0;

                // Calculate the grand total after applying the discount
                var grandTotal = subtotal - discount;

                // Update the grand total on the page
                $('[data-kt-element="grand-total"]').text(grandTotal.toFixed(2));
            }

            // Calculate totals when the page loads
            calculateTotals();

            // Calculate totals when a product is added or removed
            $(document).on('click', '#add-item', function() {
                calculateTotals();
            });

            // Calculate totals when a discount amount is entered or changed
            $('input[name="invoice_discount"]').on('input', function() {
                calculateTotals();
            });
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
        function updateSubtotalAndTotal() {
            var subtotal = 0;
            $('input[name="custom_service_price[]"]').each(function() {
                subtotal += parseFloat($(this).val() || 0);
            });

            var discount = parseFloat($('[data-kt-element="custom_invoice_discount"]').val()) || 0;

            // Calculate the new subtotal after applying the discount
            var newSubtotal = subtotal - discount;

            $('#customServiceSubtotal').text(newSubtotal.toFixed(2));
            $('#customServiceTotal').text(newSubtotal.toFixed(2));
        }

        // Calculate subtotal and total when the page loads
        updateSubtotalAndTotal();

        // Calculate subtotal and total when a product is added or removed
        $(document).on('input', 'input[name="custom_service_price[]"]', function() {
            updateSubtotalAndTotal();
        });

        // Calculate subtotal and total when the discount field is changed
        $('[data-kt-element="custom_invoice_discount"]').on('input', function() {
            updateSubtotalAndTotal();
        });
    });
</script>



    <script>
        $(document).ready(function() {
            $('#emailInput').on('input', function() {
                const email = $(this).val();
                var formUrl = $("#invoice_check_email").val();
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
                        $('#emailResults').empty();

                        // Display the matching email results below the email input
                        if (response && response.user && response.user
                            .length > 0) {
                            response.user.forEach(function(user) {
                                const resultDiv = $(
                                    '<div class="emailResult list-group list-group-item list-group-item-action p-3 rounded mb-1"><a href="#" class="emailResult list-group-item list-group-item-action active border border-primary" aria-current="true"></a></div>'
                                );
                                resultDiv.text(user.email);
                                resultDiv.data('user', user); // Store user data
                                $('#emailResults').append(resultDiv);
                            });
                        }
                    }
                });
            });

            // Event listener for selecting an user info from the results
            $(document).on('click', '.emailResult', function() {
                const selectedUser = $(this).data('user');

                $('#idInput').val(selectedUser.id);
                $('#emailInput').val(selectedUser.email);
                $('#nameInput').val(selectedUser.name);
                $('#addressInput').val(selectedUser.address);
                $('#businessNameInput').val(selectedUser.business_name);
                $('#emailResults').empty();
            });
        });
    </script>




@endsection
