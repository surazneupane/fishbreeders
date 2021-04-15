<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $fish->name }} - {{ __('Fish Detail') }}
            </h2>
            <a href="{{ route('fishes.index') }}" class="px-2 py-1 bg-gray-500 text-white rounded hover:bg-gray-800"> Go
                Back</a>
        </div>
    </x-slot>




    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
                @if(Session::has('success'))
                <p style="color: green"> {{Session::get('success')}}</p>
                @endif
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Fish Information
                    </h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Fish name
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $fish->name }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Fish Type
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$fishCategory->title}}
                            </dd>
                        </div>
                    </dl>
                </div>


                <h1 class="pb-4 text-2xl capitalize text-gray-700 px-4 pt-5 ">Fish Compatibility</h1>

                <form method="POST" action="{{route('fish.savecompactibility',$fish->id)}}" class="px-4">

                    @csrf
                    <div class="col-span-6 sm:col-span-6 py-2">
                        <label for="category" class="block text-sm font-bold text-gray-700">{{ _('Compatibles') }}</label>
                        <select type="text" name="compactible[]" id="category1" class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('category')border-red-400 @enderror " multiple>
                            @foreach ($selectFishes as $selectfish)
                            <option value="{{$selectfish->id}}" @if($fish->compactibilities()->where('compactibility_id',1)->where('compactible_fish_id',$selectfish->id)->first()) selected @endif >{{$selectfish->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="text-sm text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-6 py-2">
                        <label for="category" class="block text-sm font-bold text-gray-700">{{ _('Average') }}</label>
                        <select type="text" name="moderate[]" id="category2" class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('category')border-red-400 @enderror " multiple>
                            @foreach ($selectFishes as $selectfish)

                            <option value="{{$selectfish->id}}" @if($fish->compactibilities()->where('compactibility_id',2)->where('compactible_fish_id',$selectfish->id)->first()) selected @endif >{{$selectfish->name}}</option>
                            @endforeach


                        </select>
                        @error('category')
                        <span class="text-sm text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>


                    <div class="col-span-6 sm:col-span-6 py-2">
                        <label for="category" class="block text-sm font-bold text-gray-700">{{ _('Not Compactible') }}</label>
                        <select type="text" name="incompactible[]" id="category3" class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('category')border-red-400 @enderror " multiple>
                            @foreach ($selectFishes as $selectfish)
                            <option value="{{$selectfish->id}}" @if($fish->compactibilities()->where('compactibility_id',3)->where('compactible_fish_id',$selectfish->id)->first()) selected @endif >{{$selectfish->name}}</option>
                            @endforeach

                        </select>
                        @error('category')
                        <span class="text-sm text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="py-3 bg-gray-50 text-right ">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>

                </form>

            </div>


        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        $('#category1').select2({
            placeholder: "Select Fishes"
            , multiple: true
            , theme: "classic"
        });

        $('#category2').select2({
            placeholder: "Select Fishes"
            , multiple: true
            , theme: "classic"
        });

        $('#category3').select2({
            placeholder: "Select Fishes"
            , multiple: true
            , theme: "classic"
        });
    });

</script>
