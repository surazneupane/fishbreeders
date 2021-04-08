@extends('layouts.main')

@section('content')

<section style="background-color: #f1f3f5" class="py-4">
    <div class="container">

        <div class="row">
            <div class="col-md-9">

                <div class="text-center bg-white py-4">
                    <h4 class="text-center">
                        {{ $question->title }}
                    </h4>
                    <div class="d-flex justify-content-center align-items-center">
                        <small>Asked
                            {{ $question->created_at->diffForHumans()}}
                        </small>
                        <small style=" border-left: 2px solid #999; border-right: 2px solid #999;" class="px-2 mx-2">
                            Asked by {{ $question->user->name ?? "unkown"}}
                        </small>
                        <small>
                            Viewed {{ $views }}
                        </small>
                    </div>
                </div>
                <div class=" bg-white p-2 py-2">
                    {!! $question->description !!}
                </div>
                <div class="p-2  mb-4 bg-white">
                    <div class="d-flex align-items-center justify-content-between">
                        <livewire:react-action :item="$question" likes="3" dislikes="1" />
                        <div class="text-muted">
                            {{ $question->answers->count() }} Answers
                        </div>
                    </div>
                </div>

                <div>

                    <div class="px-1">
                        @if (Auth::check())
                        <h5>
                            Give Your Answer
                        </h5>
                        <form action="{{route('user.forum.giveans',$question->id)}}" method="POST">
                            @csrf
                            @if($errors->has('answer'))
                            <label for="error" class="alert alert-danger">{{$errors->first('answer')}}*</label>

                            @endif

                            @if(Session::has('error'))
                            <label for="error" class="alert alert-danger">{{Session::get('error')}}*</label>

                            @endif

                            @if(Session::has('success'))
                            <label for="error" class="alert alert-success">{{Session::get('success')}}*</label>

                            @endif
                            <div class="form-group">

                                <label for="answer">Answer</label>
                                <textarea name="answer" placeholder="Your Answer Here" class="form-control"
                                    rows="5"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-success my-2">Submit</button>
                            </div>
                        </form>
                        @else
                        <div class="text-center">
                            <h5 class="text-primary">
                                You Must Login/sign-up to Answer
                            </h5>
                            <a href="{{ route('ext-login') }}">Login</a>
                        </div>
                        @endif
                    </div>
                    <h4 class="px-2">Answers</h4>
                    @foreach($answers as $answer)
                    <div class="card my-3">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div>
                                @isset($answer->user->name)
                                <img src="{{$answer->user->profile_photo_url}}" alt="" width="40" height="40"
                                    class="img-fluid rounded-circle">
                                @endisset
                                <span class="px-2">
                                    {{$answer->user->name ?? "unknown"}}
                                </span>
                            </div>
                            <div class="text-muted">
                                {{-- answer created time --}}
                                {{ $answer->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{$answer->description}}
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            <div class="d-flex align-items-center justify-content-between">
                                <livewire:react-action :item="$answer" likes="3" dislikes="1" />
                                @if(Auth::id() == $answer->user_id || Auth::id() == $question->user_id)
                                <form onsubmit="return deleteAnswer();"
                                    action="{{route('user.forum.deleteans',$answer->id)}}" method="POST">
                                    @csrf
                                    <button class="btn text-primary shadow-none" type="submit">Delete
                                    </button>
                                </form>

                                @endif


                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            @include('_include.forum-sidebar')
        </div>
    </div>
</section>

<script type="text/javascript">
    function   deleteAnswer()
    {
      return  confirm('Are You Sure?');
    }
    
</script>


@endsection