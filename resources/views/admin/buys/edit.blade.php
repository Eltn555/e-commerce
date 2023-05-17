@extends('layouts.admin')
@section('title')
    | Sales
@endsection
@section('content')
    <form class="mt-3" action="{{route('admin.sales.store')}}" method="post">
        @csrf
        <div class="grid grid-cols-12">
            <h2 class="col-span-6 text-lg font-medium mt-10">Edit Sale</h2>
            <div class="col-span-4 p-5">
                <select class="tom-select w-full js-example-basic-single" name="client">
                    @foreach($clients as $client)
                        <option
                            value="{{ $client->id }}" {{ $client->id == $sale->client_id ? 'selected' : '' }}>{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="intro-y box mt-5">

            <div class="px-5 sm:px-16 overflow-y-scroll scrollbar-hidden" style="height: 300px">

                <table class="table max-h-full">
                    <thead class="relative ">
                    <tr>
                        <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">Product</th>
                        <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Count</th>
                        <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Price</th>
                        <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Total</th>
                        <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="body" class="overflow-y-scroll">
                    </tbody>
                </table>
            </div>
            <div class="px-5 sm:px-20 flex flex-col-reverse sm:flex-row">
                <div class="text-center sm:text-left mt-10 sm:mt-0">
                    <div class="text-lg text-primary font-medium mt-2"></div>
                </div>
                <div class="text-center sm:text-right sm:ml-auto">
                    <div id="total" class="text-xl text-primary font-medium mt-2">
                        Total
                    </div>
                </div>
            </div>
            <div class="p-5 grid grid-cols-12">
                <div class="col-span-2 sm:col-span-3 relative">
                    <div class="relative w-full">

                        <select class="tom-select w-full js-example-basic-single" id="product_name">
                            @foreach($products as $client)
                                <option value="{{ $client->id }}">{{ $client->title }}</option>
                            @endforeach
                        </select>

                        {{--<input list="products" id="product_name" type="text" class="inputs form-control search__input"
                               placeholder="Product Name" autocomplete="off" data-tooltip-target="tooltip-default">
                        <datalist id="products">
                            @foreach($products as $product)
                                <option value="{{$product->title}}">
                            @endforeach
                        </datalist>

                        <div id="btn"
                             class="text-danger absolute top-0 right-0 mt-1 p-1 text-gray-600 cursor-pointer hidden">
                            <i data-lucide="x-circle" height="20px"></i>
                        </div>--}}
                    </div>
                    <div class="absolute hidden dark:bg-darkmode-400/70 bg-slate-200 w-52 ajax_result"
                         style="padding: 0"></div>
                </div>
                <div class="col-span-2 sm:col-span-3 relative">
                    <input id="product_price" onkeyup="count()" type="number" class="disable-it form-control"
                           placeholder="Price">
                </div>
                <div class="col-span-2 sm:col-span-3 relative">
                    <input id="product_count" onkeyup="count()" type="number" class="disable-it form-control"
                           placeholder="Count">
                </div>
                <div class="col-span-2 sm:col-span-3 relative">
                    <input id="product_amount" type="number" class="form-control floating-label" placeholder="Amount"
                           disabled>
                </div>
            </div>
            <div class="text-right p-5">
                <a class="btn btn-secondary mt-5 w-24 mr-2" data-tw-dismiss="modal">Cancel</a>
                <a onclick="add()" class="btn btn-primary"> ADD + </a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div>

@endsection

@section('scripts')
    <script>
        function count() {
            $('#product_amount').val($('#product_count').val() * $('#product_price').val())
        }

        function total() {
            let amounts = $('.amounts')
            let total = 0;
            for (let i = 0; i < amounts.length; i++) {
                total = total + parseInt(amounts[i].value)
            }
            $('#total').text(total)
            $('#total').append('<input type="hidden" name="total" value="' + total + '">')
        }

        function del(id) {
            $('#tableroad-' + id).remove()
            total()
        }

        function add() {
            let body = $('#body')
            let cltr = $('.tableroad')
            body.append('<tr class="tableroad" id="tableroad-' + cltr.length + '"></tr>')
            let tr = $('#tableroad-' + cltr.length)
            tr.append('<td class="border-b dark:border-darkmode-400"> <div class="font-medium whitespace-nowrap">' +
                $('#product_name').children("option").filter(":selected").text() + '</div><input type="hidden" name="product[]" value="' + $('#product_name').val() + '">')
            $('#product_name').val('')
            tr.append('<td class="border-b text-right dark:border-darkmode-400">' +
                $('#product_price').val() + '<input type="hidden"  name="price[]" value="' + $('#product_price').val() + '">')
            $('#product_price').val('')
            tr.append('<td class="border-b text-right dark:border-darkmode-400">' +
                $('#product_count').val() + '<input type="hidden" name="count[]" value="' + $('#product_count').val() + '">')
            $('#product_count').val('')
            tr.append('<td class="text-right border-b dark:border-darkmode-400 w-32 font-medium">' +
                $('#product_amount').val() + '<input class="amounts" type="hidden" name="amount[]" value="' + $('#product_amount').val() + '">')
            $('#product_amount').val('')
            tr.append(
                `<td class="text-right border-b dark:border-darkmode-400"><a class="btn btn-outline-danger flex items-center text-danger" onclick="del(` + cltr.length + `)" data-tw-toggle="modal">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2"
            class="lucide lucide-trash-2 w-4 h-4 mr-1"> <polyline points="3 6 5 6 21 6"></polyline> <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path> <line x1="10" y1="11" x2="10" y2="17"></line> <line x1="14" y1="11" x2="14" y2="17"></line> </svg>
                Delete</a>`)
            total()
            $('#product_name').children("option").filter(":selected").remove()

        }

    </script>
@endsection
