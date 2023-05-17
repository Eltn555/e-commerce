<!-- BEGIN: Modal Toggle -->
<div class="my-4">
    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#static-backdrop-modal-preview"
       class="btn btn-primary">Add Customers</a>
</div>
<!-- END: Modal Toggle -->
<!-- BEGIN: Modal Content -->
<div id="static-backdrop-modal-preview" class="modal" data-tw-backdrop="static" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body px-5 py-10">
                <form action="{{ route('admin.customers.store') }}" method="post">
                    @csrf
                    <div class="text-left">
                        <div>
                            <label for="vertical-form-1" class="form-label">Customer Name</label>
                            <input id="vertical-form-1" type="text" name="name" class="form-control"
                                   placeholder="Please write..." required>
                        </div>
                        <div class="mt-3">
                            <label for="vertical-form-2" class="form-label">Customer Number</label>
                            <input id="vertical-form-2" name="phone_number" type="text" class="form-control"
                                   placeholder="Please write..." required>
                        </div>
                        <div class="mt-3">
                            <label for="vertical-form-3" class="form-label">Customer Address</label>
                            <input id="vertical-form-3" name="address" type="text" class="form-control"
                                   placeholder="Please write..." required>
                        </div>
                        <button class="btn btn-secondary mt-5 w-24 mr-2" data-tw-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary w-24 text-">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Modal Content -->
