    <div class="accordion-item report-box intro-x" style="border: none; margin-top: 35px!important;  padding: 0!important;">
        <div id="faq-accordion-content-5" class="accordion-header box">
            <div class="accordion-button collapsed"
                 data-tw-toggle="collapse"
                 data-tw-target="#faq-accordion-collapse-5" aria-expanded="true"
                 aria-controls="faq-accordion-collapse-5">
                <div class="grid-cols-12 grid">
                    <div class="col-span-2 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="user" data-lucide="user" class="lucide lucide-user w-8"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        {{ $clien['name'] ?? ''}}
                    </div>
                    <div class="col-span-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="map-pin" data-lucide="map-pin" class="lucide lucide-map-pin w-8"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        {{ $clien['address'] ?? '' }}
                    </div>
                    <div class="flex col-span-2 items-center justify-start text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-circle" data-lucide="check-circle" class="lucide lucide-check-circle w-8"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <?php $paid = $clien['overall_amount'] - $clien['overall_debt'];
                            echo number_format($paid, 0, '.', ' ')
                        ?>
                    </div>
                    @if($clien['overall_debt'] != 0)
                        <div class="flex col-span-2 items-center justify-start text-danger ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            {{ number_format($clien['overall_debt'], 0, '.', ' ') }}
                        </div>
                    @else
                        <div class="flex col-span-2 items-center justify-start text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-circle" data-lucide="check-circle" class="lucide lucide-check-circle w-8"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            PAID
                        </div>
                    @endif
                    <div class="flex col-span-2 items-center justify-start text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="banknote" data-lucide="banknote" class="lucide lucide-banknote w-8"><rect x="2" y="6" width="20" height="12" rx="2"></rect><circle cx="12" cy="12" r="2"></circle><path d="M6 12h.01M18 12h.01"></path></svg>
                        {{ number_format($clien['overall_amount'], 0, '.', ' ') ?? '' }}
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
                                   class="disable-it form-control" placeholder="Price" value="'.$sale->debt.'"></td>
                            <td class="!py-3.5"><input id="price-input" type="number"
                                   class="disable-it form-control" placeholder="Price" value="'.$sale->amount - $sale->debt.'"></td>
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
