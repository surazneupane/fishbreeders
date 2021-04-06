<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Question
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-3 sm:mt-0">
                <div class=" w-100">

                    <div class="mt-5 md:mt-0 w-100">
                    

                <form action="{{ route('questions.update',$question->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="title"
                                        class="block text-sm font-medium text-gray-700">{{ _('Question Title*') }}</label>
                                    <input type="text" name="title" id="title" value="{{$question->title}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                                @error('title')border-red-400 @enderror
                                                " value="{{ old('title') }}">
                                    @error('title')
                                    <span class="text-sm text-red-500">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-span-6 sm:col-span-6">
                                    <label for="category"
                                        class="block text-sm font-medium text-gray-700">{{ _('Question Categories*') }}</label>
                                    <select type="text" name="category[]" id="category"
                                        class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('category')border-red-400 @enderror "
                                        multiple>
                                        <option></option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if($question->categories->contains($category)) selected @endif>
                                            {{ $category->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="text-sm text-red-500">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="content"
                                        class="block text-sm font-medium text-gray-700">{{ _('Question Description*') }}
                                        </label>
                                    <textarea type="text" name="description" id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                                @error('description')border-red-400 @enderror
                                                " rows=10>{{$question->description}}</textarea>
                                                @error('description')
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
            selector: '#content',
            plugins: 'lists, table code image',
            menubar: false,
            height: 800,
            toolbar: [{
                name: 'history',
                items: ['undo', 'redo']
            }, {
                name: 'styles',
                items: ['styleselect']
            }, {
                name: 'formatting',
                items: ['bold', 'italic', "fontsizeselect"]

            }, {
                name: 'alignment',
                items: ['alignleft', 'aligncenter', 'alignright', 'alignjustify']
            }, {
                name: 'listing',
                items: ['bullist', 'numlist']

            }, {
                name: 'indentation',
                items: ['outdent', 'indent']
            }, {
                name: 'table',
                items: ['table']
            }, {
                name: 'color',
                items: ['forecolor', 'backcolor']
            }, {
                name: 'image',
                items: ['image', 'code']
            }],
            toolbar_mode: 'floating',
            /* without images_upload_url set, Upload tab won't show up*/
            images_upload_url: '/api/upload',
            /* we override default upload handler to simulate successful upload*/
            images_upload_handler: example_image_upload_handler

                ,
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
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
        $(document).ready(function() {
            $('#category').select2({
                placeholder: "Select Categories",
                multiple: true,
                theme: "classic"
            });
        });

    </script>
</x-app-layout>