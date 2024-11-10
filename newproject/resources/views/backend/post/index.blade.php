@extends('backend.layout.master')
@section('content')

<div class="container-fluid">

<div class="card">
  <h5 class="card-header">Post
   <a href="{{route('post.create')}}" class="btn btn-success float-right"> Add post</a>
  </h5>
  <div class="card-body">
   <table class="table">
      <thead>
         <tr>
            <th>No</th>
            <th>title</th>
            <th>sub_title</th>
            <th>action</th>
         </tr>
      </thead>
      <tbody>
         @foreach($posts as $index=>$post)
         <tr>
            <td>{{($posts->currentPage()*4)-4+$index+1}}</td>
            <th>{{$post->title}}</th>
            <td>{{$post->sub_title}}</td>
            <td>
            <a class="delete" id="{{$post->id}}" href="#">delete</a>
            <a href="{{route('post.edit',['post'=>$post->id])}}">edit</a>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>

   <tfoot>
      {{$posts->links()}}
   </tfoot>
  </div>
</div>

</div>
@endsection

@section('script')

<script>

   $('.delete').click(function(){

      Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
   var id=$(this).attr('id');
   var url='post/'+id;

   $.ajax
   (
      {
         headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
         url:url,
         type:'DELETE',
         dataType:'json',
      }
    
   )

   Swal.fire(
        'Deleted!',
        'The record has been deleted.',
        'success'
          ).then(() => {
             location.reload(); // Reload the page after confirmation
         });
    


  }
});


   });


   </script>



@endsection