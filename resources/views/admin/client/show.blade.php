@extends('layouts.admin')
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ $client->name }}</h2>
    </div>

    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-32 h-32 image-fit lg:mr-1">
                    <i class="border-2 rounded-full w-full h-full py-1" data-lucide="user"></i>
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{ $client->name }}</div>
                    <div class="text-slate-500">{{ $client->address }}</div>
                    <div class="text-slate-500">{{ $client->phone_number }}</div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r-0 border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="col-span-12 sm:col-span-4 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="shopping-cart" data-lucide="shopping-cart" class="lucide lucide-shopping-cart report-box__icon text-primary"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path></svg>
                                <div class="ml-auto"></div>
                            </div>
                            <div class="text-3xl font-medium leading-8 mt-6">{{ $client->sales->count() }}</div>
                            <div class="text-base text-slate-500 mt-1">Sales Total</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l-0 border-r-0 border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="col-span-12 sm:col-span-4 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-lucide="dollar-sign"></i>
                                <div class="ml-auto"></div>
                            </div>
                            <div class="text-3xl font-medium leading-8 mt-6">{{ $totalAmount }}</div>
                            <div class="text-base text-slate-500 mt-1">Total amount</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l-0 border-r-0 border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="col-span-12 sm:col-span-4 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">

                        <div class="box p-5">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="shopping-cart" data-lucide="shopping-cart" class="lucide lucide-shopping-cart report-box__icon text-primary"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path></svg>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-success tooltip cursor-pointer">
                                        33% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="text-3xl font-medium leading-8 mt-6">4.710</div>
                            <div class="text-base text-slate-500 mt-1">Item Sales</div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l-0 border-r-0 border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="col-span-12 sm:col-span-4 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="shopping-cart" data-lucide="shopping-cart" class="lucide lucide-shopping-cart report-box__icon text-primary"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path></svg>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-success tooltip cursor-pointer">
                                        33% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="text-3xl font-medium leading-8 mt-6"></div>
                            <div class="text-base text-slate-500 mt-1">Item Sales</div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>

    <div id="faq-accordion-2" class="accordion accordion-boxed py-5">
        @foreach($sales as $key =>$sale)
            <div class="accordion-item box" style="border: none;">
{{--                <div class="text-center">--}}
{{--                    <a href="javascript:;" class="tooltip btn btn-primary">Show Tooltip</a>--}}
{{--                </div>--}}
                <div id="faq-accordion-content-5" style="cursor: pointer;" title="Bosing malumotlarni ko`rasz!" class="tooltip accordion-header">
                    <div class="rounded-md accordion-button dark:bg-darkmode-600 collapsed"
                         data-tw-toggle="collapse"
                         data-tw-target="#faq-accordion-collapse-5" aria-expanded="true"
                         aria-controls="faq-accordion-collapse-5">
                        <div class="grid-cols-10 grid">
                            <div class="pl-5 flex items-center">{{ $key + 1 }}</div>
                            <div class="col-span-2 flex items-center">{{ $client->name ?? ''}}</div>
                            <div class="col-span-3 flex items-center"><i data-lucide="map-pin" class="px-1 h-full"></i>{{ $sale->client->address ?? '' }}</div>
                            <div class="flex items-center"><i data-lucide="banknote" class="px-1 h-full"></i>{{ $sale->amount ?? '' }}</div>
                            <div class="flex items-center justify-end">{{ $sale->created_at->format('d-m-Y') ?? '' }}</div>
                            <div class="col-span-2 table-report__action">
                                <div class="flex justify-end items-center">
                                    <!-- BEGIN: Modal Toggle -->
                                    <div class="flex mt-4 lg:mt-0">
                                        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-modal-preview-{{$sale->id}}"
                                           class="btn btn-outline-danger mr-3"><i data-lucide="trash-2" class="px-1 h-full"></i>Delete</a>
                                    </div>
                                    <!-- END: Modal Toggle -->
                                    <!-- BEGIN: Modal Content -->
                                    <div id="delete-modal-preview-{{$sale->id}}" class="modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="p-5 text-center">
                                                        <i data-lucide="x-circle"
                                                           class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                        <div class="text-3xl mt-5">Are you sure?</div>
                                                        <div class="text-slate-500 mt-2">
                                                            Do you really want to delete these records? <br>This process cannot be undone.
                                                        </div>
                                                    </div>
                                                    <div class="px-5 pb-8 text-center">
                                                        <form action="{{ route('admin.sales.delete', $sale->id) }}"
                                                              method="post">
                                                            <button type="button" data-tw-dismiss="modal"
                                                                    class="btn btn-outline-secondary w-24 mr-1">Cancel
                                                            </button>
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-outline-danger w-24">
                                                                Yes
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END: Modal Content -->
                                </div>
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
                                <tr class="">
                                    <th class="whitespace-nowrap uppercase">№</th>
                                    <th class="whitespace-nowrap uppercase">Product Name</th>
                                    <th class="whitespace-nowrap uppercase">price</th>
                                    <th class="whitespace-nowrap uppercase">count</th>
                                    <th class="whitespace-nowrap uppercase">overall</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($sale->products as $product) {
                                        $title = $product->product[0]->title;
                                        echo '<tr class="intro-x">

                            <td class="!py-3.5">' . $i . '</td>
                            <td class="!py-3.5">' . $title . '</td>
                            <td class="!py-3.5">' . $product->price . '</td>
                            <td class="!py-3.5">' . $product->count . '</td>
                            <td class="!py-3.5">' . $product->total . '</td>
                            </tr>';
                                        $i++;
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
@endsection
