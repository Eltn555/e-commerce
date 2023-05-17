@extends('layouts.admin')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">Sales</h2>
    <a href="{{route('admin.import.sales.create')}}" class="btn btn-primary mb-3 my-4">Create</a>

    <div class="box my-4 intro-y">
        @include('admin.import.sales.saleItems')
    </div>


@endsection
