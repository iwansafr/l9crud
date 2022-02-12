@extends('admin.dashboard')
@push('css')
    <style>
        ul.pagination {
            display: inline-block;
            padding: 0;
            margin: 0;
        }

        ul.pagination li {
            display: inline;
        }

        ul.pagination li a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

    </style>
@endpush
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
	{{ $posts->links('admin.pagination') }}
@endsection
