<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $question->title }} - {{ __('Question Detail') }}
            </h2>
            <a href="{{ route('forums.index') }}" class="px-2 py-1 bg-gray-500 text-white rounded hover:bg-gray-800"> Go
                Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <h1 class="pb-4 text-2xl capitalize text-gray-700 ">{{ $question->title }}</h1>
                <hr class="border-2 w-100 mb-5 ">
                <div class="text-sm my-4">
                    <p>
                        Author : {{ $question->description }}
                    </p>
                <hr class="border-2 w-100 mb-5 ">

                    <p>
                        Posted by : {{ $question->user->name }}
                    </p>
                <hr class="border-2 w-100 mb-5 ">

                    <p>
                        created date : {{ $question->created_at }}
                    </p>
                <hr class="border-2 w-100 mb-5 ">
                 
                    <p>
                        Views : {{ $question->views->count() }}
                    </p>
                <hr class="border-2 w-100 mb-5 ">
                <p>
                    Tags : @foreach($question->categories()->get() as $tag) 
                    {{ $tag->title .',' }} 
                    @endforeach
                </p>
                  
                </div>
                <hr class="border-2 w-100 mb-5 ">
                <div class="my-4">
                    <h5 class="text-sm">Answers</h5>
                    <ol class="text-sm list-decimal px-8 pt-3">
                        @foreach ($question->answers as $answer)
                        <li class="text-sm">{{ $answer->description }}</li>
                        <hr class="border-2 w-100 mb-5 ">
             

                        @endforeach
                    </ol>
                </div>
              
           
               
            </div>
        </div>
    </div>
</x-app-layout>