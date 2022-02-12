@extends('admin.dashboard')
@section('meta_title')
    Menu Posts
@endsection
@section('content')
	<a href="{{ url('admin/post/add') }}" class="btn btn-primary">Add New Post</a>
    <table class="table table-hover">
        <thead>
            <th>NO</th>
            <th>TITLE</th>
            <th>ACTION</th>
        </thead>
        <tbody>
			@if ($posts->count() > 0)
				@foreach ($posts as $item)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $item->title }}</td>
						<td><a href="" class="btn btn-danger">Delete</a> | <a href="" class="btn btn-primary">Edit</a></td>
					</tr>
				@endforeach
			@endif
        </tbody>
    </table>
	{{ $posts->links() }}
@endsection
