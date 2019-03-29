@extends ('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
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
                    Restore
                </th>

            </thead>

            <tbody>
               @foreach($posts as $post)
                    <tr>
                        <td><img src="{{ $post->image }}" alt="{{ $post->title }}" width=90px height=50px></td>
                        <td>{{ $post->title }}</td>
                        <td>Edit</td>
                        <td>
                        <a href="{{ route('posts.delete', ['id' => $post->id] ) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
               @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection