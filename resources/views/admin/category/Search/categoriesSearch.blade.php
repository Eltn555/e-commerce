<div
    class="w-10 h-10 flex items-center justify-center absolute top-0 right-0 text-xs text-white rounded-full  font-medium -mt-1 -mr-1">
    @include('admin.category.edit')
</div>
<a href="/admin/categories/{{ $category->id }}"
   class="col-span-12 sm:col-span-3 2xl:col-span-3 box p-5 cursor-pointer zoom-in">
    <div class="font-medium text-base">{{ $category->title }}</div>
    <div
        class="text-slate-500">{{ count($category->products) }} {{ count($category->products) == 1 ? 'Item' : 'Items'}}</div>
</a>
