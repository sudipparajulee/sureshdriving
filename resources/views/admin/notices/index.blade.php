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
            <h1 class="text-red-800 dark:text-slate-300 font-bold pt-4 pb-1 px-2 text-3xl">Menu noticess</h1>
        </div>

        <div>
            <p class="font-bold">Current Notice</p>
            <p class="bg-blue-700 text-white"><marquee onmouseover="this.stop()" onmouseout="this.start()">
                @foreach ($notices as $notice)
                    {{$notice->notice}} ||
                @endforeach
            </marquee></p>
        </div>

        <div class="mt-8  z-10 animate__animated animate__fadeIn">
            <table id="index" class="display dark:text-slate-300 w-full">
                <thead >
                    <tr class="text-left">
                        <th>Order</th>
                        <th>Title Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-900 dark:text-slate-300">
                    @foreach($notices as $data)
                    <tr class=" border-gray-100 dark:border-gray-600 dark:bg-gray-500">
                        <td>{{$data->priority}}</td>
                        <td>{{$data->notice}}</td>
                        <td>
                            {{-- <a href="#" class="p-2 text-blue-700 hover:text-blue-900" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="#" class="p-2 text-red-700 hover:text-red-900" title="Delete"><i class="fa fa-trash-alt"></i></a> --}}
                            <a href="{{ route('notices.edit',$data->id) }}" class="py-1 px-4 rounded-md text-white bg-indigo-600 shadow-md shadow-indigo-200 hover:bg-indigo-800 hover:shadow-sm dark:shadow-gray-600">Edit</a>
                            <a href="#" class="py-1 px-4 rounded-md text-white bg-red-500 shadow-md shadow-red-200 hover:bg-red-600 hover:shadow-sm dark:shadow-gray-600" onclick="showdelete({{$data->id}})">Delete</a>
                            
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>

        {{-- Modal For Delete --}}

         <!-- Main modal -->
  <div id="deletemodal"  class="white-card hidden dark:bg-white dark:bg-opacity-10 overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-20 z-50 justify-center items-center md:h-full md:inset-0" >
    <div class="relative px-4 w-full max-w-md h-full md:h-auto mx-auto mt-[15%]">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
           
            <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST" action="{{ route('notices.delete') }}">
              @csrf
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white pt-6 mb-0 text-center">Are You Sure to Delete ?</h3>
                <p class="text-center mt-0 text-red-500">The related data must be deleted first</p>
                
                <input type="hidden" id="dataid" name="dataid">
                
                <div class="flex justify-center">
                <button type="submit" class="py-2 px-4 mx-2 rounded-md text-white bg-indigo-600 shadow-md shadow-indigo-200 hover:bg-indigo-800 hover:shadow-sm dark:shadow-gray-600">Yes ! Delete</button>
                <a class="py-2 px-4 mx-2 rounded-md cursor-pointer text-white bg-red-500 shadow-md shadow-red-200 hover:bg-red-600 hover:shadow-sm dark:shadow-gray-600" onclick="hidedelete()">Cancel</a>
                </div>
                
            </form>
        </div>
    </div>
</div> 

        {{-- End Modal For Delete --}}

        <div>
            <!-- Modal toggle -->
            <div class="fixed bottom-8 right-8">
                <a onclick="showDataAddModal()" class="bg-red-700 dark:bg-zinc-500 hover:bg-red-800 text-white px-4 py-3 rounded-full cursor-pointer"><i class="fa fa-plus"></i></a>
            </div>
  
  <!-- Main modal -->
  <div id="data-add-modal"  class="white-card hidden dark:bg-white dark:bg-opacity-10 overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-20 z-50 justify-center items-center md:h-full md:inset-0">
      <div class="relative px-4 w-full max-w-md h-full md:h-auto mx-auto mt-10 mb-10">
          <!-- Modal content -->
          <div id="data-add-modal-content" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <div class="flex justify-end p-2">
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" onclick="hideDataAddModal()">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                  </button>
              </div>
              <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST" action="{{ route('notices.store') }}">
                @csrf
                  <h3 class="text-xl font-medium text-gray-900 dark:text-white">Add New Notice</h3>
                  <div>
                      <label for="notice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Notice</label>
                      <input type="text" name="notice" id="notice" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{old('notice')}}" placeholder="Enter New Notice" required>
                  </div>

                  <div>
                    <label for="priority" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Priority</label>
                    <input type="number" name="priority"  min="0" id="priority" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{old('priority')}}" placeholder="Priority For Notice" required>
                  </div>

               
                  
                  <div class="flex justify-end">
                  <button type="submit" class="py-2 px-4 mx-2 rounded-md text-white bg-indigo-600 shadow-md shadow-indigo-200 hover:bg-indigo-800 hover:shadow-sm dark:shadow-gray-600">Add Data</button>
                  <a onclick="hideDataAddModal()" class="py-2 px-4 mx-2 rounded-md cursor-pointer text-white bg-red-500 shadow-md shadow-red-200 hover:bg-red-600 hover:shadow-sm dark:shadow-gray-600">Cancel</a>
                  </div>
                  
              </form>
          </div>
      </div>
  </div> 
</div>

    </div>

    

    

@endsection

@section('js')


<script>
    $(document).ready( function () {
    $('#index').DataTable();
} );
</script>

<script>
    function showdelete($id){
        $('#deletemodal').removeClass('hidden');
        document.getElementById('dataid').value = $id;
    }

    function hidedelete(){
        $('#deletemodal').addClass('hidden');
    }
</script>

<script>
  $(document).mouseup(function(e) 
{
    var container = $("#data-add-modal-content");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        $('#data-add-modal').hide();
    }
});

    function showDataAddModal(){
        $('#data-add-modal').show();
    }

    function hideDataAddModal(){
        $('#data-add-modal').hide();
    }

    
</script>
@endsection