@extends('customers.customers_layout')

@section('customers_content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sales of <strong>{{ $customers->name }}</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Bank Number</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers->sales as $sale)
                            <tr>
                                <td>{{ $customers->name}}</td>
                                <td>{{ $sale->bank_no }}</td>
                                <td>{{ $sale->date }}</td>
                                <td>{{ $sale->items()->sum('quantity') }}</td>
                                <td>{{ $sale->items()->sum('total') }}</td>
                                <td class="text-right">
                                    <form method="post" action="{{ route('customers.sales.destroy',[$customers->id, $sale->id]) }}">
                                        <a href="{{ route('customers.sales.show',[$customers->id, $sale->id]) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @if ($sale->items()->sum('quantity') == 0 &&
                                             $customers->receipts()->count() == 0
                                        )
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure?')"><i class="fa fa-trash"></i></button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@stop

    


