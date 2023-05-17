@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-12">
        <h2 class="col-span-6 text-lg font-medium mt-10">Sale {{ $sale->id }}</h2>
        <div class="col-span-4 p-5">
        </div>
    </div>

    <div class="intro-y box mt-5">
        <div class="px-5 sm:px-16 overflow-y-scroll scrollbar-hidden border-2" style="height: 300px">
            <table class="table max-h-full">
                <thead class="relative ">
                <tr>
                    <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">Product</th>
                    <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Count</th>
                    <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Price</th>
                    <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Total</th>
                </tr>
                </thead>
                <tbody id="body" class="overflow-y-scroll">
                @foreach($sale->products as $product)
                    <tr class="tableroad" id="tableroad-0">
                        <td class="border-b dark:border-darkmode-400">
                            <div class="font-medium whitespace-nowrap">{{ $product->product[0]->title }}</div>
                        </td>
                        <td class="border-b text-center dark:border-darkmode-400">
                            {{ number_format($product->count, 0, '.', ' ') }}
                        </td>
                        <td class="border-b text-center dark:border-darkmode-400">
                            {{ number_format($product->price, 0, '.', ' ') }}
                        </td>
                        <td class="text-center border-b dark:border-darkmode-400 w-32 font-medium">
                            {{ number_format($product->total, 0, '.', ' ') }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </tbody>
            </table>
        </div>
        <div class="flex flex-col lg:flex-row px-5 sm:px-20 pt-10 pb-10">
            <div>
                <div class="text-base text-slate-500">Client Details</div>
                <div class="text-lg font-medium text-primary mt-2">{{ $sale->client->name }}</div>
            </div>
            <div class="lg:text-right  lg:mt-0 lg:ml-auto">
                <div class="text-base text-slate-500">Sale Amount</div>
                <div class="text-lg font-medium text-primary mt-2">{{ number_format($sale->amount, 0, '.', ' ') }}</div>
            </div>
        </div>
    </div>
@endsection
