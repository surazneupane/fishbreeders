
<?php
if(!isset($searchedCategory)){
  $searchedCategory=[];
}
if(!isset($searchedSubCategory))
{
  $searchedSubCategory=[];
}
?>

<div class="col">
    @if(Auth::check())
    <div>
        <button href="#" class="btn btn-success w-100 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ask Question
        </button>
    </div>
    @endif
    <div>
        <form method="get" action={{ route('forums') }}>

        <select type="text" name="category[]" class="category" class="m-1 form-control"  multiple>
           <option></option>
                @foreach ($forumMainCat as $category)
                     <option value="{{ $category->slug }}"
                     @if(in_array($category->slug,$searchedCategory))
                      selected
                     @endif
                     >
                       {{ $category->title }}
                      </option>
                     @endforeach
                      </select>
                      <br>
                      <br>
                      <select type="text" name="subcategory[]" class="subcategory" class="form-control" multiple>
                 <option></option>
                @foreach ($forumSubCat as $category)
                     <option value="{{ $category->slug }}"

                     @if(in_array($category->slug,$searchedSubCategory))
                      selected
                     @endif
                     >
                       {{ $category->title }}
                      </option>
                     @endforeach
                      </select>
                      <br>
                      <br>

            <input value="{{ request('date') }}" type="date" name="date" class=" form-control" placeholder="Search By Date">
            <br>
  
            <input value="{{ request('query') }}" type="text" name="query" class=" form-control"
                placeholder="Query here..." />
            <div class="d-flex justify-content-end py-1">
                <button class="btn btn-primary m-0">
                    Search
                </button>
            </div>
        </form>
    </div>
    <!-- <div>
        <h5>Tags</h5>
        <ul class="list-unstyled px-2">
            <li>
                <a href="{{ route('forums') }}" class="btn btn-transparent text-capitalize w-100 bg-white">
                    All
                </a>
            </li>
            @foreach ($forumMainCat as $category)
            <li>
                <a href="{{ route('forums',['name'=>$category->slug]) }}"
                    class="btn btn-transparent text-capitalize w-100">
                    {{ $category->title }}
                </a>
            </li>
            @endforeach
        </ul>
    </div> -->
</div>

<!-- Modal -->

<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ask Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.forum.ask')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="form-group py-3">
                        <label for="category">Category</label>
                        <div>
                            <select name="category[]" id="category" class="form-control" required multiple>
                                <option></option>
                                @foreach ($forumMainCat as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group py-3">
                        <label for="category">Sub Category</label>
                        <div>
                            <select name="subcategory[]" id="subcategory" class="form-control"  multiple>
                                <option></option>
                                @foreach ($forumSubCat as $sub)
                                <option value="{{ $sub->id }}">
                                    {{ $sub->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-success my-2">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    
</div>



<!-- success modal -->
@if(Session::has('success'))


<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 200px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 50%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 10px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>
</head>
<body>


<!-- Trigger/Open The Modal -->
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
    </div>
    <div class="modal-body">
      <p>{{Session::get('success')}}</p>
      <p>Thank You , Fish Breeders Team .</p>
    </div>
    <div class="modal-footer">
    <button id="myBtn"> Okay</button>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 

  modal.style.display = "block";


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

btn.onclick = function() {
  modal.style.display = "none";
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>



@endif