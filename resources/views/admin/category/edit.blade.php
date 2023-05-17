<!-- START: Modal Toggle -->
<a href="javascript:;" data-tw-toggle="modal" data-tw-target="#static-backdrop-modal-category-{{$category->id}}"
   class="flex items-center mr-3">
    <i data-lucide="edit"></i>
</a>
<!-- END: Modal Toggle -->

<!-- BEGIN: Modal Content -->
<div id="static-backdrop-modal-category-{{$category->id}}" class="modal" data-tw-backdrop="static" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body px-5 py-10">
                <div class="text-left">
                    <form action="{{ route('admin.category.edit',$category->id) }}" method="post">
                        @csrf
                        <label for="vertical-form-1" class="form-label">Category Name</label>
                        <input id="vertical-form-1" type="text" class="form-control" name="title"
                               value="{{old('category',$category->title)}}"
                               placeholder="Category Name" required>
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1 mt-4">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary w-24 text-">Ok</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Modal Content -->
