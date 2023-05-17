@extends('layouts.admin')
@section('title')
    | Customers
@endsection
@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">Customers</h2>
    @include('admin.import.customer.create')
    <div class="lg:flex intro-y">
        <div class="intro-y col-span-12 flex flex-wrap items-center mt-2">
            <div class="relative">
                <input type="text" name="search" id="search"
                       class="form-control py-3 px-4 w-full lg:w-64 box mr-2 pr-10"
                       placeholder="Search for name...">
                <i data-lucide="search"
                   class="lucide lucide-search w-5 h-5 absolute my-auto inset-y-0 mr-4 right-0 text-slate-500"></i>
            </div>
        </div>
    </div>
    <div id="content">
        <div class="grid grid-cols-12 gap-6 mt-5">
            @foreach($customers as $customer)
                <div class="intro-y col-span-12 lg:col-span-6 xl:col-span-6 md:col-span-6">
                    <div class="box">
                        <div class="flex flex-col lg:flex-row items-center p-5">
                            <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                <i class="border-2 rounded-full w-full h-full py-1" data-lucide="user"></i>
                            </div>
                            <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                <a class="font-medium">{{ $customer->name ?? '' }}</a>
                                <div class="text-slate-500 text-xs mt-0.5">{{ $customer->phone_number ?? '' }} </div>
                                <div class="text-slate-500 text-xs mt-0.5">{{ $customer->address ?? '' }} </div>
                            </div>
                            <div class="flex mt-4 lg:mt-0 mr-1">
                                @include('admin.import.customer.edit')
                            </div>
                            <div class="flex mt-4 lg:mt-0 mr-1">
                                <a href="{{ route('admin.customers.show', $customer->id) }}"
                                   class="btn btn-outline-primary py-1 px-2"
                                   control-id="ControlID-8"><i data-lucide="eye" class="px-1"></i> Preview</a>
                            </div>
                            <!-- BEGIN: Modal Toggle -->
                            <div class="flex mt-4 lg:mt-0 mr-1">
                                <a href="javascript:;" data-tw-toggle="modal"
                                   data-tw-target="#delete-modal-preview-{{$customer->id}}"
                                   class="btn btn-outline-danger py-1 px-2">
                                    <i data-lucide="trash-2" class="px-1"></i>
                                    Delete</a>
                            </div>
                            <!-- END: Modal Toggle -->
                            <!-- BEGIN: Modal Content -->
                            <div id="delete-modal-preview-{{$customer->id}}" class="modal" tabindex="-1"
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
                                                <form action="{{ route('admin.customers.delete', $customer->id) }}"
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
    <script type="text/javascript">
        function update() {
            console.log($('#search').val())
            let value = {
                'search': $('#search').val()
            }
            $.ajax({
                type: 'get',
                url: '{{URL::to('/admin/customers/search')}}',
                data: value,
                success: function (data) {
                    console.log(data);
                    $('#content').html(data);
                },
            });
        }

        $('#search').on('keyup', update);
    </script>
@endsection
