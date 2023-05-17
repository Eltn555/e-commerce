<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
        <tr>
            <th class="whitespace-nowrap">ID</th>
            <th class="text-center whitespace-nowrap">Client Name</th>
            <th class="text-center whitespace-nowrap">Amount</th>
            <th class="text-center whitespace-nowrap">Date</th>
            <th class="text-center whitespace-nowrap">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($finances as $key => $finance)
            <tr class="intro-x">
                <td class="w-40">
                    <div class="flex">
                        <a href="{{ route('admin.import.sales.show', $finance->id) }}">
                            <p class="font-medium whitespace-nowrap">{{$key + 1}}</p>
                        </a>
                    </div>
                </td>
                <td class="w-40">
                    <a href="{{ route('admin.import.sales.show', $finance->id) }}" class="flex items-center justify-center">{{$finance->client}}</a>
                </td>
                <td class="w-40">
                    <p class="flex items-center justify-center">
                        {{ $finance->given }}
                    </p>
                </td>
                <td class="w-40">
                    <p class="flex items-center justify-center">
                        {{date_format($finance->created_at,"d/m/Y")}}
                    </p>
                </td>
                <td class="table-report__action w-56">
                    <div class="flex justify-center items-center">
                        <a class="flex items-center mr-3">
                            <i class="px-1" data-lucide="edit"></i>
                            Edit
                        </a>
                        <!-- BEGIN: Modal Toggle -->
                        <a href="javascript:;" data-tw-toggle="modal"
                           data-tw-target="#delete-modal-preview-{{$finance->id}}"
                           class="flex items-center text-danger">
                            <i data-lucide="trash-2" class="px-1 text-danger"></i>
                            Delete</a>
                        <!-- END: Modal Toggle -->
                        <!-- BEGIN: Modal Content -->
                        <div id="delete-modal-preview-{{$finance->id}}" class="modal" tabindex="-1"
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
                                            <form action="{{ route('admin.sales.delete', $finance->id) }}"
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
