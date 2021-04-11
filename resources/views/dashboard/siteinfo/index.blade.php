<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Site Info') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-3 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ _('Update Information') }}</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Edit Site Info
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        @if(Session::has('message'))
                        <div class="text-green-400">
                            {{Session::get('message')}}
                        </div>

                        @endif

                        <form action="{{ route('siteinfo.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="logo"
                                                class="block text-sm font-medium text-gray-700">{{ _('Logo Image') }}</label>
                                            <input type="file" name="logo" id="logo" autocomplete="given-name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                                @error('logo')border-red-400 @enderror
                                                " value="{{ old('logo') }}">
                                            @error('logo')
                                            <span class="text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-span-6">
                                            Current Image:
                                            <img src="{{$siteInfo->logo}}" width="70" style="border-radius: 50%">
                                        </div>
                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="banner"
                                                class="block text-sm font-medium text-gray-700">{{ _('Banner Image') }}</label>
                                            <input type="file" name="banner" id="banner" autocomplete="given-name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                                @error('banner')border-red-400 @enderror
                                                " value="{{ old('banner') }}">
                                            @error('banner')
                                            <span class="text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-span-6">
                                            Current Image:
                                            <img src="{{$siteInfo->banner}}" width="300">
                                        </div>
                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="banner_text"
                                                class="block text-sm font-medium text-gray-700">{{ _('Banner Text*') }}</label>
                                            <input type="text" name="banner_text" id="banner_text"
                                                value="{{$siteInfo->banner_text}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                        @error('banner_text') border-red-400 @enderror
                                                " value="{{ old('banner_text') }}">
                                            @error('banner_text')
                                            <span class="text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-6 ">
                                            <label for="about_us"
                                                class="block text-sm font-medium text-gray-700">{{ _('About Us*') }}</label>
                                            <textarea name="about_us" id="about_us" autocomplete="about_us"
                                                value="{{ old('about_us') }}" rows="10"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{$siteInfo->about_us}}</textarea>
                                            @error('about_us')
                                            <span class="text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="banner_text"
                                                class="block text-sm font-medium text-gray-700">{{ _('Small Banner Text*') }}</label>
                                            <input type="text" name="small_banner_text" id="banner_text"
                                                value="{{$siteInfo->banner_text}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                        @error('banner_text') border-red-400 @enderror
                                                " value="{{ old('small_banner_text') }}">
                                            @error('small_banner_text')
                                            <span class="text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="col-span-6 sm:col-span-6 ">
                                            <label for="about_us"
                                                class="block text-sm font-medium text-gray-700">{{ _('Small Banner Description*') }}</label>
                                            <textarea name="small_banner_description" id="about_us" autocomplete="about_us"
                                                value="{{ old('small_banner_description') }}" rows="10"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{$siteInfo->about_us}}</textarea>
                                            @error('small_banner_description')
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
                                        Update
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