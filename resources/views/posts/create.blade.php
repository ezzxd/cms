@extends('layouts.app')
@section('stylesheet')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
@section('content')
<div class="card card-default">
    <div class="card-header">{{isset($post)?'Update Post':'Add new post'}}</div>
    <div class="card-body">
    <form
     action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}" 
     method="POST" enctype="multipart/form-data">
     @csrf
     @if (isset($post))
     @method('PUT')

     @endif
           

            <div class="form-group">
        <label for="">title :</label>
        <input  class=" form-control" type="text" name="title" 
        value="{{isset($post)?$post->title:''}}"> 
    
     
         </div>
     
        
             
            <div class="form-group">
                <label for="">description :</label>
<textarea   class=" form-control" name="description" id=""  rows="2">{{isset($post)?$post->description:''}}</textarea>           
             
                 </div>
                 
            <div class="form-group">
                <label for="">content :</label>
              {{--  <textarea   class=" form-control" name="content" id=""  rows="6"></textarea> --}}
               <input id="x" type="hidden" name="content"  value="{{isset($post)?$post->content:''}}">
               <trix-editor input="x" ></trix-editor>
                 </div>
                 @if (isset($post))
                 <div class="form-droup">
                    <img src="{{asset('storage/'.$post->image)}}" alt="" style="width:100%">
                    </div> 
                    
                 @endif
                 <div class="form-group">
                    <label for="">image :</label>
                    <input    class=" form-control" type="file" name="image" id="" >
                    
                 
                     </div>
                     <div class="form-group">
                        <label for="selectcategory">Select a category *</label>
                        <select name="categoryID" class="form-control" id="selectcategory" >
                             @foreach ($categories as $category)
                         <option value="{{$category->id}}">{{$category->name}}</option>

                        @endforeach
                    </select>
                      </div>
                      @if ($tags->count()>0)
                      <div class="form-group">
                        <label for="selecttag">Select a Tag *</label>
                        <select name="tags[]" class="tags form-control" id="selecttag" multiple >
                             @foreach ($tags as $tag)
                         <option value="{{$tag->id}}"
                            @if ($post ->hasTag($tag->id))
                                selected
                            @endif
                            >{{$tag->name}}</option>

                        @endforeach
                    </select>
                      </div>
                      @endif
         <div class="form-group">
            <button type="submit" class="btn btn-success" >{{isset($post)?'Update Post':'Add new post'}}</button>
             </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
// In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
    $('.tags').select2();
});
</script>
@endsection