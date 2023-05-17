@extends('layouts.admin')
@section('content')
    <div class="col-span-12 lg:col-span-8 p-8 border-t lg:border-t-0 lg:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
        <ul class="nav nav-pills w-60 border border-slate-300 dark:border-darkmode-300 border-dashed rounded-md mx-auto p-1 mb-8" role="tablist">
            <li id="weekly-report-tab" class="nav-item flex-1" role="presentation">
                <button class="nav-link w-full py-1.5 px-2 active" data-tw-toggle="pill" data-tw-target="#weekly-report" type="button" role="tab" aria-controls="weekly-report" aria-selected="true" control-id="ControlID-3">
                    Optom
                </button>
            </li>
            <li id="monthly-report-tab" class="nav-item flex-1" role="presentation">
                <button class="nav-link w-full py-1.5 px-2" data-tw-toggle="pill" data-tw-target="#monthly-report" type="button" role="tab" aria-selected="false" control-id="ControlID-4">
                    Donaga
                </button>
            </li>
            <li id="test-tab" class="nav-item flex-1" role="presentation">
                <button class="nav-link w-full py-1.5 px-2" data-tw-toggle="pill" data-tw-target="#test" type="button" role="tab" aria-selected="false" control-id="ControlID-4">
                    TeST
                </button>
            </li>
        </ul>
        <div class="tab-content px-5 pb-5">
            <div class="tab-pane active grid grid-cols-12 gap-y-8 gap-x-10" id="weekly-report" role="tabpanel" aria-labelledby="weekly-report-tab">
                <div class="col-span-12 sm:col-span-12 md:col-span-12">
                    <form class="mt-3" action="{{route('admin.sales.store')}}" method="post">
                        @csrf
                        <div class="grid grid-cols-12">
                            <h2 class="col-span-6 text-lg font-medium mt-10">Adding Sale</h2>
                            <div class="col-span-4 p-5">
                                <select class="tom-select w-full js-example-basic-single" name="client">
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
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
                                        <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Price</th>
                                        <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Count</th>
                                        <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Total</th>
                                        <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="body" class="overflow-y-scroll">
                                    </tbody>
                                </table>
                            </div>
                            <div class="px-5 sm:px-20 flex flex-col-reverse sm:flex-row">
                                <div class="text-center sm:text-right sm:ml-auto">
                                    <label class="text-primary sm:text-right font-medium mt-2">Paid: </label>
                                    <input id="paid" name="paid" class="text-center border-b-2 col-sm-1" value="0">
                                    <p class="text-primary d-inline-block font-medium mt-2">
                                        Total: <span id="total" class="text-center text-primary font-medium mt-2">0</span>
                                    </p>
                                </div>
                            </div>
                            <div class="p-5 grid grid-cols-12">
                                <div class="col-span-2 sm:col-span-3 relative">
                                    <div class="relative w-full">
                                        <select class="tom-select w-full js-example-basic-single" id="product_name" required>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="absolute hidden dark:bg-darkmode-400/70 bg-slate-200 w-52 ajax_result"
                                         style="padding: 0"></div>
                                </div>
                                <div class="col-span-2 sm:col-span-3 relative">
                                    <input id="product_price" onkeyup="count()" type="number" class="disable-it form-control"
                                           placeholder="Price" required>
                                </div>
                                <div class="col-span-2 sm:col-span-3 relative">
                                    <input id="product_count" onkeyup="count()" type="number" class="disable-it form-control"
                                           placeholder="Count" required>
                                </div>
                                <div class="test col-span-2 sm:col-span-3 relative tooltip" data-trigger="click"
                                     title="Total value of your sales: $0">
                                    <input id="product_amount" type="number"
                                           class="form-control floating-label" placeholder="Amount" disabled>
                                </div>
                            </div>
                            <div class="text-right p-5">
                                <a class="btn btn-secondary mt-5 w-24 mr-2" data-tw-dismiss="modal">Cancel</a>
                                <a onclick="add()" class="btn btn-primary">Add</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane grid grid-cols-12 gap-y-8 gap-x-10" id="monthly-report" role="tabpanel" aria-labelledby="monthly-report-tab">
                <div class="col-span-6 sm:col-span-6 md:col-span-6">
                    <div class="overflow-y-scroll scrollbar-hidden" style="max-height: 70vh">
                        <table class="table max-h-full">
                            <thead class="relative ">
                            <tr>
                                <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">Product</th>
                                <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Price</th>
                                <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Count</th>
                                <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Total</th>
                                <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="body" class="overflow-y-scroll">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-span-6 sm:col-span-6 md:col-span-6 overflow-y-scroll scrollbar-hidden" style="max-height: 70vh">
                    <div class="col-6">

                        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
                            <table class="table table-report -mt-2">
                                <thead>
                                <tr>
                                    <th class="whitespace-nowrap">PRODUCT</th>
                                    <th class="text-center whitespace-nowrap">STOCK</th>
                                    <th class="text-center whitespace-nowrap">PRICE</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $key => $product)
                                <tr class="intro-x">
                                    <td class="!py-3.5">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="rounded-lg border-white shadow-md" src="https://enigma.left4code.com/dist/images/profile-15.jpg">
                                            </div>
                                            <div class="ml-4">
                                                <a href="" class="font-medium whitespace-nowrap">{{ $product->title }}</a>
                                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $product->description }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a class="flex items-center justify-center underline decoration-dotted" href="javascript:;">{{ $product->stock }}</a>
                                    </td>
                                    <td class="text-center capitalize">{{ $product->sell }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane grid grid-cols-12 gap-y-8 gap-x-10" id="test" role="tabpanel" aria-labelledby="monthly-report-tab">TEST</div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        function count() {
            $('#product_amount').val($('#product_count').val() * $('#product_price').val())
        }

        function total() {
            let amounts = $('.amounts')
            let total = 0;
            for (let i = 0; i < amounts.length; i++) {
                total = total + parseInt(amounts[i].value)
            }
            $('#total').text(total.toLocaleString('fr-FR'))
            $('#paid').val(total)
            $('#total').append('<input type="hidden" name="total" value="' + total + '">')
        }

        function del(id) {
            $('#tableroad-' + id).remove()
            total()
        }

        var cltr = [0];
        function add() {
            if($('#product_name').children("option").filter(":selected").text() == "" || $('#product_price').val() == 0 || $('#product_count').val() == 0){
                return
            }
            $('#body').append(`<tr class="tableroad" id="tableroad-` + cltr.length + `"></tr>`)
            let tr = $('#tableroad-' + cltr.length)
            tr.append(
                `<td class="border-b dark:border-darkmode-400"> <div class="font-medium whitespace-nowrap">` + $('#product_name').children("option").filter(":selected").text()
                + `</div><input type="hidden" name="product[]" value="` + $('#product_name').val() + `">`)
            $('#product_name').val('')
            tr.append('<td class="border-b text-right dark:border-darkmode-400">' +
                $('#product_price').val() + '<input type="hidden" name="price[]" value="' + $('#product_price').val() + '">')
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
            cltr.push('tableroad-' + cltr.length)
            console.log(cltr)
        }

        function changes() {
            let test = $('.test').attr('aria-decribedby', 'tippy-1')
        }

        let products = '<?php echo $products; ?>';
        let product = JSON.parse(products);
        console.log(product)
    </script>
@endsection
