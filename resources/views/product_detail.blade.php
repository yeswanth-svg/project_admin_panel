@extends('layouts.apps')

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Left side: Product image -->
        <div class="col-md-6">
            <img src="{{ asset('products_images/' . $service->image_path) }}" alt="{{ $service->title }}"
                class="img-fluid">
        </div>

        <!-- Right side: Product description -->
        <div class="col-md-6">
            <div class="service-detail-page">
                <h1>{{ $service->title }}</h1>
                <p>{{ $service->description }}</p>
                <!-- Add any other details you want to show -->
            </div>
        </div>
    </div>
</div>
@endsection