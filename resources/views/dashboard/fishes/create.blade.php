<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Fish
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-3 sm:mt-0">
                <div class=" w-100">

                    <div class="mt-5 md:mt-0 w-100">
                        @if(Session::has('success'))
                        <label style="color: green">{{Session::get('success')}}</label>

                        @endif
                <form action="{{ route('fishes.store') }}" method="POST" >
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="title"
                                        class="block text-sm font-medium text-gray-700">{{ _('Fish Name*') }}</label>
                                    <input type="text" name="name" id="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                                @error('title')border-red-400 @enderror
                                                " value="{{ old('name') }}">
                                    @error('name')
                                    <span class="text-sm text-red-500">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-span-6 sm:col-span-6">
                                    <label for="category"
                                        class="block text-sm font-medium text-gray-700">{{ _('Fish Categories*') }}</label>
                                    <select type="text" name="category" id="category"
                                        class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('category')border-red-400 @enderror "
                                        >
                                        <option value="fwf">Fresh Water Fish</option>
                                        <option value="swf">Salt Water Fish</option>

                                      
                                        </option>
                                    </select>
                                    @error('category')
                                    <span class="text-sm text-red-500">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                


                            </div>
                        </div>

                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>