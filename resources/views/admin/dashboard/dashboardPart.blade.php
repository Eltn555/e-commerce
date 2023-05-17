<div class="tab-content px-5 pb-5">
    <div class="tab-pane active grid grid-cols-12 gap-y-8 gap-x-10" id="weekly-report"
         role="tabpanel" aria-labelledby="weekly-report-tab">
        <div class="col-span-6 md:col-span-6 lg:col-span-4">
            <div class="text-slate-500">Profit</div>
            <div class="mt-1.5 flex items-center">
                <div class="text-base">{{ $profit }}</div>
                <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2"
                     title="{{ $profitPercentage }}% of total sale">
                    %{{ $profitPercentage }}<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 lg:col-span-4">
            <div class="text-slate-500">Active Partner</div>
            <div class="mt-1.5 flex items-center">
                <div class="text-base">{{ $activeClients }}
                </div>
                <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="user" data-lucide="user" class="lucide lucide-user w-8"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 lg:col-span-4">
            <div class="text-slate-500">Success Payment</div>
            <div class="mt-1.5 flex items-center">
                <div class="text-base">{{number_format($paid, 0, '.', ' ')}}</div>
                <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2"
                     title="{{number_format($paid, 0, '.', ' ')}} successfully paid">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 lg:col-span-4">
            <div class="text-slate-500">Sale cost</div>
            <div class="mt-1.5 flex items-center">
                <div class="text-base">{{number_format($cost, 0, '.', ' ')}}</div>
                <div class="text-warning flex text-xs font-medium tooltip cursor-pointer ml-2"
                     title="{{ 100-$profitPercentage }}% of total sale">
                    %{{ 100-$profitPercentage }}<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 lg:col-span-4">
            <div class="text-slate-500">Products sold</div>
            <div class="mt-1.5 flex items-center">
                <div class="text-base">{{ number_format($productSold, 0, '.', ' ') }}</div>
                <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.29 7 12 12 20.71 7"></polyline><line x1="12" y1="22" x2="12" y2="12"></line></svg>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 lg:col-span-4">
            <div class="text-slate-500">Unpaid Debts</div>
            <div class="mt-1.5 flex items-center">
                <div class="text-danger">{{ number_format($debts, 0, '.', ' ') }}</div>
                <div class="text-danger flex text-xs font-medium tooltip cursor-pointer ml-2"
                     title="{{number_format($debts, 0, '.', ' ')}} debts unpaid">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                </div>
            </div>
        </div>
    </div>
</div>
