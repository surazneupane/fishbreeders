<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Category Forum') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-3 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ _('New Forum Category') }}</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Create A New Category On Forum
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('forumcategory.store') }}" method="POST">
                            @csrf
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="title"
                                                class="block text-sm font-medium text-gray-700">{{ _('Category Title*') }}</label>
                                            <input type="text" name="title" id="title" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                                @error('title')border-red-400 @enderror
                                                " value="{{ old('title') }}">
                                            @error('title')
                                            <span class="text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="slug"
                                                class="block text-sm font-medium text-gray-700">{{ _('Slug*') }}</label>
                                            <input type="text" name="slug" id="slug" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                        @error('slug') border-red-400 @enderror
                                                " value="{{ old('slug') }}">
                                            @error('slug')
                                            <span class="text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                     
                                     
                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="status"
                                            class="block text-sm font-medium text-gray-700">{{ _('Status') }}</label>
                                        <select id="status" name="status" autocomplete="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                                                @error('status') border-red-500  @enderror
                                                ">
                                            <option value="1" {{ old('status') == "1" ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ old('status') == "0" ? 'selected' : '' }}>In-Active
                                            </option>
                                        </select>
                                        @error('status')
                                        <span class="text-sm text-red-500">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                


                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <a href="{{ route('forumcategory.index') }}"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Back</a>
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
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


