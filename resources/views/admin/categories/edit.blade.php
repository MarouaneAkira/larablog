@extends('layouts.app')

@section('content')

@include('admin.includes.errors')
<div class="card">
    <div class="card-header">
        Update category: {{ $category->name }}
    </div>
    
    <div class="card-body">
        <form action="{{ route('categories.update', ['id' => $category->id] )}}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control">
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Update Category
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection