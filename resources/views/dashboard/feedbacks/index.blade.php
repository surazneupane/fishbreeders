<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feedbacks List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider  ">

                                            Description
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Created By
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($feedbacks as $feedback)


                                    <tr>


                                        <td class="px-6 py-4 whitespace text-gray-500">
                                            {{ $feedback->title }}
                                        </td>

                                        <td class="px-6 py-4 max-w-xs truncate ">




                                            {{$feedback->feedback}}


                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($feedback->user_id == null)
                                            Guest

                                            @else
                                            {{$feedback->user->name}}
                                            @endif


                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{$feedback->email}}


                                        </td>


                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex items-center justify-center">

                                            <a href="{{route('admin.showsinglefeedback',$feedback->id)}}" class="text-blue-600 m-1 hover:text-blue-900">View</a>

                                            <form action="{{route('admin.delete.feedback',$feedback->id)}}" method="post" onsubmit="return confirm('Are you sure you want to delete this Feedback?')" class="m-1">
                                                @csrf

                                                <button class="text-red-600 hover:text-red-900 p-1">
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

                                    <!-- More items... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
