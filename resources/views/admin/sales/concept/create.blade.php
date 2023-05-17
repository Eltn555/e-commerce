@extends('layouts.admin')
@section('content')

    {{-- HEADER --}}
    <div class="grid grid-cols-12 mt-10 mb-10">
        <h2 class="col-span-3 text-lg font-medium pl-10">Adding Sale</h2>
        <ul class="nav nav-pills col-span-4 border border-slate-300 dark:border-darkmode-300 border-dashed rounded-md p-1"
            role="tablist">
            <li id="optom-tab" class="nav-item flex-1" role="presentation">
                <button onclick="on()" class="nav-link w-full py-1.5 px-2 active" data-tw-toggle="pill"
                        data-tw-target="#optom" type="button" role="tab"
                        aria-controls="optom" aria-selected="true" control-id="ControlID-3">Optom
                </button>
            </li>
            <li id="donaga-tab" class="nav-item flex-1" role="presentation">
                <button onclick="off()" class="nav-link w-full py-1.5 px-2" data-tw-toggle="pill"
                        data-tw-target="#donaga" type="button" role="tab"
                        aria-selected="false" control-id="ControlID-4">Donaga
                </button>
            </li>
        </ul>
        <div id="clients" class="col-span-4 pl-10">
            <select class="tom-select w-full js-example-basic-single" name="client">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- HEADER END --}}

    <div class="tab-content intro-y box mx-5 px-2 pb-5">
        <div class="tab-pane active col-12 mb-10 pb-20" id="optom" role="tabpanel" aria-labelledby="optom-tab">
            <div class="col">
                <form action="{{route('store.test')}}" method="post">
                    @csrf
                    <div class="intro-y mt-5">
                        <div class="px-5 overflow-y-scroll scrollbar-hidden" style="height: 300px">
                            <table class="table max-h-full">
                                <thead class="relative">
                                <tr>
                                    <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">Product</th>
                                    <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">
                                        Price
                                    </th>
                                    <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">
                                        Count
                                    </th>
                                    <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">
                                        Total
                                    </th>
                                    <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="body" class="overflow-y-scroll"></tbody>
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
                                    <select class="tom-select w-full js-example-basic-single" id="product_name"
                                            required>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="absolute hidden dark:bg-darkmode-400/70 bg-slate-200 w-52 ajax_result"
                                     style="padding: 0"></div>
                            </div>
                            <div class="col-span-2 sm:col-span-3 relative">
                                <input id="product_price" onkeyup="count()" type="number"
                                       class="disable-it form-control"
                                       placeholder="Price" required>
                            </div>
                            <div class="col-span-2 sm:col-span-3 relative">
                                <input id="product_count" onkeyup="count()" type="number"
                                       class="disable-it form-control"
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
        <div class="tab-pane mb-10" id="donaga" role="tabpanel" aria-labelledby="donaga-tab">
            <form  action="{{route('admin.sales.store')}}" method="post">
                @csrf
                <div class="grid grid-cols-2" style="height: 60vh">
                    <div class="grid-cols-1">
                        <div class="px-5 overflow-y-scroll scrollbar-hidden"  style="height: 60vh">
                            <table class="table">
                                <thead class="relative">
                                <tr>
                                    <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">Product</th>
                                    <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">
                                        Price
                                    </th>
                                    <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">
                                        Count
                                    </th>
                                    <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">
                                        Total
                                    </th>
                                    <th class="border-b-2 dark:border-darkmode-400 text-center whitespace-nowrap">
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="body-donaga"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="grid-cols-1">
                        <div class="px-5 overflow-y-scroll scrollbar-hidden" style="height: 60vh">
                            <div class="intro-y col-span-12 overflow-auto">
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
                                        <tr onclick="donagaAdd({{$product}})" class="intro-x">
                                            <td class="!py-3.5">
                                                <div class="flex items-center">
                                                    <div class="w-9 h-9 image-fit zoom-in">
                                                        <img class="rounded-lg border-white shadow-md"
                                                             src="{{asset('storage/'.$product->image)}}"></div>
                                                    <div class="ml-4">
                                                        <a class="font-medium whitespace-nowrap">{{ $product->title }}</a>
                                                        <div
                                                            class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $product->description }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a class="flex items-center justify-center underline decoration-dotted">{{ $product->stock }}</a>
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
                <div class="grid grid-cols-2">
                    <div class="text-left p-5">
                            <label class="text-primary sm:text-right font-medium mt-2">Paid: </label>
                            <input id="donaga-paid" name="paid" class="text-center border-b-2 col-sm-1" value="0">
                            <p class="text-primary d-inline-block font-medium mt-2">
                                Total: <span id="donaga-total" class="text-center text-primary font-medium mt-2">0</span>
                            </p>
                    </div>
                    <input type="hidden" name="client" value="4">
                    <div class="text-right p-5">
                        <a class="btn btn-secondary mt-5 w-24 mr-2" data-tw-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
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

        function delSingle(id) {
            let body = $('#body-donaga')
            body.children('#product-' + id).remove()
        }

        var cltr = [0];

        function add() {
            if ($('#product_name').children("option").filter(":selected").text() == "" || $('#product_price').val() == 0 || $('#product_count').val() == 0) {
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

        function on() {
            $('#clients').css('display', 'block')
        }

        function off() {
            $('#clients').css('display', 'none')
        }

        function donagaAdd(id) {
            let table = $('#body-donaga')
            if (table.children('#product-' + id.id).length !== 0) {
                let count = $('#product-' + id.id + '-count')
                count.children('span').text(parseInt(count.children('span').text())+1)
                count.children('input').val(parseInt(count.children('input').val())+1)
                let amount = $('#product-' + id.id + '-amount')
                    amount.children('span').text(count.children('input').val() * $('#product-' + id.id + '-price').children('input').val())
                    amount.children('input').val(count.children('input').val() * $('#product-' + id.id + '-price').children('input').val())
            } else {
                table.append(`<tr class="tableroad" id="product-` + id.id + `"></tr>`)
                let element = $('#product-' + id.id)
                element.append(`<td id="product-` + id.id + `-title" class="border-b dark:border-darkmode-400"><div class="font-medium whitespace-nowrap">` + id.title + `</div><input type="hidden" name="product[]" value="` + id.id + `"></td>`)
                element.append(`<td id="product-` + id.id + `-price" class="border-b text-right dark:border-darkmode-400">` + id.sell + `<input type="hidden" name="price[]" value="` + id.sell + `"></td>`)
                element.append(`<td id="product-` + id.id + `-count" class="border-b text-right dark:border-darkmode-400"><span>1</span><input class="counts" type="hidden" name="count[]" value="1"></td>`)
                element.append(`<td id="product-` + id.id + `-amount" class="text-right border-b dark:border-darkmode-400 w-32 font-medium"><span>` +
                    (element.children('#product-' + id.id + '-count').children('input').val() * element.children('#product-' + id.id + '-price').children('input').val())
                    + `</span><input id="amount" class="amounts" type="hidden" name="amount[]" value="` +
                    (element.children('#product-' + id.id + '-count').children('input').val() * element.children('#product-' + id.id + '-price').children('input').val())
                    + `"></td>`)
                element.append(`<td id="product-` + id.id + `-actions" class="text-right border-b dark:border-darkmode-400"><a class="btn btn-outline-danger flex items-center text-danger" onclick="delSingle(` + id.id + `)" data-tw-toggle="modal">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"> <polyline points="3 6 5 6 21 6"></polyline> <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path> <line x1="10" y1="11" x2="10" y2="17"></line> <line x1="14" y1="11" x2="14" y2="17"></line> </svg>
                Delete</a></td>`)
            }
            donagaTotal()
        }

        function donagaTotal() {
            let amounts = $('.amounts')
            let total = 0;
            let elements = $('#body-donaga').children();
            console.log(elements.length)
            for(let i = 0; i<elements.length; i++){
                total += parseFloat(elements.find('#' + elements[i].id + '-amount').children('span').text())
                console.log(total)
            }

            $('#donaga-total').text(total.toLocaleString('fr-FR'))
            $('#donaga-paid').val(total)
            $('#donaga-total').append('<input type="hidden" name="total" value="' + total + '">')
        }

    </script>
@endsection
