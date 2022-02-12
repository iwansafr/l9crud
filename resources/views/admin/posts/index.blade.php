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

        </tbody>
    </table>
@endsection
