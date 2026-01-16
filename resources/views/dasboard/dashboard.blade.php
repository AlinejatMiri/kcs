@extends('layouts.layout')

@section('main')
    <div class="container" >
        <h2>Admin Dashboard - Products</h2>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        {{-- Create product form --}}
        <div class="card" >
            <h3>Add New Product</h3>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price ($)</label>
                    <input type="number" step="0.01" name="price" id="price" value="{{ old('price', 0) }}" required>
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    {{-- <input type="text" name="category" id="category" value="{{ old('category') }}"> --}}
                    <select name="category" id="category">
                        <option disabled selected>Select an option</option>
                        <option value="peripheral">Peripheral device</option>
                        <option value="system">System</option>
                        <option value="hardware">Hardware</option>
                        <option value="software">Software</option>
                    </select>
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image (optional)</label>
                    <input type="file" name="image" id="image" accept="image/*">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit">Create Product</button>
            </form>
        </div>

        {{-- Existing products list --}}
        <div class="card" style="padding: 1rem;">
            <h3>Existing Products</h3>
            @if ($products->isEmpty())
                <p>No products found.</p>
            @else
                <table border="1" cellpadding="8" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Image URL</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->image_url }}</td>
                                <td>
                                    {{-- Inline edit form --}}
                                    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" style="margin-bottom: 0.5rem;">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="name" value="{{ $product->name }}" required>
                                        <input type="text" name="description" value="{{ $product->description }}">
                                        <input type="number" step="0.01" name="price" value="{{ $product->price }}" required>
                                        <input type="text" name="category" value="{{ $product->category }}">
                                        <input type="file" name="image" accept="image/*">
                                        <button type="submit">Update</button>
                                    </form>

                                    {{-- Delete form --}}
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: #e3342f; color: #fff;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <a href="{{route('home')}}">Back to home page</a>
    </div>
@endsection

