@extends('layouts.app')

@section('content')

<h1>Create a product</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="form-row">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" required  value="{{ old('title') }}">
    </div>

    <div class="form-row">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" required  value="{{ old('description') }}">
    </div>

    <div class="form-row">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" required min="1.00" step="0.01"  value="{{ old('price') }}">
    </div>

    <div class="form-row">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" name="stock" required min="0" value="{{ old('stock') }}" >
    </div>

    <div class="form-row">
        <label for="status">Status</label>
        <select name="status" name="status" class="custom-select" required>
            <option value="" selected>Select...</option>
            <option {{ old('status') == 'available' ? 'selected' : '' }} value="available" >Available</option>
            <option {{ old('status') == 'unavailable' ? 'selected' : '' }} value="unavailable" >Unavailable</option>
        </select>
    </div>

    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lg mt-3" >Create Product</button>
    </div>

</form>

@endsection