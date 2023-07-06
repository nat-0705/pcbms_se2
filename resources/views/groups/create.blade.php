 @extends('layout.main')

 @section('main_content')

 @if ($errors->any())
 <div class="alert alert-danger">
     <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
     </ul>
 </div>
@endif

 <div class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Group Name</p>
                    <form class="mx-1 mx-md-4" method="POST" action=" {{ url('groups') }}">
                        @csrf
                        <div class="d-flex flex-row align-items-center mb-3">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input type="title" name="title" class="form-control" id="title" placeholder="Group">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
 @stop
 
     
 
 
 {{-- @extends('layout.main')

@section('main_content')

<h2>Create Group</h2>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">New Group</h6>
    </div>
    <div class="card-body">
        <div class="justified-content-md-center">
            <form method="POST" action=" {{ url('groups') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Group</label>
                        <input type="title" name="title" class="form-control" id="title" placeholder="Enter Group">
                    <small id="titleHelp" class="form-text text-muted">Enter your Group Name.</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@stop
 --}}