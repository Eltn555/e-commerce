<style>

    .center {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-input2 img {
        width: 10rem;
        display: none;
        align-items: center;
        justify-content: center;
    }

    .form-input2 input {
        display: none;
    }

</style>

<!-- BEGIN: Modal Toggle -->
<div class="my-4">
    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#static-backdrop-modal-preview"
       class="btn btn-primary">Add Products</a>
</div>
<!-- END: Modal Toggle -->

<!-- BEGIN: Modal Content -->
<div id="static-backdrop-modal-preview" class="modal" data-tw-backdrop="static" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body px-5 py-10">
                <div class="text-left">
                    <form class="mt-3" action="{{route('admin.products.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col w-full h-32 border-4 border-dashed dropzones"
                                   style="cursor: pointer">
                                <div class="flex flex-col items-center justify-center pt-7 center">
                                    <div class="form-input2">
                                        <img class="w-100 h-32" id="file-ip-1-preview">
                                        <input type="file" style="cursor: pointer" class="opacity-0 fallback"
                                               name="image" id="file-ip-1" accept="image/*"
                                               onchange="showPreview(event);" required/>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <div class="mt-3">
                            <label for="title" class="form-label">Product Title</label>
                            <input id="title" type="text" name="title" class="form-control"
                                   placeholder="Product Title" required>
                        </div>
                        <div class="mt-3">
                            <label for="vertical-form-2" class="form-label">Buy</label>
                            <input id="vertical-form-2" type="number" step="any" name="buy" class="form-control floatNumberField" placeholder="Buy"
                                   required>
                        </div>
                        <div class="mt-3">
                            <label for="vertical-form-3" class="form-label">Sell</label>
                            <input id="vertical-form-3" name="sell" type="number" step="any" class="form-control"
                                   placeholder="Sell" required>
                        </div>
                        <div class="mt-3">
                            <label for="vertical-form-4" class="form-label">Stock</label>
                            <input id="vertical-form-4" type="number" name="stock" class="form-control"
                                   placeholder="Stock" required>
                        </div>
                        <label for="category_id" class="form-label mt-3">Category Id</label>
                        <select class="tom-select w-full" id="category_id" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
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
                                      minlength="5" required></textarea>
                        </div>
                        <button class="btn btn-secondary mt-5 w-24 mr-2" data-tw-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary w-24 text-">Ok</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Modal Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    function showPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";
        }
    }

    $(document).ready(function () {
        $(".floatNumberField").change(function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
        });
    });
</script>
