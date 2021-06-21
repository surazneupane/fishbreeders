<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->






            <div class="block mb-10">
                <a href="{{ route('posts.create') }}" class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-xl shadow">Add Post</a>
            </div>
            @can('user_access')




            <div class="block mb-10">

                <form style="display:inline" method="get" action="{{route('posts.index')}}">


                <?php
                $thisYear = (int) date("Y");
                $months= ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                ?>

                <select type="text" name="category[]" id="category"   multiple>
                    <option></option>
                    @foreach ($mainCategory as $category)
                        <option value="{{ $category->slug }}"
                        @if(in_array($category->slug,$searchedCategory))
                        selected
                        @endif
                        >
                        {{ $category->title }}
                        </option>
                        @endforeach
                        </select>

                        <select type="text" name="subcategory[]" id="subcategory" class=""  multiple>
                    <option></option>
                    @foreach ($subCategory as $category)
                        <option value="{{ $category->slug }}"
                        @if(in_array($category->slug,$searchedSubCategory))
                        selected
                        @endif
                        >
                        {{ $category->title }}
                        </option>
                        @endforeach
                        </select>

                <select type="text" name="status[]" id="status" class=""  multiple>
                    <option></option>
                        <option value="0" @if(in_array(0,$selectedStatus)) selected @endif >Draft</option>
                        <option value="1" @if(in_array(1,$selectedStatus)) selected @endif>Published</option>
                        <option value="2" @if(in_array(2,$selectedStatus)) selected @endif>Declined</option>

                        </select>


                        <select type="text" name="year" id="year" >
                        <option value="0">Select Year </option>

                        @for($i=1990;$i<=$thisYear;$i++)
                            <option value="{{$i}}" @if($searchedYear == $i) selected @endif>{{$i}}</option>
                            @endfor

                        </select>


                        <select type="text" name="month" id="month" >
                        <option value="0"> Select Month</option>
                        @for($i=0;$i<count($months);$i++)
                            <option value="{{$i+1}}" @if($searchedMonth == $i+1) selected @endif>{{$months[$i]}}</option>
                            @endfor

                        </select>

                <button class="py-2 px-4 bg-gray-500 hover:bg-white-600 text-white rounded-xl shadow " type="submit" >Filter</button>

                </form>

                </div>



          
            <div class="block mb-10">

            <button class="py-2 px-4 bg-gray-500 hover:bg-red-600 text-white rounded-xl shadow delete_all "  data-url="{{ url('admin/posts/delete/bulk') }}">Delete All Selected</button>
            OR,
            <form style="display:inline" method="post" action="{{route('posts.bulkdeletedate')}}"  onsubmit="return confirm('Are you sure you want to delete ?')">
            @method('DELETE')
            @csrf
            <label>From: </label>
            <input name="from" type="date" required>
            <label>To: </label>
            <input name="to" type="date" required>
            <button class="py-2 px-4 bg-gray-500 hover:bg-red-600 text-white rounded-xl shadow " type="submit" >Delete By Date</button>

            </form>

            </div>






        @endcan
        @if(Session::has('success'))
                     <p style="color: green">   {{Session::get('success')}} </p>
                        @endif       
                        @if(Session::has('error'))
                     <p style="color: red">   {{Session::get('error')}} </p>
                        @endif  
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>

                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <input type="checkbox" id="master"></th>


                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Category
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                         Sub  Category
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            created Date
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Views
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">view</span>
                                            <span class="sr-only">Edit</span>
                                            <span class="sr-only">Delete</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    @forelse ($posts as $post )


                                    <tr id="tr_{{$post->id}}">

                                    <td class="px-6 py-4 text-sm text-gray-900 w-96 max-w-sm truncate"><input type="checkbox" class="sub_chk" data-id="{{$post->id}}"></td>

                                        <td class="px-6 py-4 text-sm text-gray-900 w-96">
                                            {{ $post->title }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                            @foreach ($post->categories as $category)
                                            {{ $category->title }}@if (!$loop->last), @endif
                                            @endforeach
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                            @foreach ($post->subcategories as $category)
                                            {{ $category->title }}@if (!$loop->last), @endif
                                            @endforeach
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                            @if ($post->status == 1 )
                                            <span class="text-sm text-green-900 bg-green-200 px-2 py-1 rounded-xl">
                                                Published
                                            </span>
                                            @endif
                                            @if($post->status == 0)
                                            <span class="text-sm text-gray-900 bg-gray-200 px-2 py-1 rounded-xl">
                                                Draft
                                            </span>
                                            @endif
                                            @if($post->status == 2)
                                            <span class="text-sm text-gray-900 bg-red-100 px-2 py-1 rounded-xl">
                                                Declined
                                            </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $post->created_at }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $post->views }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 m-1 hover:text-blue-900">View</a>
                                            @can('user_access')
                                        
                                            <a href="{{ route('posts.edit', $post->id) }}" class="text-indigo-600 m-1 hover:text-indigo-900">Edit</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" class="inline" method="post" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                                @csrf
                                                @method('delete')
                                                <button class="text-red-600 m-1 hover:text-red-900">
                                                    Delete
                                                </button>
                                            </form>
                                            @endcan

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10000" class="px-6 py-4 text-sm text-gray-500 text-center">
                                            @lang('Sorry! No Data
                                            Found')</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{$posts->links()}}
        </div>
    </div>
    @if(Session::has('success') && Auth::user()->roles->contains(2))
    <div class="mt-6" x-data="{ open: true }">

        <!-- Button (blue), duh! -->
  
        <!-- Dialog (full screen) -->
        <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open" >
  
          <!-- A basic modal dialog with title, body and one button to close -->
          <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg font-large leading-6 text-gray-900">
              Post Added Sucessfully
              </h3>
  
              <div class="mt-2">
                <p class="text-m leading-5 text-green-500">
               
                 {{Session::get('success')}}
                </p>
            </div>
          </div>
  
            <!-- One big close button.  --->
            <div class="mt-5 sm:mt-6">
              <span class="flex w-full rounded-md shadow-sm">
                <button @click="open = false" class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                Okay!
                </button>
              </span>
            </div>
  
          </div>
        </div>
      </div>
      @endif

      <script type="text/javascript">
    $(document).ready(function () {
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });
        $('.delete_all').on('click', function(e) {
            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  
            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  
                var check = confirm("Are you sure you want to delete selected row?");  
                if(check == true){  
                    var join_selected_values = allVals.join(","); 
                    console.log(join_selected_values)
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                              
                                alert(data['success']);
                                location.reload(true);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });
       
      
    });
</script>
<script>
        $(document).ready(function() {
            $('#category').select2({
                width:200,
                placeholder: "Select Categories"
                , multiple: true
                , theme: "classic",
             
            });
            $('#subcategory').select2({
                width:200,

                placeholder: "Select Sub Categories"
                , multiple: true
                , theme: "classic"
            });
            $('#status').select2({
                width:200,

                placeholder: "Select Status"
                , multiple: true
                , theme: "classic"
            });
            $('#year').select2({
                width:200,

                placeholder: "Select Year"
                , theme: "classic"
            });

            $('#month').select2({
                width:200,

                placeholder: "Select Month"
                , theme: "classic"
            });

        });
</script>
</x-app-layout>
