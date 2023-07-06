@extends('layout.primary')

@section('page_body')

<div class="container mt-5">
    
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">{{ $headline }}</p>
                                </div>
                                    {!! Form::open(['route' => 'login.confirm',  'method' => 'POST', 'class' => 'user']) !!}
                                        <div class="form-group">
                                            {{ Form::text('email', NULL, ['class' => 'form-control form-control-user', 'id' => 'email', 'placeholder' => 'Enter Email Address...']); }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::password('password', ['class' => 'form-control form-control-user', 'id' => 'password', 'placeholder' => 'Password']); }}
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
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

    


