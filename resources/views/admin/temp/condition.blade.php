@extends('layouts.admin')
@section('content')
    <div class="report-box-2 intro-y mt-5">
        <div class="box grid grid-cols-12">
            <div class="col-span-12 lg:col-span-4 px-8 py-12 flex flex-col justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="pie-chart" data-lucide="pie-chart" class="lucide lucide-pie-chart w-10 h-10 text-pending"><path d="M21.21 15.89A10 10 0 118 2.83"></path><path d="M22 12A10 10 0 0012 2v10z"></path></svg>
                <div class="justify-start flex items-center text-slate-600 dark:text-slate-300 mt-12">
                    My Total Assets
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="alert-circle" data-lucide="alert-circle" class="lucide lucide-alert-circle tooltip w-4 h-4 ml-1.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                </div>
                <div class="flex items-center justify-start mt-4">
                    <div class="relative text-2xl font-medium pl-3 ml-0.5">
                        <span class="absolute text-xl font-medium top-0 left-0 -ml-0.5">$</span> 1,413,102.02
                    </div>
                    <a class="text-slate-500 ml-4" href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="refresh-ccw" data-lucide="refresh-ccw" class="lucide lucide-refresh-ccw w-4 h-4"><path d="M3 2v6h6"></path><path d="M21 12A9 9 0 006 5.3L3 8"></path><path d="M21 22v-6h-6"></path><path d="M3 12a9 9 0 0015 6.7l3-2.7"></path></svg>
                    </a>
                </div>
                <div class="mt-4 text-slate-500 text-xs">Last updated 1 hour ago</div>
                <button class="btn btn-outline-secondary relative justify-start rounded-full mt-12" control-id="ControlID-2">
                    Download Reports
                    <span class="w-8 h-8 absolute flex justify-center items-center bg-primary text-white rounded-full right-0 top-0 bottom-0 my-auto ml-auto mr-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="arrow-right" data-lucide="arrow-right" class="lucide lucide-arrow-right w-4 h-4"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                    </span>
                </button>
            </div>
            <div class="col-span-12 lg:col-span-8 p-8 border-t lg:border-t-0 lg:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
                <ul class="
                                        nav
                                        nav-pills
                                        w-60
                                        border
                                        border-slate-300
                                        dark:border-darkmode-300
                                        border-dashed
                                        rounded-md
                                        mx-auto
                                        p-1
                                        mb-8
                                    " role="tablist">
                    <li id="weekly-report-tab" class="nav-item flex-1" role="presentation">
                        <button class="nav-link w-full py-1.5 px-2 active" data-tw-toggle="pill" data-tw-target="#weekly-report" type="button" role="tab" aria-controls="weekly-report" aria-selected="true" control-id="ControlID-3">
                            Weekly
                        </button>
                    </li>
                    <li id="monthly-report-tab" class="nav-item flex-1" role="presentation">
                        <button class="nav-link w-full py-1.5 px-2" data-tw-toggle="pill" data-tw-target="#monthly-report" type="button" role="tab" aria-selected="false" control-id="ControlID-4">
                            Monthly
                        </button>
                    </li>
                </ul>
                <div class="tab-content px-5 pb-5">
                    <div class="tab-pane active grid grid-cols-12 gap-y-8 gap-x-10" id="weekly-report" role="tabpanel" aria-labelledby="weekly-report-tab">
                        <div class="col-span-6 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Unpaid Loan</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">4.501</div>
                                <div class="text-danger flex text-xs font-medium tooltip cursor-pointer ml-2">
                                    2% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Active Partner</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">2</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Paid Installment</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">$72.000</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Disbursement</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">$54.000</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Success Payment</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">2.500</div>
                                <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2">
                                    52% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Unpaid Loan</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">$72.000</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Posted Campaign</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">4.501</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Social Media</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">2</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Net Margin</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">$72.000</div>
                                <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2">
                                    49% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane grid grid-cols-12 gap-y-8 gap-x-10" id="monthly-report" role="tabpanel" aria-labelledby="monthly-report-tab">
                        <div class="col-span-6 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Unpaid Loan</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">45.501</div>
                                <div class="text-danger flex text-xs font-medium tooltip cursor-pointer ml-2">
                                    10% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Active Partner</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">10</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Paid Installment</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">$100.000</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Disbursement</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">$85.000</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Success Payment</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">2.900</div>
                                <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2">
                                    82% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Unpaid Loan</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">$72.000</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Posted Campaign</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">4.501</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Social Media</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">2</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <div class="text-slate-500">Net Margin</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">$72.000</div>
                                <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2">
                                    49% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
