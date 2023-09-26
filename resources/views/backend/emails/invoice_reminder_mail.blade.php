<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../" />
    <title>Invoice Reminder</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    <style>
        @media only screen and(min-width: 320px) and (max-width: 480px) {
            .item-details p {
                font-size: 12px !important;
            }

            .item-title {
                width: 70%;
            }

            .item-price {
                width: 25%;
            }
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank">
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root" style="background-color: #F4F5FF; padding: 30px 15px;">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Body-->
            <div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true"
                data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav"
                data-kt-scroll-offset="5px" data-kt-scroll-save-state="true"
                style="background-color:#D5D9E2; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">
                <!--begin::Email template-->
                <style>
                    html,
                    body {
                        padding: 0;
                        margin: 0;
                        font-family: Inter, Helvetica, "sans-serif";
                    }

                    a:hover {
                        color: #009ef7;
                    }
                </style>
                <div id="#kt_app_body_content"
                    style="background-color:#D5D9E2; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
                    <div
                        style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                            height="auto" style="border-collapse:collapse">
                            <tbody>
                                <tr>
                                    <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                                        <!--begin:Email content-->
                                        <div style="margin-bottom:55px; text-align:left">
                                            <!--begin:Logo-->
                                            <div style="margin:-10px 60px 54px 60px; text-align:center;">
                                                <a href="https://gpitfirm.com" rel="noopener" target="_blank">
                                                    <img alt="Logo"
                                                        src="https://gpitfirm.com/wp-content/uploads/2023/09/Screenshot_8-removebg-preview-1.png"
                                                        style="height: 35px" />
                                                </a>
                                            </div>
                                            <!--end:Logo-->
                                            <!--begin:Text-->
                                            <div
                                                style="font-size:14px; text-align:left; font-weight:500; margin:0 60px 33px 60px; font-family:Arial,Helvetica,sans-serif">
                                                <p
                                                    style="color:#181C32; font-size: 18px; font-weight:600; margin-bottom:27px">
                                                    Hey {{ $invoice['user']['name'] }},</p>
                                                <p style="color:#3F4254; line-height:1.6">
                                                    We noticed you haven't completed your order number is
                                                    (#{{ $invoice['order']['order_number'] }}).
                                                    Not to worry, there is still time to finish your checkout!
                                                </p>

                                                <!--begin:Order-->
                                                <div style="margin-bottom: 10px">
                                                    <!--begin:Title-->
                                                    <h3
                                                        style="text-align:left; color:#181C32; font-size: 18px; font-weight:600; margin-bottom: 22px">
                                                        Order summary</h3>
                                                    <!--end:Title-->
                                                    <!--begin:Items-->
                                                    <div style="padding-bottom:9px">
                                                        <!--begin:Item-->
                                                        @foreach ($invoice['order']['items'] as $item)
                                                            @if ($item->service_id != null)
                                                                <div class="item-details"
                                                                    style="border-bottom:1px solid gray; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500; margin-bottom: 15px;
                                                                    padding-bottom: 15px;">
                                                                    <!--begin:Description-->
                                                                    <div class="item-title"
                                                                        style="width: 75%; display: inline-block; font-family:Arial,Helvetica,sans-serif">
                                                                        <p>{{ serviceInfo($item->service_id)->name }}
                                                                        </p>
                                                                    </div>
                                                                    <!--end:Description-->
                                                                    <!--begin:Total-->
                                                                    <div class="item-price"
                                                                        style="width: 20%; float: right;display: inline-block; font-family:Arial,Helvetica,sans-serif">
                                                                        <p>${{ serviceInfo($item->service_id)->price }}
                                                                        </p>
                                                                    </div>
                                                                    <!--end:Total-->
                                                                </div>
                                                            @else
                                                                <div class="item-details"
                                                                    style="border-bottom:1px solid gray; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500; margin-bottom: 15px;
                                                                    padding-bottom: 15px;">
                                                                    <!--begin:Description-->
                                                                    <div class="item-title"
                                                                        style="width: 75%; display: inline-block; font-family:Arial,Helvetica,sans-serif">
                                                                        <p>{{ $item->custom_service_name }}</p>
                                                                    </div>
                                                                    <!--end:Description-->
                                                                    <div class="item-price"
                                                                        style="width: 20%; float: right;display: inline-block; font-family:Arial,Helvetica,sans-serif">
                                                                        <p>${{ $item->custom_service_price }}</p>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        <!--end:Item-->

                                                        <!--begin::Separator-->
                                                        <div class="separator separator-dashed" style="margin:15px 0">
                                                        </div>
                                                        <!--end::Separator-->
                                                        <!--begin:Item-->
                                                        <div style="color:#7E8299; font-size: 14px; font-weight:500">
                                                            <!--begin:Description-->
                                                            <div
                                                                style="width: 75%; display:inline-block; font-family:Arial,Helvetica,sans-serif">
                                                                Total
                                                            </div>
                                                            <!--end:Description-->
                                                            <!--begin:Total-->
                                                            <div
                                                                style="width: 20%; float: right; display:inline-block; color:#50cd89; font-weight:700; font-family:Arial,Helvetica,sans-serif">
                                                                ${{ $invoice['order']['total_amount'] }}</div>
                                                            <!--end:Total-->
                                                        </div>
                                                        <!--end:Item-->
                                                    </div>
                                                    <!--end:Items-->
                                                </div>
                                                <!--end:Order-->
                                            </div>
                                            <!--end:Text-->



                                            <!--begin:Action-->
                                            <a href="https://gpitfirm.com/" target="_blank"
                                                style="text-decoration:none; background-color:#50cd89; border-radius:6px; display:inline-block; margin-left:60px; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500; font-family:Arial,Helvetica,sans-serif">Complete
                                                Order</a>
                                            <!--end:Action-->
                                        </div>
                                        <!--end:Email content-->
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="center"
                                        style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
                                        <p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">
                                            It’s all about customers!</p>
                                        <p style="margin-bottom:2px">Call our customer care number:
                                            {{ $details['company_phone'] }}
                                        </p>
                                        <p style="margin-bottom:4px">You may reach us at
                                            <a href="https://gpitfirm.com/" rel="noopener" target="_blank"
                                                style="text-decoration:none; font-weight: 600">{{ $details['company_website'] }}</a>.
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="center"
                                        style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
                                        <p>&copy; Copyright {{ $details['company_name'] }}
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Email template-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Root-->
</body>
<!--end::Body-->

</html>
