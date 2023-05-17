<div
    class="intro-y col-span-12  md:col-span-6lg:col-span-4 xl:col-span-3 shadow-lg border-black btn-rounded-dark">
    <div class="box border-b-2 border-l-2 border-opacity-10 border-black">
        <div class="p-5">
            <div
                class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                <img alt="Midone - HTML Admin Template" class="rounded-md"
                     src="{{asset('storage/'.$product->image)}}">
                <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                    <a href="" class="block font-medium text-base">{{ $product->title ?? '' }}</a>
                    <span class="text-white/90 text-xs mt-3">{{ $product->description ?? '' }}</span>
                </div>
            </div>
            <div class="text-slate-600 dark:text-slate-500 mt-5">
                <div class="flex items-center">
                    Buy: {{ $product->buy ?? '' }}
                    <br>
                    Sell: {{ $product->sell ?? '' }}
                </div>
                <div class="flex items-center mt-2">
                    <i data-lucide="layers"></i>
                    Remaining Stock: {{ $product->stock ?? '' }}
                </div>
            </div>
        </div>
        <div
            class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
            <a class="flex items-center text-primary mr-auto" {{--href="{{ route('admin.products.show', $product->id) }}"--}}>
                <i data-lucide="eye" class="mr-1"></i>
                Preview
            </a>
            {{--                        @include('admin.product.edit')--}}
            <!-- BEGIN: Modal Toggle -->
            <a href="javascript:;" data-tw-toggle="modal"
               data-tw-target="#static-backdrop-modal-preview-{{ $product->id }}"
               class="flex items-center text-primary mr-auto">
                <i data-lucide="edit" class="mr-1"></i>
                Edit</a>
            <!-- END: Modal Toggle -->

            <!-- BEGIN: Modal Content -->
            <div id="static-backdrop-modal-preview-{{ $product->id }}" class="modal"
                 data-tw-backdrop="static" tabindex="-1"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body px-5 py-10">
                            <form action="{{route('admin.products.edit',$product->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col w-full h-56 border-4 border-dashed dropzones"
                                           style="cursor: pointer">
                                        <div class="flex flex-col items-center justify-center pt-7">
                                            <img src="{{asset('storage/'.$product->image)}}" alt=""
                                                 id="preview"
                                                 class="w-60 h-40 text-gray-400 group-hover:text-gray-600">
                                        </div>
                                        <input type="file" class="opacity-0 fallback"
                                               name="image" accept="image/*" id="image"/>
                                    </label>
                                </div>

                                <div class="mt-3">
                                    <label for="title" class="form-label">Product Title</label>
                                    <input id="title" type="text" name="title" class="form-control"
                                           placeholder="Product Title"
                                           value="{{ old('title', $product->title) }}" required>
                                </div>
                                <div class="mt-3">
                                    <label for="vertical-form-2" class="form-label">Buy</label>
                                    <input id="vertical-form-2" type="number" name="buy"
                                           class="form-control"
                                           value="{{ old('buy', $product->buy) }}" placeholder="Buy"
                                           required>
                                </div>
                                <div class="mt-3">
                                    <label for="vertical-form-3" class="form-label">Sell</label>
                                    <input id="vertical-form-3" name="sell" type="number"
                                           class="form-control"
                                           placeholder="Sell" value="{{ old('sell', $product->sell) }}"
                                           required>
                                </div>
                                <div class="mt-3">
                                    <label for="vertical-form-4" class="form-label">Stock</label>
                                    <input id="vertical-form-4" type="number" name="stock"
                                           class="form-control"
                                           placeholder="Stock" value="{{ old('stock', $product->stock) }}"
                                           required>
                                </div>
                                <label for="category_id" class="form-label mt-3">Category Id</label>
                                <select class="tom-select w-full" id="category_id" name="category_id">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="intro-y col-span-12 sm:col-span-6 mt-3">
                                    <label for="description"
                                           class="form-label w-full flex flex-col sm:flex-row">
                                        Product Description
                                        <span
                                            class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 5 characters</span>
                                    </label>
                                    <textarea id="description" class="form-control" name="description"
                                              placeholder="Type your comments"
                                              minlength="5">{{$product->description}}</textarea>
                                </div>
                                <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-outline-secondary w-24 mr-1 mt-4">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary w-24 text-">Ok</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Modal Content -->


            <!-- BEGIN: Modal Toggle -->
            <a href="javascript:;" data-tw-toggle="modal"
               data-tw-target="#delete-modal-preview-{{$product->id}}"
               class="flex items-center mr-auto text-danger">
                <i data-lucide="trash-2" class="px-1 text-danger"></i>
                Delete</a>
            <!-- END: Modal Toggle -->
            <!-- BEGIN: Modal Content -->
            <div id="delete-modal-preview-{{$product->id}}" class="modal" tabindex="-1" aria-hidden="true">
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
                                <form action="{{ route('admin.products.delete', $product->id) }}"
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

