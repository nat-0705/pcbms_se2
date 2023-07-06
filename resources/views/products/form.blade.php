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
                    {!! Form::model($products, ['route' => ['products.update', $products->id],  'method' => 'put']) !!}
                  @else
                    {!! Form::open(['route' => 'products.store',  'method' => 'post']) !!}
                  @endif
                           
                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-quote-left fa-lg me-3 fa-fw"></i>
                        <span class="text-danger">*</span>
                        <div class="form-outline flex-fill mb-0 col md-4">
                            {{ Form::text('title', NULL, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Title']); }}
                        </div>
                    </div>
                    

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <span class="text-danger">*</span>
                        <div class="form-outline flex-fill mb-0 col md-4">
                            {{ Form::text('description', NULL, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Description']); }}
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4 ">
                        <i class="fa fa-list fa-lg me-3 fa-fw"></i>
                        <span class="text-danger">*</span>
                        <div class="form-outline flex-fill mb-0 col md-4">
                            {{ Form::select('categories_id', $categories , NULL, ['class' => 'form-control', 'id' => 'categories', 'placeholder' => 'Categories']); }}
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-money-bill-alt fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0 col md-4">
                            {{ Form::text('cost_price', NULL, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Cost Price']); }}
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                          <i class="far fa-money-bill-alt fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0 col md-4">
                            {{ Form::text('price', NULL, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Price']); }}
                          </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4 ">
                      <i class="fa fa-list fa-lg me-3 fa-fw"></i>
                      <span class="text-danger">*</span>
                      <div class="form-outline flex-fill mb-0 col md-4">
                          {{ Form::select('has_stock', ['1' => 'Yes', '0' => 'No'] , 1, ['class' => 'form-control', 'id' => 'categories', 'placeholder' => 'Categories']); }}
                      </div>
                  </div>
    
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
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

    


