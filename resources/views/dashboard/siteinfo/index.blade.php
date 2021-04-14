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
                                            <label for="logo" class="block text-sm font-medium text-gray-700">{{ _('Logo Image') }}</label>
                                            <input type="file" name="logo" id="logo" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
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
                                            <label for="banner" class="block text-sm font-medium text-gray-700">{{ _('Banner Image') }}</label>
                                            <input type="file" name="banner" id="banner" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
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
                                            <label for="banner_text" class="block text-sm font-medium text-gray-700">{{ _('Banner Text*') }}</label>
                                            <input type="text" name="banner_text" id="banner_text" value="{{$siteInfo->banner_text}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                        @error('banner_text') border-red-400 @enderror
                                                " value="{{ old('banner_text') }}">
                                            @error('banner_text')
                                            <span class="text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-6 ">
                                            <label for="about_us" class="block text-sm font-medium text-gray-700">{{ _('About Us*') }}</label>
                                            <textarea name="about_us" id="about_us" autocomplete="about_us" value="{{ old('about_us') }}" rows="10" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{$siteInfo->about_us}}</textarea>
                                            @error('about_us')
                                            <span class="text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="small_banner" class="block text-sm font-medium text-gray-700">{{ _('Small Banner Image') }}</label>
                                            <input type="file" name="small_banner" id="small_banner" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                                @error('small_banner')border-red-400 @enderror
                                                " value="{{ old('small_banner') }}">
                                            @error('small_banner')
                                            <span class="text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-span-6">
                                            Current Image:
                                            <img src="{{$siteInfo->small_banner}}" width="300">
                                        </div>


                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="banner_text" class="block text-sm font-medium text-gray-700">{{ _('Small Banner Text*') }}</label>
                                            <input type="text" name="small_banner_text" id="banner_text" value="{{$siteInfo->banner_text}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                        @error('banner_text') border-red-400 @enderror
                                                " value="{{ old('small_banner_text') }}">
                                            @error('small_banner_text')
                                            <span class="text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="col-span-6 sm:col-span-6 ">
                                            <label for="about_us" class="block text-sm font-medium text-gray-700">{{ _('Small Banner Description*') }}</label>
                                            <textarea name="small_banner_description" id="about_us" autocomplete="about_us" value="{{ old('small_banner_description') }}" rows="10" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{$siteInfo->small_banner_description}}</textarea>
                                            @error('small_banner_description')
                                            <span class="text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>




                                        <div class="col-span-6 sm:col-span-6 ">
                                            <label for="footer_about" class="block text-sm font-medium text-gray-700">{{ _('Footer About*') }}</label>
                                            <textarea name="footer_about" id="footer_about" autocomplete="footer_about" value="{{ old('footer_about') }}" rows="10" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{$siteInfo->footer_about}}</textarea>
                                            @error('footer_about')
                                            <span class="text-sm text-red-500">
                                                {!! $siteinfo->footer_about !!}
                                            </span>
                                            @enderror
                                        </div>




                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
    <script>
        tinymce.init({
            selector: '#about_us,#footer_about'
            , plugins: 'lists, table code image link'
            , menubar: false
            , height: 800
            , toolbar: [{
                name: 'history'
                , items: ['undo', 'redo']
            }, {
                name: 'styles'
                , items: ['styleselect']
            }, {
                name: 'formatting'
                , items: ['bold', 'italic', "fontsizeselect"]

            }, {
                name: 'alignment'
                , items: ['alignleft', 'aligncenter', 'alignright', 'alignjustify']
            }, {
                name: 'listing'
                , items: ['bullist', 'numlist']

            }, {
                name: 'indentation'
                , items: ['outdent', 'indent']
            }, {
                name: 'table'
                , items: ['table']
            }, {
                name: 'color'
                , items: ['forecolor', 'backcolor']
            }, {
                name: 'image'
                , items: ['image', 'code', 'link']
            }]
            , toolbar_mode: 'floating',
            /* without images_upload_url set, Upload tab won't show up*/
            images_upload_url: '/api/upload',
            /* we override default upload handler to simulate successful upload*/
            images_upload_handler: example_image_upload_handler

            , content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });

        function example_image_upload_handler(blobInfo, success, failure, progress) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/api/upload');

            xhr.upload.onprogress = function(e) {
                progress(e.loaded / e.total * 100);
            };

            xhr.onload = function() {
                var json;
                if (xhr.status === 403) {
                    failure('HTTP Error: ' + xhr.status, {
                        remove: true
                    });
                    return;
                }

                if (xhr.status < 200 || xhr.status >= 300) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            xhr.onerror = function() {
                failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        };

    </script>
</x-app-layout>
