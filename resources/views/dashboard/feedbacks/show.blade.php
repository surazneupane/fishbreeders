<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $feedback->title }} - {{ __('Question Detail') }}
            </h2>
            <a href="" class="px-2 py-1 bg-gray-500 text-white rounded hover:bg-gray-800"> Go
                Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <h1 class="pb-4 text-2xl capitalize text-gray-700 ">{{ $feedback->title }}</h1>
                <hr class="border-2 w-100 mb-5 ">
                <div class="text-sm my-4">
                    <p>
                        Description : {{ $feedback->feedback }}
                    </p>
                <hr class="border-2 w-100 mb-5 ">

                    <p>
                        Posted by : 
                         @if($feedback->user_id == null)
                        Guest
                        
                        @else
                        {{$feedback->user->name}}
                        @endif
                    </p>
                <hr class="border-2 w-100 mb-5 ">

                    <p>
                        created date : {{ $feedback->created_at }}
                    </p>
                <hr class="border-2 w-100 mb-5 ">
                 
             Email:   {{$feedback->email}}
                   
               
                  
                </div>
                
              
           
               
            </div>
        </div>
    </div>
</x-app-layout>