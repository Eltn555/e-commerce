@extends('layouts.admin')
@section('content')

    <h2 class="intro-y text-lg font-medium my-5">Finances</h2>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center my-5">
        @include('admin.finance.create')
    </div>
    @include('admin.finance.financeItems')
@endsection
