@extends('admin.dashboard')
@section('meta_title')
    Create New Post
@endsection
@section('content')
    <form action="{{ empty($post) ? url('admin/post/create') : url('admin/post/update/'.$post['id']) }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title mb-0">Post</h5>
            </div>
            <div class="card-body">
              @if (!empty(session('message')))
                <div class="alert text-{{ session('message')['alert'] }}">
                  {{ session('message')['msg'] }}
                </div>
              @endif
              <div class="form-group mb-3">
                <label class="form-label" for="">Title*</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" value="{{ !empty($post['title']) ? $post['title'] : old('title') }}">
                <div class="invalid-feedback">
                  @error('title') {{ $message }} @enderror
                </div>
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" accept="image/*" placeholder="Image" name="image">
                <div class="invalid-feedback">
                  @error('image') {{ $message }} @enderror
                </div>
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="">Content*</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="" cols="30" rows="10">{{ !empty($post['content']) ? $post['content'] : old('content') }}</textarea>
                <div class="invalid-feedback">
                  @error('content') {{ $message }} @enderror
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>
    </form>
@endsection