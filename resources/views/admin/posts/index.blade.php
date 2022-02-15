@extends('admin.dashboard')
@section('meta_title')
    Menu Posts
@endsection
@section('content')
    <a href="{{ url('admin/post/add') }}" class="btn btn-primary">Add New Post</a>
	<div class="col-12 col-lg-3 mt-3 float-end">
		<form action="" method="get">
			<input type="text" value="{{ $keyword }}" placeholder="keyword" name="keyword" class="form-control">
		</form>
	</div>
    @if (!empty(session('message')))
    <div class="alert text-{{ session('message')['alert'] }}">
        {{ session('message')['msg'] }}
    </div>
    @endif
    <table class="table table-hover">
        <thead>
            <th>NO</th>
            <th>TITLE</th>
            <th>IMAGE</th>
            <th>ACTION</th>
        </thead>
        <tbody>
            @if ($posts->count() > 0)
                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <img src="{{ Storage::url($item->image) }}" class="img img-fluid" style="max-height: 50px;" alt="">
                        </td>
                        <td><a href="{{ url('admin/post/delete/'.$item->id) }}" onclick="return confirm('are you sure delete {{ $item->title }}')" class="btn btn-danger">Delete</a> | <a href="{{ url('admin/post/edit/'.$item->id) }}" class="btn btn-primary">Edit</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
	{{ $posts->links('admin.pagination') }}
@endsection
