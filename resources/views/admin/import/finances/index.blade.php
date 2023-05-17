@extends('layouts.admin')
@section('content')

    <h2 class="intro-y text-lg font-medium my-5">Finances</h2>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center">
        @include('admin.import.finances.create')
    </div>
    @include('admin.import.finances.financeItems')
@endsection
