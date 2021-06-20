<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forum List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->

            <div class="block mb-10">
                <a href="{{ route('questions.create') }}" class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-xl shadow">Add Question</a>
                <a href="{{route('forumcategory.index')}}" class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-xl shadow">Forum Categories</a>

     </div>

                        <div class="block mb-10">

                    <button class="py-2 px-4 bg-gray-500 hover:bg-red-600 text-white rounded-xl shadow delete_all "  data-url="{{ url('admin/forums/bulkdelete') }}">Delete All Selected</button>
                    OR,
                    <form style="display:inline" method="post" action="{{route('forums.bulkdeletedate')}}"  onsubmit="return confirm('Are you sure you want to delete ?')">
                    @method('DELETE')
                    @csrf
                    <label>From: </label>
                    <input name="from" type="date" required>
                    <label>To: </label>
                    <input name="to" type="date" required>
                    <button class="py-2 px-4 bg-gray-500 hover:bg-red-600 text-white rounded-xl shadow " type="submit" >Delete By Date</button>

                    </form>

                    </div>

<div class="mt-5 md:mt-0 md:col-span-2">
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

                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"><input type="checkbox" id="master"></th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Question Title
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Created By
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Answers
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            created Date
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">view</span>
                                            <span class="sr-only">Edit</span>
                                            <span class="sr-only">Delete</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    @forelse ($questions as $question )


                                    <tr id="tr_{{$question->id}}">
                                    <td class="px-6 py-4 text-sm text-gray-900 w-96 max-w-sm truncate"><input type="checkbox" class="sub_chk" data-id="{{$question->id}}"></td>
                                        <td class="px-6 py-4 text-sm text-gray-900 w-96 max-w-sm truncate">
                                            {{ $question->title }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                            {{ $question->user->name ?? "" }}
                                        </td>
                                      
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $question->answers->count() }}

                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                            @if ($question->status == 1 )
                                            <span class="text-sm text-green-900 bg-green-200 px-2 py-1 rounded-xl">
                                                Published
                                            </span>
                                            @endif
                                            @if($question->status == 0)
                                            <span class="text-sm text-gray-900 bg-gray-200 px-2 py-1 rounded-xl">
                                                Draft
                                            </span>
                                            @endif
                                            @if($question->status == 2)
                                            <span class="text-sm text-gray-900 bg-red-100 px-2 py-1 rounded-xl">
                                                Declined
                                            </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $question->created_at }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                            <a href="{{ route('questions.show', $question->id) }}" class="text-blue-600 m-1 hover:text-blue-900">View</a>
                                             <a href="{{ route('questions.edit', $question->id) }}" class="text-indigo-600 m-1 hover:text-indigo-900">Edit</a> 
                                            <form action="{{ route('questions.destroy', $question->id) }}" class="inline" method="post" onsubmit="return confirm('Are you sure you want to delete this Question?')">
                                                @csrf
                                                @method('delete')
                                                <button class="text-red-600 m-1 hover:text-red-900">
                                                    Delete
                                                </button>
                                            </form>
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
                <div class="my-4">
                    {{ $questions->links() }}
                </div>
            </div>
          
        </div>
    </div>

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
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                              
                                alert(data['success']);
                                window.location.href = '/admin/forums';
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

</x-app-layout>
