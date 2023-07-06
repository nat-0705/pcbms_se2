@extends('customers.customers_layout')

@section('customers_content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payments of <strong>{{ $customers->name }}</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Collected By</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Note</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="1" class="text-right">Total: </th>
                            <th>{{ $customers->payments()->sum('amount') }}</th>
                            <th colspan="4"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($customers->payments as $payment)
                            <tr>
                                <td>{{ $customers->name}}</td>
                                <td>{{ $payment->users->name }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->date }}</td>
                                <td>{{ $payment->note }}</td>
                                <td class="text-right">
                                    <form method="post" action="{{ route('customers.payments.destroy',[$customers->id, $payment->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure?')"><i class="fa fa-trash"></i></button>
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

    


