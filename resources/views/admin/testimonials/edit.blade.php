@extends('layouts.app')
@section('css')


<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  
<style>
    .white-card {
        background: rgba( 162, 49, 49, 0.15 );
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 7.5px );
-webkit-backdrop-filter: blur( 7.5px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );
}



</style>
@endsection
@section('content')
    @include('layouts.messages')
    <div class="py-4 flex-1 px-6 ">
        <div class="border-b-2 border-red-100 dark:border-gray-500">
            <h1 class="text-red-800 dark:text-slate-300 font-bold pt-4 pb-1 px-2 text-3xl">Edit Notice</h1>
        </div>

        <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST" action="{{ route('testimonials.update',$testimonial->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Full Name</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{$testimonial->name}}" placeholder="Enter Full Name" required>
            </div>

            <div>
              <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Person Title</label>
              <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{$testimonial->title}}" placeholder="Enter New title" required>
          </div>

          <div>
            <label for="comments" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Comments</label>
            <textarea name="comments" id="comments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter New title" required>{{$testimonial->comments}}</textarea>
        </div>


          <input type="hidden" name="oldpath" value="{{ $testimonial->photopath }}">
            <label>Current Image</label>
            <img src="/storage/testimonials/{{$testimonial->photopath}}">
            <div class="form-group">
              <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
              <p class="card shadow" style="border:4px dashed #d7ded9; width: 254px; height:245px; margin: 0; padding: 0;"><img id="output" width="246" /></p>
              <p><label for="file" style="cursor: pointer;" class="btn btn-primary">Upload Image (1:1) <span> * </span></label></p>
              
              <script>
              var loadFile = function(event) {
                  var image = document.getElementById('output');
                  image.src = URL.createObjectURL(event.target.files[0]);
              };
              </script>
            </div>

           
              
              <div class="flex justify-center">
              <button type="submit" class="py-2 px-4 mx-2 rounded-md text-white bg-indigo-600 shadow-md shadow-indigo-200 hover:bg-indigo-800 hover:shadow-sm dark:shadow-gray-600">Update Data</button>
              <a href="{{ route('testimonials.index') }}" class="py-2 px-4 mx-2 rounded-md cursor-pointer text-white bg-red-500 shadow-md shadow-red-200 hover:bg-red-600 hover:shadow-sm dark:shadow-gray-600">Cancel</a>
              </div>
              
          </form>

        
        

        

    </div>

    

    

@endsection