@extends('layouts.app')

@section('content')

@include('admin.includes.errors')
<div class="card">
    <div class="card-header">
        Create a new post
    </div>

    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="categories">Select a category</label>
                <select name="category_id" id="categories" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tags">Select Tags</label>
                <div class="checkbox">
                    @foreach($tags as $tag)
                    <label>
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->tag }}
                    </label>
                    <br>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea></textarea>
                <!--<div name="content" id="content" class="form-control"></div>-->
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Post</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('styles')
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({selector:'textarea'});</script>
@stop