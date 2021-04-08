<div class="col">
    <div>
        <button href="#" class="btn btn-success w-100 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ask Question
        </button>
    </div>
    <div>
        <form method="get" action={{ route('forums') }}>
            <input value="{{ old('query') }}" type="text" name="query" class="m-0 form-control"
                placeholder="Search here..." />
            <div class="d-flex justify-content-end py-1">
                <button class="btn btn-primary m-0">
                    Search
                </button>
            </div>
        </form>
    </div>
    <div>
        <h5>Tags</h5>
        <ul class="list-unstyled px-2">
            <li>
                <a href="{{ route('forums') }}" class="btn btn-transparent text-capitalize w-100 bg-white">
                    All
                </a>
            </li>
            @foreach ($categories as $category)
            <li>
                <a href="{{ route('forums',['name'=>$category->slug]) }}"
                    class="btn btn-transparent text-capitalize w-100">
                    {{ $category->title }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ask Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="form-group py-3">
                        <label for="category">Category</label>
                        <div>
                            <select name="category[]" id="category" class="form-control" multiple>
                                <option></option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-success my-2">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>