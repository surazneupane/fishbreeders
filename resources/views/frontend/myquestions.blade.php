@extends('layouts.main')

@section('content')

<section style="background-color: #f1f3f5" class="py-4">
    <div class="container">
        <h1>Your Questions</h1>
        <div class="row">
            <div class="col-9">


                @foreach ($questions as $forum )

                <div class="card w-100 border-0">
                    <div class="card-body">
                        <a href="{{ route('forums.show', $forum->id) }}"
                            class=" text-decoration-none text-dark card-link  ">
                            <h5 class="card-title">
                                {{ $forum->title }}
                            </h5>
                        </a>
                        <p class="card-text text-truncate text-muted">
                            <small>
                                {{ $forum->description }}
                            </small>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <img src="{{ $forum->user->profile_photo_url }}" alt="" class="rounded-circle"
                                    width="35" />
                                <small class="text-capitalize">
                                    {{ $forum->user->name }}
                                </small>
                                <small class="text-muted">
                                    {{ $forum->created_at->diffForHumans() }}
                                </small>
                                <small class="text-muted">
                                    {{ $forum->answers->count() }} Answers
                                </small>

                                <button class="text-primary" data-bs-toggle="modal"
                                    data-bs-target="#editquestionmodal{{$forum->id}}">
                                    Edit
                                </button>
                                <form onsubmit="return deleteques();" method="POST"
                                    action="{{route('ext-user.myquesdel',$forum->id)}}" style="display: inline">
                                    @csrf
                                    <button class="text-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                            <div class="d-flex">
                                @foreach ($forum->categories->take(3) as $category)
                                <div class="badge bg-success d-flex align-items-center px-2 mx-1">
                                    <span> {{ $category->title }} </span>
                                </div>
                                @endforeach
                            </div>



                        </div>
                    </div>
                </div>

                {{-- Edit Modal --}}
                <div class="modal fade " id="editquestionmodal{{$forum->id}}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('ext-user.myquesedit',$forum->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" value="{{$forum->title}}" name="title"
                                            id="title" required>
                                    </div>
                                    <div class="form-group py-3">
                                        <label for="category">Category</label>
                                        <div>
                                            <select name="category[]" id="category" class="form-control" required
                                                multiple>
                                                <option></option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @if($forum->
                                                    categories->contains($category)) selected @endif>
                                                    {{ $category->title }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="5"
                                            required>{{$forum->description}}</textarea>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-success my-2">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                @endforeach
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function deleteques()
{
    return confirm('Are You Sure To Delete This Question');
}
</script>

@endsection