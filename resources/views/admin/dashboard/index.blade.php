 @extends('layouts.admin')

{{--@extends('admin.dashboard.showCard')--}}
@section('content')
    <div class="col-span-12 xl:col-span-9 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">General Report</h2>
            <a href="" class="ml-auto text-primary truncate">Show More</a>
        </div>
        <div class="report-box-2 intro-y mt-5">
            <div class="box grid grid-cols-10">
                <div class="col-span-5  md:col-span-5  lg:col-span-5  xl:col-span-2 px-8 xl:order-0 order-2 py-12 flex flex-col justify-center">
                    <i data-lucide="pie-chart" class="w-10 h-10 text-pending"></i>
                    <div class="justify-start flex items-center text-slate-600 dark:text-slate-300 mt-12">
                        Total sold amount
                        <i id="salesTotal" data-lucide="alert-circle" class="tooltip w-4 h-4 ml-1.5"
                           title="Total sales amount"></i>
                    </div>
                    <div class="flex items-center justify-start mt-4">
                        <div class="relative text-2xl font-medium">
                            <span id="totalSales" class="text-xl font-medium" title="000"></span>
                        </div>
                        <a class="text-slate-500 ml-4" href="">
                            <i data-lucide="refresh-ccw" class="w-4 h-4"></i>
                        </a>
                    </div>
                    <div class="mt-4 text-slate-500 text-xs">Updated just now</div>

                </div>
                <div class="col-span-10 md:col-span-10 lg:col-span-10 xl:col-span-6 xl:order-1 order-1 p-8 border-t xl:border-b-0 lg:border-b lg:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
                    <ul class="nav nav-pills col-span-12 border border-slate-300 dark:border-darkmode-300 border-dashed rounded-md p-1 mb-8" role="tablist">
                        <li id="" class="nav-item flex-1" role="presentation">
                            <button
                                name="dataForm"
                                class="dataForm nav-link w-full p-2 "
                            >Today</button>
                        </li>
                        <li id="" class="nav-item flex-1" role="presentation">
                            <button
                                name="dataForm"
                                class="dataForm nav-link w-full p-2 "
                            >Weekly</button>
                        </li>
                        <li id="" class="nav-item flex-1" role="presentation">
                            <button
                                name=""
                                class="dataForm dataFormMonth nav-link w-full p-2 active"
                            >Monthly</button>
                        </li>
                        <li id="date_report" class="nav-item flex-1" role="presentation">
                            <input id="calendarDash" type="text" class="datepicker form-control sm:w-56 box pl-5"
                                   value="">
                        </li>
                    </ul>
                    <div id="dashboardPart" class="pt-10">

                    </div>
                </div>
                <div class="col-span-5  md:col-span-5  lg:col-span-5  xl:col-span-2 p-5 mt-5 xl:order-2 order-3 flex flex-col lg:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
                    <div class="mt-3">
                        <div class="h-[213px]">
                                <canvas id="report-donut-chart" class="block" width="189" height="213" style="box-sizing: border-box; height: 213px; width: 189px;"></canvas>
                        </div>
                    </div>
                    <div class="w-52 sm:w-auto mx-6 mt-8">
                        <div class="flex items-center w-full">
                            <div class="w-2 h-2 bg-success rounded-full mr-3"></div>
                            <span class="truncate">Total</span>
                            <span id="donutTotal" class="font-medium ml-auto">100</span>%
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                            <span class="truncate">Paid</span>
                            <span id="donutPaid" class="font-medium ml-auto">60</span>%
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                            <span class="truncate">Debt</span>
                            <span id="donutDebt" class="font-medium ml-auto">20</span>%
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="faq-accordion-2" class="accordion accordion-boxed py-5">

        </div>
    </div>

    <style>

    </style>
@endsection

@section('scripts')

    <script>

        function updateDash($dataForm) {
            let value = {
                'dataForm': $dataForm,
                'calendar': $('#calendarDash').val()
            }
            $.ajax({
                type: 'get',
                url: '{{URL::to('/admin/dashboardContent')}}',
                data: value,
                success: function (data) {
                    $('#salesTotal').attr('title', `Total value of your sales: `+ data['salesTotal']);
                    $('#totalSales').text(data['salesTotal']).attr('title', data['salesTotal']);
                    $('#faq-accordion-2').html(data['clients']);
                    $('#dashboardPart').html(data['dashboardPart']);
                    $('#calendarDash').val(data['calendar']);
                },
            });
        }

        jQuery(document).ready(function($){
            $('.dataFormMonth').click();
        })

        $(document).on('click', '.button-apply', function () {
            updateDash('date');
            $('.dataForm').removeClass('active');
            $('#calendarDash').addClass('bg-primary text-white');
        })
        $(document).on('click', '.dataForm', function () {
            updateDash($(this).text());
            $('#calendarDash').removeClass('bg-primary text-white');
            $('.dataForm').removeClass('active');
            $(this).addClass('active');
        })

    </script>

@endsection
