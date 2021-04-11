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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
              @if(Session::has('success'))
              <p style="color: green"> {{Session::get('success')}}</p>
              @endif
                <h1 class="pb-4 text-2xl capitalize text-gray-700 ">{{ $fish->name }}</h1>
                <hr class="border-2 w-100 mb-5 ">
                <div class="text-sm my-4">
                    <p>
                        Fish Type : {{$fishCategory->title}}
                    </p>
                <hr class="border-2 w-100 mb-5 ">

                    <p>
                        Created At : {{ $fish->created_at }}
                    </p>

                
                 
                    
               
                  
                </div>

                <?php $alreadyAssigned = $fish->compactibilities();
                ?>
                <hr class="border-2 w-100 mb-5 ">
                <h1 class="pb-4 text-2xl capitalize text-gray-700 ">Fish Compactibilities</h1>
<form method="POST" action="{{route('fish.savecompactibility',$fish->id)}}">
    @csrf
                <div class="col-span-6 sm:col-span-6">
                    <label for="category"
                        class="block text-sm font-medium text-gray-700">{{ _('Compactibles') }}</label>
                    <select type="text" name="compactible[]" id="category1"
                        class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('category')border-red-400 @enderror "
                        multiple>
                        @foreach ($selectFishes as $selectfish)
                            
                        <option value="{{$selectfish->id}}" @if($fish->compactibilities()->where('compactibility_id',1)->where('compactible_fish_id',$selectfish->id)->first()) selected @endif>{{$selectfish->name}}</option>
                        @endforeach
                      
                    </select>
                    @error('category')
                    <span class="text-sm text-red-500">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="col-span-6 sm:col-span-6">
                    <label for="category"
                        class="block text-sm font-medium text-gray-700">{{ _('Moderate') }}</label>
                    <select type="text" name="moderate[]" id="category2"
                        class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('category')border-red-400 @enderror "
                        multiple>
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


                <div class="col-span-6 sm:col-span-6">
                    <label for="category"
                        class="block text-sm font-medium text-gray-700">{{ _('Incompactible') }}</label>
                    <select type="text" name="incompactible[]" id="category3"
                        class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('category')border-red-400 @enderror "
                        multiple>
                        @foreach ($selectFishes as $selectfish)
                        <option value="{{$selectfish->id}}"  @if($fish->compactibilities()->where('compactibility_id',3)->where('compactible_fish_id',$selectfish->id)->first()) selected @endif>{{$selectfish->name}}</option>
                        @endforeach
                      
                    </select>
                    @error('category')
                    <span class="text-sm text-red-500">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                placeholder: "Select Fishes",
                multiple: true,
                theme: "classic"
            });

            $('#category2').select2({
                placeholder: "Select Fishes",
                multiple: true,
                theme: "classic"
            });

            $('#category3').select2({
                placeholder: "Select Fishes",
                multiple: true,
                theme: "classic"
            });
        });
</script>