@extends('layouts.main')

@section('title', "Fish Compactibility")


@section('content')

<div class="container">
    <h3 class=" px-2
            text-uppercase
            text-center
            mt-4
            py-3
            text-white
            
            " style="background-color: #5DA3FA; letter-spacing:.1rem">

        Fish Compatibility Checker
    </h3>


    <div class="row ">
        <div class="col-lg-6 p-2 mx-auto">

            <h3>
                FreshWater Fish
            </h3>
            <form action="{{ route('fish.check', 1) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="freshfish" class="form-label">Select Fishes</label>
                    <select required name="fishes[]" id="freshfish" class="form-control" multiple>
                        <option></option>
                        @foreach (\App\Models\Category::find(1)->fishes as $fish)
                        <option value="{{ $fish->id }}">{{ $fish->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button class="btn btn-outline-primary px-4 py-1 rounded-pill" type="submit">
                        Check
                    </button>
                </div>
            </form>
            @isset($category)

            @if($category->id == 1)
            @isset($fishes)

            <div class="my-5">
                <h4>Fish Compatibility Result</h4>
                <div>
                    <h6>Legends</h6>
                </div>
                <div class="d-flex justify-content-between align-items-center flex-wrap">

                    <div class="d-flex align-items-center">
                        <div style="width:20px; height:20px; border: 1px solid #000 " class="bg-success m-1">
                        </div>
                        <small>
                            Compatible
                        </small>
                    </div>


                    <div class="d-flex align-items-center">
                        <div style="width:20px; height:20px; border: 1px solid #000 " class="bg-warning m-1">
                        </div>
                        <small>
                            Average
                        </small>
                    </div>

                    <div class="d-flex align-items-center">
                        <div style="width:20px; height:20px; border: 1px solid #000 " class="bg-danger m-1">
                        </div>
                        <small>
                            Not Compatible
                        </small>
                    </div>

                    <div class="d-flex align-items-center">
                        <div style="width:20px; height:20px; border: 1px solid #000 " class="bg-light m-1">
                        </div>
                        <small>
                            No Result
                        </small>
                    </div>
                </div>
                <table class="table table-striped">
                    <tr>
                        <th scope="col"></th>
                        @foreach ($fishes as $fish )
                        <th scope="col">
                            {{ $fish->name }}
                        </th>
                        @endforeach
                    </tr>
                    @foreach ($fishes as $fish )
                    <tr>
                        <th scope="row">
                            {{ $fish->name }}
                        </th>
                        @foreach ($fishes as $compactibleFish )
                        <td scope="col">

                            @if($compactibleFish->compactibilities()->where('compactible_fish_id', $fish->id)->where('compactibility_id', 1)->first())

                            <div style="width:40px; height:40px; border: 1px solid #e6e6e6 " class="bg-success">
                            </div>

                            @elseif($compactibleFish->compactibilities()->where('compactible_fish_id', $fish->id)->where('compactibility_id', 2)->first())

                            <div style="width:40px; height:40px; border: 1px solid #e6e6e6 " class="bg-warning">
                            </div>
                            @elseif($compactibleFish->compactibilities()->where('compactible_fish_id', $fish->id)->where('compactibility_id', 3)->first())

                            <div style="width:40px; height:40px; border: 1px solid #e6e6e6 " class="bg-danger">
                            </div>

                            @else
                            <div style="width:40px; height:40px; border: 1px solid #e6e6e6 " class="bg-light">
                            </div>

                            @endif


                        </td>
                        @endforeach
                    </tr>
                    @endforeach

                </table>
            </div>
            @endisset
            @endif
            @endisset


        </div>
        <div class="col-lg-6 p-2 mx-auto">

            <h3>
                SaltWater Fish
            </h3>
            <form action="{{ route('fish.check',2 ) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="saltfish" class="form-label">Select Fishes</label>
                    <select required name="fishes[]" id="saltfish" class="form-control" multiple>
                        <option></option>
                        @foreach (\App\Models\Category::find(2)->fishes as $fish)
                        <option value="{{ $fish->id }}">{{ $fish->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button class="btn btn-outline-primary px-4 py-1 rounded-pill" type="submit">
                        Check
                    </button>
                </div>

            </form>

            @isset($category)

            @if($category->id == 2)
            @isset($fishes)

            <div class="my-5">
                <h4>Fish Compatibility Result</h4>
                        <div>
                            <h6>Legends</h6>
                        </div>
                        <div class="d-flex justify-content-between align-items-center flex-wrap">

                            <div class="d-flex align-items-center">
                                <div style="width:20px; height:20px; border: 1px solid #000 " class="bg-success m-1">
                                </div>
                                <small>
                                    Compatible
                                </small>
                            </div>


                            <div class="d-flex align-items-center">
                                <div style="width:20px; height:20px; border: 1px solid #000 " class="bg-warning m-1">
                                </div>
                                <small>
                                    Average
                                </small>
                            </div>

                            <div class="d-flex align-items-center">
                                <div style="width:20px; height:20px; border: 1px solid #000 " class="bg-danger m-1">
                                </div>
                                <small>
                                    Not Compatible
                                </small>
                            </div>

                            <div class="d-flex align-items-center">
                                <div style="width:20px; height:20px; border: 1px solid #000 " class="bg-light m-1">
                                </div>
                                <small>
                                    No Result
                                </small>
                            </div>
                        </div>

                <table class="table table-striped">
                    <tr>
                        <th scope="col"></th>
                        @foreach ($fishes as $fish )
                        <th scope="col">
                            {{ $fish->name }}
                        </th>
                        @endforeach
                    </tr>
                    @foreach ($fishes as $fish )
                    <tr>
                        <th scope="row">
                            {{ $fish->name }}
                        </th>
                        @foreach ($fishes as $compactibleFish )
                        <td scope="col">

                            @if($compactibleFish->compactibilities()->where('compactible_fish_id', $fish->id)->where('compactibility_id', 1)->first())

                            <div style="width:40px; height:40px; border: 1px solid #e6e6e6" class="bg-success">

                            </div>

                            @elseif($compactibleFish->compactibilities()->where('compactible_fish_id', $fish->id)->where('compactibility_id', 2)->first())

                            <div style="width:40px; height:40px; border: 1px solid #e6e6e6" class="bg-warning">

                            </div>
                            @elseif($compactibleFish->compactibilities()->where('compactible_fish_id', $fish->id)->where('compactibility_id', 3)->first())

                            <div style="width:40px; height:40px; border: 1px solid #e6e6e6" class="bg-danger">

                            </div>

                            @else
                            <div style="width:40px; height:40px; border: 1px solid #e6e6e6" class="bg-light">

                            </div>

                            @endif


                        </td>
                        @endforeach
                    </tr>
                    @endforeach

                </table>
            </div>
            @endisset
            @endif
            @endisset


        </div>
    </div>
</div>

@endsection
