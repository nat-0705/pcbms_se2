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
  
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">{{ $headline }}</p>
                  @if ($mode == 'edit')
                    {!! Form::model($categories, ['route' => ['categories.update', $categories->id],  'method' => 'put']) !!}
                  @else
                    {!! Form::open(['route' => 'categories.store',  'method' => 'post']) !!}
                  @endif
                    
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <span class="text-danger">*</span>
                        <div class="form-outline flex-fill mb-0">
                          {{ Form::text('title', NULL, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Title']); }}
                        </div>
                        
                      </div>
    
                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                      </div>

                    {!! Form::close() !!}

                    
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@stop

    


