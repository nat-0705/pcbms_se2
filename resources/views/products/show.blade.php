@extends('layout.main')

@section('main_content')

<div class="row clearfix page_header">
    <div class="col-md-4">
        <a class="btn btn-primary" href="{{ route('products.index') }}"> <i class="fa fa-arrow-left"></i> Back</a>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $products->name }}</h6>
    </div>
    <div class="card-body">
        <div class="row clearfix justify-content-md-center">
            <div class="col-md-12">
                <table class="table table-borderless table-striped">
                    <tr>
                      <th scope="row" class="text-right">Category: </th>
                      <td>{{ $products->categories->title }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-right">Title: </th>
                        <td>{{ $products->title }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-right">Description: </th>
                        <td>{{ $products->description }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-right">Cost Price</th>
                        <td>{{ $products->cost_price }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-right">Sale Price: </th>
                        <td>{{ $products->price }}</td>
                    </tr>
              </table>
            </div>
        </div>
        
        
    </div>
</div>

@stop

    


