<!-- BEGIN: Modal Toggle -->
<a href="javascript:;" data-tw-toggle="modal" data-tw-target="#static-backdrop-modal-preview-{{ $product->id }}"
   class="flex items-center text-primary mr-auto">
    <i data-lucide="edit" class="mr-1"></i>
    Edit</a>
<!-- END: Modal Toggle -->

<!-- BEGIN: Modal Content -->
<div id="static-backdrop-modal-preview-{{ $product->id }}" class="modal" data-tw-backdrop="static" tabindex="-1"
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
                                <img src="{{asset('storage/'.$product->image)}}" alt="" id="preview"
                                     class="w-60 h-40 text-gray-400 group-hover:text-gray-600">
                            </div>
                            <input type="file" class="opacity-0 fallback"
                                   name="image" accept="image/*" id="image"/>
                        </label>
                    </div>

                    <div class="mt-3">
                        <label for="title" class="form-label">Product Title</label>
                        <input id="title" type="text" name="title"  class="form-control"
                               placeholder="Product Title"
                               value="{{ old('title', $product->title) }}" required>
                    </div>
                    <div class="mt-3">
                        <label for="vertical-form-2" class="form-label">Buy</label>
                        <input id="vertical-form-2" type="number" step="any" name="buy" class="form-control"
                               value="{{ old('buy', $product->buy) }}" placeholder="Buy"
                               required>
                    </div>
                    <div class="mt-3">
                        <label for="vertical-form-3" class="form-label">Sell</label>
                        <input id="vertical-form-3" name="sell" type="number" step="any" class="form-control"
                               placeholder="Sell" value="{{ old('sell', $product->sell) }}" required>
                    </div>
                    <div class="mt-3">
                        <label for="vertical-form-4" class="form-label">Stock</label>
                        <input id="vertical-form-4" type="number" name="stock" class="form-control"
                               placeholder="Stock" value="{{ old('stock', $product->stock) }}" required>
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
                        <label for="description" class="form-label w-full flex flex-col sm:flex-row">
                            Product Description
                            <span
                                class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 5 characters</span>
                        </label>
                        <textarea id="description" class="form-control" name="description"
                                  placeholder="Type your comments"
                                  minlength="5">{{$product->description}}</textarea>
                    </div>
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1 mt-4">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary w-24 text-">Ok</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Modal Content -->

