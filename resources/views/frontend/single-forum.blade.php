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

                            <?php $user = $question->user()->first(); ?>

                            @if($user)
                            @if($user->roles->contains(1) || $user->roles->contains(2))
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                              </svg>
                              @endif
                              @endif
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
                        <livewire:react-action :item="$question" likes="{{$question->votes()->where('vote_count',1)->count()}}" dislikes="{{$question->votes()->where('vote_count',-1)->count()}}" />
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
                        @if($errors->has('answer'))
                        <label for="error" class="alert alert-danger">{{$errors->first('answer')}}*</label>

                        @endif

                        @if($errors->has('reply'))
                        <label for="error" class="alert alert-danger">{{$errors->first('reply')}}*</label>
    
                        @endif

                        @if(Session::has('error'))
                        <label for="error" class="alert alert-danger">{{Session::get('error')}}*</label>

                        @endif

                        @if(Session::has('success'))
                        <label for="error" class="alert alert-success">{{Session::get('success')}}*</label>

                        @endif
                        <form action="{{route('user.forum.giveans',$question->id)}}" method="POST">
                            @csrf
                           
                            <div class="form-group">

                                <label for="answer">Answer</label>
                                <textarea required name="answer" placeholder="Your Answer Here" class="form-control"
                                    rows="5"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-success my-2">Submit</button>
                            </div>
                        </form>
                        @else
                        <div class="text-center">
                            <h5 class="text-primary">
                               Login  To Answer
                            </h5>
                            <a href="{{ route('ext-login') }}" class="btn btn-success">Login</a>
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

                                    <?php $user = $answer->user()->first(); ?>

                                    @if($user)
                                    @if($user->roles->contains(1) || $user->roles->contains(2))
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                      </svg>
                                      @endif
                                      @endif
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
                                <livewire:react-action :item="$answer" likes="{{$answer->votes()->where('vote_count',1)->count()}}" dislikes="{{$answer->votes()->where('vote_count',-1)->count()}}" />
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

                    {{-- replies --}}
                  @foreach($answer->replies()->get() as $reply)
                    <div class="card my-3">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div>
                                @isset($reply->user->name)
                                <img src="{{$reply->user->profile_photo_url}}" alt="" width="40" height="40"
                                    class="img-fluid rounded-circle">
                                @endisset
                                <span class="px-2">
                                    {{$reply->user->name ?? "unknown"}}

                                    <?php $user = $reply->user()->first(); ?>

                                    @if($user)
                                    @if($user->roles->contains(1) || $user->roles->contains(2))
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                      </svg>
                                      @endif
                                      @endif
                                </span>
                             
                            </div>
                            
                            <div class="text-muted">
                                {{-- answer created time --}}
                                {{ $reply->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{$reply->description}}
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            <div class="d-flex align-items-center justify-content-between">
                                <livewire:react-action :item="$reply" likes="{{$reply->votes()->where('vote_count',1)->count()}}" dislikes="{{$reply->votes()->where('vote_count',-1)->count()}}" />
                                @if(Auth::id() == $reply->user_id || Auth::id() == $question->user_id || Auth::id() == $answer->user_id)
                                <form onsubmit="return deleteAnswer();"
                                    action="{{route('ext-user.deleteReply',$reply->id)}}" method="POST">
                                    @csrf
                                    <button class="btn text-primary shadow-none" type="submit">Delete
                                    </button>
                                </form>

                                @endif


                            </div>
                        </div>
                    </div>

                        @endforeach

                    @if(Auth::check())
                    <form action="{{route('ext-user.answerReply',$answer->id)}}" method="POST">
                        @csrf
                       
                        <div class="form-group">

                            <label for="answer">Reply </label>
                            <textarea name="reply" placeholder="Reply To Answer" class="form-control"
                                rows="2" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-success my-2">Submit</button>
                        </div>
                    </form>
                    @endif


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