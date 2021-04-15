<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-3 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ _('Edit Category') }}</h3>
                            <p class="mt-1 text-sm text-gray-600">
                              <strong> {{$category->title}} </strong>
                            </p>
                        </div>
                    </div>
                  
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        @if(Session::has('success'))
                     <p style="color: green">   {{Session::get('success')}} </p>
                        @endif
                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <input type="text" hidden name="id" id="id" value="{{ $category->id }}" />
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="title"
                                                class="block text-sm font-medium text-gray-700">{{ _('Category Title*') }}</label>
                                            <input type="text" name="title" id="title" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                                @error('title')border-red-400 @enderror
                                                " value="{{ $category->title }}">
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
                                                " value="{{ $category->slug }}">
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
                                            <option value="1" {{ $category->status == "1" ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $category->status == "0" ? 'selected' : '' }}>In-Active
                                            </option>
                                        </select>
                                        @error('status')
                                        <span class="text-sm text-red-500">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="show_in_header"
                                            class="block text-sm font-medium text-gray-700">{{ _('Show in header') }}</label>
                                        <select id="show_in_header" name="show_in_header" autocomplete="show_in_header"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="0" {{ $category->show_in_header == "0" ? 'selected': '' }}>NO
                                            </option>
                                            <option value="1" {{ $category->show_in_header == "1" ? 'selected': '' }}>
                                                YES
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="show_in_footer"
                                            class="block text-sm font-medium text-gray-700">{{ _('Show in footer') }}</label>
                                        <select id="show_in_footer" name="show_in_footer" autocomplete="show_in_footer"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="0" {{ $category->show_in_footer == "0" ? 'selected': '' }}>NO
                                            </option>
                                            <option value="1" {{ $category->show_in_footer == "1" ? 'selected': '' }}>
                                                YES
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="order"
                                            class="block text-sm font-medium text-gray-700">{{ _('Order No.') }}</label>
                                        <input type="number" min="0" name="order" id="order" autocomplete="order"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            value="{{ $category->order }}">
                                    </div>
                                 
                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="post_content" class="block text-sm font-medium text-gray-700">{{ _('Post Content*') }}
                                            @error('post_content')
                                            <span class="text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                            @enderror</label>
                                        <textarea type="text" name="post_content" id="post_content" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                            @error('post_content')border-red-400 @enderror
                                            " rows=10>{{$category->post_content}}</textarea>

                                    </div>

                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 flex justify-between sm:px-6">
                                <a href="{{ route('category.index') }}"
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

    <script>
        tinymce.init({
            selector: '#post_content'
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