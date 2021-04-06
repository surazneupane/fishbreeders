<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $post->title }} - {{ __('Post Detail') }}
            </h2>
            <a href="{{ route('posts.index') }}" class="px-2 py-1 bg-gray-500 text-white rounded hover:bg-gray-800"> Go
                Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <h1 class="pb-4 text-2xl capitalize text-gray-700 ">{{ $post->title }}</h1>
                <hr class="border-2 w-100 mb-5 ">
                <div class="text-sm my-4">
                    <p>
                        Author : {{ $post->author }}
                    </p>
                    <p>
                        Posted by : {{ $post->user->name }}
                    </p>
                    <p>
                        created date : {{ $post->created_at }}
                    </p>
                    <p>
                        status : @if ($post->status)
                        Published
                        @else
                        Draft
                        @endif
                    </p>
                    <p>
                        Views : {{ $post->views }}
                    </p>
                    <p>
                        Share : {{ $post->share }}
                    </p>
                    <p>
                        Tag : {{ $post->tag }}
                    </p>
                </div>
                <hr class="border-2 w-100 mb-5 ">
                <div class="my-4">
                    <h5 class="text-sm">Categories</h5>
                    <ol class="text-sm list-decimal px-8 pt-3">
                        @foreach ($post->categories as $category)
                        <li class="text-sm">{{ $category->title }}</li>

                        @endforeach
                    </ol>
                </div>
                <hr class="border-2 w-100 mb-5 ">
                <div class="my-4 text-sm">
                    <h5>SEO Details</h5>

                    <div class="px-4 pt-3">
                        <p>
                            Title : {{ $post->seo_title }}
                        </p>
                        <p>
                            Description : {{ $post->seo_description }}
                        </p>
                        <p>
                            Keywords : {{ $post->seo_keywords }}
                        </p>
                    </div>
                </div>
                <hr class="border-2 w-100 mb-5 ">
                <div class="my-4">
                    <p class="text-sm">
                        {{ $post->excerpt }}
                    </p>
                </div>
                <hr class="border-2 w-100 mb-5 ">
                <div class="my-4">
                    <h5 class="text-sm">Featured Image</h5>
                    <img src="{{ $post->featured_image }}" alt="" class="w-full h-48 object-contain">
                </div>
                <hr class="border-2 w-100 mb-5 ">
                <div>
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>