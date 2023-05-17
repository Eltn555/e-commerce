@extends('layouts.admin')
@section('title')
    | Category
@endsection
@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">Categories</h2>
    <!-- BEGIN: Modal Toggle -->
    @include('admin.category.create')
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="lg:flex intro-y">
                <div class="relative">
                    <input id="search" type="text" class="form-control py-3 px-4 w-full lg:w-64 box pr-10" placeholder="Search item...">
                    <i data-lucide="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500"></i>
                </div>
            </div>
            <div id="Content" class="grid grid-cols-12 gap-5 mt-5">
                @foreach($categories as $key => $category)
                    @if($category->id == $selected->id)
                        <div class="col-span-12 sm:col-span-3 2xl:col-span-3 box bg-primary p-5 cursor-pointer zoom-in">
                            <div class="font-medium text-base text-white">{{ $category->title }}</div>
                            <div
                                class="text-white text-opacity-80 dark:text-slate-500">{{ count($category->products) }} {{ count($category->products) == 1 ? 'Item' : 'Items'}}</div>
                            <div class="w-10 h-10 flex items-center justify-center absolute top-0 right-0 text-xs text-white rounded-full  font-medium -mt-1 -mr-1">
                                @include('admin.category.edit')
                            </div>
                            <div class="w-10 h-10 flex items-center justify-center absolute right-0 text-xs text-white rounded-full font-medium" style="top: 2rem;">
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-modal-category-{{$category->id}}"
                                   class="text-danger"><i data-lucide="trash-2"></i></a>
                            </div>
                            <div class="flex justify-end items-center absolute right-0 p-3">
                                <!-- BEGIN: Modal Content -->
                                <div id="delete-modal-category-{{$category->id}}" class="modal" tabindex="-1" aria-hidden="true">
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
                                                    <form action="{{ route('admin.category.deletecategoryproduct', $category->id) }}"
                                                          method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger w-48">
                                                            Delete with products
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.category.delete', $category->id) }}"
                                                          method="post"
                                                          class="mt-1.5">
                                                        <button type="button" data-tw-dismiss="modal"
                                                                class="btn btn-outline-secondary w-24 mr-0.5">Cancel
                                                        </button>
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger w-24">
                                                            Delete
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
                    @else
                        <a href="/admin/categories/{{ $category->id }}"
                           class="col-span-12 sm:col-span-3 2xl:col-span-3 box p-5 cursor-pointer zoom-in">
                            <div class="font-medium text-base">{{ $category->title }}</div>
                            <div
                                class="text-slate-500">{{ count($category->products) }} {{ count($category->products) == 1 ? 'Item' : 'Items'}}</div>
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="grid grid-cols-12 gap-5 overflow-scroll mt-5 pt-5 border-t">
                @foreach($selected->products as $product)
                    <div class="intro-y col-span-12 md:col-span-6  lg:col-span-4 xl:col-span-3">
                        <div class="box">
                            <div class="p-5">
                                <div class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                                    <img alt="Midone - HTML Admin Template" class="rounded-md"
                                         src="{{asset('storage/'.$product->image)}}">
                                    <span
                                        class="absolute top-0 bg-pending/80 text-white text-xs m-5 px-2 py-1 rounded z-10">Featured</span>
                                    <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                                        <a href=""
                                           class="block font-medium text-base">{{ $product->title ?? '' }}</a>
                                        <span
                                            class="text-white/90 text-xs mt-3">{{ $product->description ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="text-slate-600 dark:text-slate-500 mt-5">
                                    <div class="flex items-center">
                                        <i data-lucide="link" class="mr-1"></i>
                                        Buy: {{ $product->buy ?? '' }}
                                        Sell: {{ $product->sell ?? '' }}
                                    </div>
                                    <div class="flex items-center mt-2">
                                        <i data-lucide="layers" class="mr-1"></i>
                                        Remaining Stock: {{ $product->stock ?? '' }}
                                    </div>
                                    <div class="flex items-center mt-2">
                                        <i data-lucide="check-square" class="mr-1"></i>
                                        Status: Active
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                                <a class="flex items-center text-primary mr-auto" {{--href="{{ route('admin.products.show', $product->id) }}"--}}>
                                    <i data-lucide="eye" class="mr-1"></i>
                                    Preview
                                </a>
                                @include('admin.category.productedit')
                                <!-- BEGIN: Modal Toggle -->
                                <a href="javascript:;" data-tw-toggle="modal"
                                   data-tw-target="#delete-modal-preview-{{$product->id}}"
                                   class="flex items-center text-danger">
                                    <i data-lucide="trash-2" class="px-1 text-danger"></i>
                                    Delete</a>
                                <!-- END: Modal Toggle -->
                                <!-- BEGIN: Modal Content -->
                                <div id="delete-modal-preview-{{$product->id}}" class="modal" tabindex="-1"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="p-5 text-center">
                                                    <i data-lucide="x-circle"
                                                       class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                    <div class="text-3xl mt-5">Are you sure?</div>
                                                    <div class="text-slate-500 mt-2">Do you really want to delete these
                                                        records? <br>This process cannot be undone.
                                                    </div>
                                                </div>
                                                <div class="px-5 pb-8 text-center">
                                                    <form action="{{ route('admin.category.productdelete', $product->id) }}"
                                                          method="post">
                                                        <button type="button" data-tw-dismiss="modal"
                                                                class="btn btn-outline-secondary w-24 mr-1">Cancel
                                                        </button>
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger w-24">Yes
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
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $('#vertical-form-1').on('keyup', function(){
           value = $(this).val();

           $.ajax({
               type: 'get',
               url: '{{URL::to('/admin/categories/add')}}',
               data: {'search':value},
               success:function (data){
                   if(data === 'Not Found'){
                       $('#Content2').html('');
                       $('#addbtn').prop("disabled",false);
                   } else {
                       $('#Content2').html('Category with this name is already exists');
                       $('#addbtn').prop("disabled", true);
                   }
               },
           });
        });

        function update() {
            let value = {
                'search': $('#search').val(),
                'sort': $('#sort').val()
            }
            $.ajax({
                type: 'get',
                url: '{{URL::to('/admin/categories/search')}}',
                data: value,
                success: function (data) {
                    console.log(data);
                    $('#Content').html(data);
                },
            });
        }

        $('#search').on('keyup', update);
        $('#sort').on('change', update);

        $(".category").click(function () {
            alert("hey");
            $(this).slideUp();
        });
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('category_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.categories.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 25,
            });
            let table = $('.datatable-Category:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
