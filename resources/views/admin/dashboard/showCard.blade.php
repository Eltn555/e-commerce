    <!-- BEGIN: General Report -->
    <div class="col-span-12 xl:col-span-9 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">General Report</h2>
            <a href="" class="ml-auto text-primary truncate">Show More</a>
        </div>
        <div class="report-box-2 intro-y mt-5">
            <div class="box grid grid-cols-12">
                <div class="col-span-12 lg:col-span-4 px-8 py-12 flex flex-col justify-center">
                    <i data-lucide="pie-chart" class="w-10 h-10 text-pending"></i>
                    <div class="justify-start flex items-center text-slate-600 dark:text-slate-300 mt-12">
                        Total sold amount
                        <i data-lucide="alert-circle" class="tooltip w-4 h-4 ml-1.5"
                           title="Total value of your sales: ${{ number_format($sales->pluck('amount')->sum(), 0, '.', ' ') }}"></i>
                    </div>
                    <div class="flex items-center justify-start mt-4">
                        <div class="relative text-2xl font-medium pl-3 ml-0.5">
                            <span
                                class="absolute text-xl font-medium top-0 left-0 -ml-0.5">$</span> {{ number_format($sales->pluck('amount')->sum(), 0, '.', ' ')  }}
                        </div>
                        <a class="text-slate-500 ml-4" href="">
                            <i data-lucide="refresh-ccw" class="w-4 h-4"></i>
                        </a>
                    </div>
                    <div class="mt-4 text-slate-500 text-xs">Updated just now</div>

                </div>
                <div class="col-span-12 lg:col-span-8 p-8 border-t lg:border-t-0 lg:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
                        <ul class="nav nav-pills col-span-12 border border-slate-300 dark:border-darkmode-300 border-dashed rounded-md p-1 mb-8" role="tablist">
                            <li id="" class="nav-item flex-1" role="presentation">
                                <button
                                    name="dataForm"
                                    class="dataForm nav-link w-full p-2 {{($active == 'today') ? 'active' : ''}}"
                                    value="Today"
                                >Today</button>
                            </li>
                            <li id="" class="nav-item flex-1" role="presentation">
                                <button
                                    name="dataForm"
                                    class="dataForm nav-link w-full p-2 {{($active == 'week') ? 'active' : ''}}"
                                    value="Weekly"
                                >Weekly</button>
                            </li>
                            <li id="" class="nav-item flex-1" role="presentation">
                                <button
                                    name=""
                                    class="dataForm nav-link w-full p-2 {{($active == 'month') ? 'active' : ''}}"
                                    value="Monthly"
                                >Monthly</button>
                            </li>
                            <li id="date_report" class="nav-item flex-1" role="presentation">
                                <input type="text" class="datepicker form-control sm:w-56 box pl-10"
                                       value="{{ $calendar }}">
                            </li>
                        </ul>
                    <div class="tab-content px-5 pb-5">
                        <div class="tab-pane active grid grid-cols-12 gap-y-8 gap-x-10" id="weekly-report"
                             role="tabpanel" aria-labelledby="weekly-report-tab">
                            <div class="col-span-6 sm:col-span-6 md:col-span-4">
                                <div class="text-slate-500">Profit</div>
                                <div class="mt-1.5 flex items-center">
                                    <div class="text-base">${{ $profit }}</div>
                                    <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2"
                                         title="{{ $profitPercentage }}% of total sale">
                                        %{{ $profitPercentage }}<i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-4">
                                <div class="text-slate-500">Active Partner</div>
                                <div class="mt-1.5 flex items-center">
                                    <div class="text-base">{{ $activeClients }}</div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-4">
                                <div class="text-slate-500">Products sold</div>
                                <div class="mt-1.5 flex items-center">
                                    <div class="text-base">{{ number_format($productSold, 0, '.', ' ') }}</div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-4">
                                <div class="text-slate-500">Sale cost</div>
                                <div class="mt-1.5 flex items-center">
                                    <div class="text-base">${{number_format($cost, 0, '.', ' ')}}</div>
                                    <div class="text-warning flex text-xs font-medium tooltip cursor-pointer ml-2"
                                         title="{{ 100-$profitPercentage }}% of total sale">
                                        %{{ 100-$profitPercentage }}<i data-lucide="chevron-down" class="w-4 h-4 ml-0.5"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-4">
                                <div class="text-slate-500">Success Payment</div>
                                <div class="mt-1.5 flex items-center">
                                    <div class="text-base">2.500</div>
                                    <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2"
                                         title="52% Higher than last month">
                                        52% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-4">
                                <div class="text-slate-500">Unpaid Debts</div>
                                <div class="mt-1.5 flex items-center">
                                    <div class="text-danger">{{ number_format($debts, 0, '.', ' ') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="faq-accordion-2" class="accordion accordion-boxed py-5">


            @foreach($client as $clien)
                <div class="accordion-item report-box intro-x" style="border: none; margin-top: 35px!important;  padding: 0!important;">
                    <div id="faq-accordion-content-5" class="accordion-header box">
                        <div class="accordion-button collapsed"
                             data-tw-toggle="collapse"
                             data-tw-target="#faq-accordion-collapse-5" aria-expanded="true"
                             aria-controls="faq-accordion-collapse-5">
                            <div class="grid-cols-12 grid">
                                <div class="col-span-2 flex items-center pl-3">
                                    <i data-lucide="user" class="w-8"></i> {{ $clien['name'] ?? ''}}
                                </div>
                                <div class="col-span-4 flex items-center">
                                    <i data-lucide="map-pin" class="w-8"></i>{{ $clien['address'] ?? '' }}
                                </div>
                                <div class="flex col-span-2 items-center justify-center text-warning">
                                    <i data-lucide="banknote" class="w-8"></i>{{ $clien['overall_amount'] ?? '' }}
                                </div>
                                <div class="flex col-span-2 items-center justify-center {{ ($clien['overall_debt'] != 0) ? ' text-danger ">' : ' text-success'}}">
                                    <i data-lucide='axe' class='w-8'></i>
                                    {{ ($clien['overall_debt'] != 0) ? $clien['overall_debt'] : 'PAID'}}
                                </div>
                                <div class="flex col-span-2 items-center justify-center text-primary">
                                    <i data-lucide='check-circle' class='w-8'></i>
                                    {{ $clien['overall_amount'] - $clien['overall_debt'] ?? '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="faq-accordion-collapse-5" class="accordion-collapse collapse" style="display: none;"
                         aria-labelledby="faq-accordion-content-5" data-tw-parent="#faq-accordion-2">
                        <div class="accordion-body text-slate-600 dark:text-slate-500 leading-relaxed">
                            <div class="overflow-x-auto px-10">
                                <table class="table table-report -mt-2 px-10">
                                    <thead>
                                    <tr class="intro-x">
                                        <th class="whitespace-nowrap uppercase">№</th>
                                        <th class="whitespace-nowrap uppercase">debt</th>
                                        <th class="whitespace-nowrap uppercase">paid</th>
                                        <th class="whitespace-nowrap uppercase">price</th>
                                        <th class="whitespace-nowrap uppercase">date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($sales as $sale) {
                                            if ($sale->client_id == $clien['id']){
                                                $product_list = '';
                                                foreach ($sale->products as $product){
                                                    $product_list .= ' __'.$product->product[0]->title.':'.$product->price.'x'.$product->count.'='.$product->total."__ ";
                                                }
                                                echo '<tr class="intro-x">

                            <td class="!py-3.5">' . $sale->id . '</td>
                            <td class="!py-3.5"><input id="price-input" type="number"
                                   class="disable-it form-control" placeholder="Price" value="'.$sale->finance->debt.'"></td>
                            <td class="!py-3.5"><input id="price-input" type="number"
                                   class="disable-it form-control" placeholder="Price" value="'.$sale->finance->given.'"></td>
                            <td class="!py-3.5">' . $sale->amount . '</td>
                            <td class="!py-0">' . $sale->created_at . '</td>
                            <td class="!py-0"><i data-lucide="alert-circle" class="tooltip w-4 h-4 ml-1.5"
                           title="'.$product_list.'"></i></td>
                            </tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- END: General Report -->
