@extends('backend.layout.master')
@section('content')


<div class="card">
  <h5 class="card-header">create Post
   <!-- <a href="{{route('post.create')}}" class="btn btn-success float-right"> sva post</a> -->
  </h5>
  <div class="card-body">
    <form action="{{route('post.store')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="enter post title" class="form-control">
        @error('title')
        <p class="text-danger">{{'@message'}}</p>
        @enderror
        </div>
       <div class="form-group">
       <label for="sub-title">sub_title</label>
       <input type="text" name="sub_title" placeholder="enter post sub title" class="form-control">
       @error('sub_title')
        <p class="text-danger">{{@message}}</p>
        @enderror
       </div>
       <div class="form-group">
       <label for="description">Description</label>
       <textarea name="description" id="content "  placeholder="enter post description " class="form-control my-editor">
       
       </textarea>
       @error('description')
        <p class="text-danger">{{@message}}</p>
        @enderror
       </div>
       <div class="form-group">
       <button type="submit" class="btn btn-success">Save</button>
       </div>
        
    </form>
</div>
</div>
@endsection