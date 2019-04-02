@extends ('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="card-header">
        Published Posts
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>

                <th>
                    Image
                </th>

                <th>
                    Title
                </th>

                <th>
                    Edit
                </th>

                <th>
                    Trash
                </th>

            </thead>

            <tbody>
               @if($posts->count() > 0)
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{ $post->image }}" alt="{{ $post->title }}" width=90px height=50px></td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <a href="{{ route('posts.edit', ['id' => $post->id] ) }}" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('posts.delete', ['id' => $post->id] ) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else 
                    <tr>
                        <th colspan="5" class="text-center">The post index is empty!</th>
                    </tr>
                @endif   
            </tbody>

        </table>
    </div>
</div>

@endsection