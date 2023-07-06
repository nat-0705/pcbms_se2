@extends('layout.main')

@section('main_content')

<div class="row clearfix page_header">
    <div class="col-md-4">
        <h2>Sales</h2>
    </div>
    <div class="col-md-8 text-right">
        {!! Form::open(['route' => 'report.sales',  'method' => 'get']) !!}
        <div class="form-row align-items-center">
            <div class="col-auto">
                {{ Form::date('start_date', $start_date, ['class' => 'form-control', 'id' => 'start_date', 'placeholder' => 'Date', 'required']); }}
            </div>
            <div class="col-auto">
                <div class="input-group mb-2">
                    {{ Form::date('end_date', $end_date, ['class' => 'form-control', 'id' => 'end_date', 'placeholder' => 'Date', 'required']); }}
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sales Report: <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Products</th>
                        <th>Quantity</th>
                        <th class="text-right">Price</th>
                        <th>Total</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)

                        <tr>
                            <td>{{ $sale->date }}</td>
                            <td>{{ $sale->title }}</td>
                            <td>{{ $sale->quantity }}</td>
                            <td class="text-right">{{ $sale->price }}</td>
                            <td>{{ $sale->total }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-right" colspan="2">Total Items:</td>
                        <td>{{ $sales->sum('quantity') }}</td>
                        <td class="text-right">Total:</td>
                        <td>{{ $sales->sum('total') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@stop

    


