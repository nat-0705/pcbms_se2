@extends('layout.main')

@section('main_content')

<div class="row clearfix page_header">
    <div class="col-md-6">
        <h2>Products</h2>
    </div>
    <div class="col-md-6 text-right">
        <a class="btn btn-info" href="{{ route('products.create') }}"> <i class="fa fa-plus"></i> New Products</a>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categories</th>
                        <th>Title</th>
                        <th>Purchase</th>
                        <th>Sales</th>
                        <th>Stocks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->categories->title }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $purchase = $product->purchaseItems()->sum('quantity') }}</td>
                            <td>{{ $sales = $product->saleItems()->sum('quantity') }}</td>
                            <td>{{ $purchase - $sales }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop

    


