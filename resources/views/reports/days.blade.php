@extends('layout.main')

@section('main_content')

    <div class="row clearfix page_header">
        <div class="col-md-4">
            <h2>Days Report</h2>
        </div>
        <div class="col-md-8 text-right">
            {!! Form::open(['route' => 'report.days',  'method' => 'get']) !!}
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

    <!-- Content Row -->
    <div class="row">
        <!-- Total Sales -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Sales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($sales->sum('total'), 2) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Purchase -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Purchase</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($purchase->sum('total'), 2) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Receipts -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Receipts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($receipts->sum('amount'), 2) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Payments -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Payments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($payments->sum('amount'), 2) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   

    <!-- DataTales Sales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sales Report: <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Products</th>
                            <th>Quantity</th>
                            <th class="text-right">Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            <tr>
                                <td>{{ $sale->title }}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td class="text-right">{{ number_format($sale->price, 2) }}</td>
                                <td>{{ number_format($sale->total, 2) }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-right" colspan="1">Total Items:</td>
                            <td>{{ number_format($sales->sum('quantity'), 2) }}</td>
                            <td class="text-right">Total:</td>
                            <td>{{ number_format($sales->sum('total'), 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTales Purchase -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Purchase Report: <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Products</th>
                            <th>Quantity</th>
                            <th class="text-right">Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchase as $purchases)
                            <tr>
                                <td>{{ $purchases->title }}</td>
                                <td>{{ $purchases->quantity }}</td>
                                <td class="text-right">{{ number_format($purchases->price, 2) }}</td>
                                <td>{{ number_format($purchases->total, 2) }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-right" colspan="1">Total Items:</td>
                            <td>{{ number_format($purchase->sum('quantity'), 2) }}</td>
                            <td class="text-right">Total:</td>
                            <td>{{ number_format($purchase->sum('total'), 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTales Receipts -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Receipts Report: <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receipts as $receipt)

                            <tr>
                                <td>{{ $receipt->name }}</td>
                                <td>{{ number_format($receipt->amount, 2) }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-right" colspan="1">Total:</td>
                            <td>{{ number_format($receipts->sum('amount'), 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTales Payments -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payments Report: <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)

                            <tr>
                                <td>{{ $payment->name }}</td>
                                <td>{{ number_format($payment->amount, 2) }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-right" colspan="1">Total:</td>
                            <td>{{ number_format($payments->sum('amount'), 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop

    


