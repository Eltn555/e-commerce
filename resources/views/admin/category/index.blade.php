@extends('layouts.admin')
@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">Categories</h2>
    <div class="grid grid-cols-12 gap-6">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center">
            @include('admin.category.create')
        </div>
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center">
            <div class="w-full sm:w-auto sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search..."
                           control-id="ControlID-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                         data-lucide="search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">IMAGES</th>
                    <th class="whitespace-nowrap">CATEGORY NAME</th>
                    <th class="whitespace-nowrap">PRODUCTS</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                @if($category->products->isEmpty())
                                    <div class="w-10 h-10 image-fit zoom-in"></div>
                                @else
                                    @foreach($category->products->take(5) as $key => $product)
                                        <div class="w-10 h-10 image-fit zoom-in {{ $key != 0 ? '-ml-5' : '' }}">
                                            <img alt="{{ $product->title }}" class="tooltip rounded-full"
                                                 src="{{ asset('storage/' . $product->image) }}"
                                                 title="{{ $product->title }}">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('admin.category.show', $category->id) }}"
                               class="font-medium whitespace-nowrap">{{ $category->title }}</a>
                        </td>
                        <td>
                            @if($category->products->isEmpty())
                                No products to show.
                            @else
                                @foreach($category->products->take(5) as $key => $product)
                                    {{ ($key != 0 ? ', ' : ''). $product->title  }}
                                @endforeach
                            @endif
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                @include('admin.category.edit')
                                <!-- BEGIN: Modal Toggle -->
                                <a href="javascript:;" data-tw-toggle="modal"
                                   data-tw-target="#delete-modal-preview-{{$category->id}}"
                                   class="flex items-center text-danger">
                                    <i data-lucide="trash-2" class="px-1 text-danger"></i>
                                    Delete</a>
                                <!-- END: Modal Toggle -->
                                <!-- BEGIN: Modal Content -->
                                <div id="delete-modal-preview-{{$category->id}}" class="modal" tabindex="-1"
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
                                                    <form action="{{ route('admin.category.delete', $category->id) }}"
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
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>

@endsection
