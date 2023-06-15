@extends('admin.layouts.app')
@section('title', 'Category Edit')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-content">
                    <h1>Edit Role</h1>
                    <form action="{{ route('categories.update', $category->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name') ?? $category->name }}">
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        @if ($category->childrens->count() > 1)
                        <div class="form-group">
                            <label for="">Parent Category</label>
                            <div class="btn-group bootstrap-select">
                                <select class="selectpicker" data-style="btn btn-danger btn-block" name="parent_id">
                                    <option value="">Select parent category</option>
                                    @foreach ($parrentCategories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ (old('parent_id') ?? $category->parent_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="card-footer text-center">
                            <button class="btn btn-info btn-fill btn-wd">Submit Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
