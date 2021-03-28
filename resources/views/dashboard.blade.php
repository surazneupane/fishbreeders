<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <h1 class="pb-4 text-2xl capitalize text-gray-700 ">hello Nepal News Portal</h1>
                <hr class="border-2 w-100 mb-5 ">

                <div class="flex">
                    <div class="bg-green-500 rounded-2xl w-64 p-4 m-4 ">
                        <div class="text-white font-bold text-2xl uppercase">
                            @lang("Posts")
                        </div>
                        <hr class="border-1 w-100 my-4 border-white ">
                        <div class="text-white font-black text-xl text-right">
                            {{ $posts }}
                        </div>
                    </div>
                    <div class="bg-blue-500 rounded-2xl w-64 p-4 m-4 ">
                        <div class="text-white font-bold text-2xl uppercase">
                            @lang("Categories")
                        </div>
                        <hr class="border-1 w-100 my-4 border-white ">
                        <div class="text-white font-black text-1xl text-right">
                            {{ $categories }}
                        </div>
                    </div>
                    <div class="bg-gray-500 rounded-2xl w-64 p-4 m-4 ">
                        <div class="text-white font-bold text-2xl uppercase">
                            @lang("Users")
                        </div>
                        <hr class="border-1 w-100 my-4 border-white ">
                        <div class="text-white font-black text-1xl text-right">
                            {{ $users }}
                        </div>
                    </div>
                    <div class="bg-indigo-500 rounded-2xl w-64 p-4 m-4 ">
                        <div class="text-white font-bold text-2xl uppercase">
                            @lang("Views")
                        </div>
                        <hr class="border-1 w-100 my-4 border-white ">
                        <div class="text-white font-black text-1xl text-right">
                            200
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>