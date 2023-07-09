@extends('layout.main')

@section('main_content')

    <div class="row clearfix page_header">
        <div class="col-sm-6">
            <div class="btn-group">
                <div class="dropdown mb-4">
                    <button class="btn btn-primary dropdown-toggle" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Filter By Group
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('customers.index') }}">All Customers</a>
                        @foreach ($groups as $group)
                            <a class="dropdown-item" href="{{ route('customers.index') }}?groups={{ $group->id }}">{{ $group->title }}</a>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 text-right">
            <a class="btn btn-info" href="{{ url('customers/create') }}"> <i class="fa fa-plus"></i> New Customer</a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customers Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Group</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th class="text-right">Sales</th>
                            <th class="text-right">Purchase</th>
                            <th class="text-right">Receipts</th>
                            <th class="text-right">Payments</th>
                            <th class="text-right">Balance</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $totalSales = 0;
                            $totalPurchase = 0;
                            $totalReceipts = 0;
                            $totalPayments = 0;
                            $totalBalance = 0;
                        ?>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->groups->title }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->phone }}</td>
                                <th class="text-right">
                                    <?php
                                        $sales = $customer->saleItems()->sum('total');
                                        $totalSales += $sales;
                                        echo number_format($sales, 2);
                                    ?>
                                </th>
                                <th class="text-right"> 
                                    <?php
                                        $purchase = $customer->purchaseItems()->sum('total');
                                        $totalPurchase += $purchase;
                                        echo number_format($purchase, 2);
                                    ?>
                                </th>
                                <th class="text-right">
                                    <?php
                                        $receipts = $customer->receipts()->sum('amount');
                                        $totalReceipts += $receipts;
                                        echo number_format($receipts, 2);
                                    ?>  
                                </th>
                                <th class="text-right">
                                    <?php
                                        $payments = $customer->payments()->sum('amount');
                                        $totalPayments += $payments;
                                        echo number_format($payments, 2);
                                    ?> 
                                </th>
                                <td class="text-right">
                                    <?php
                                        $balance = ($sales+$payments)-($purchase + $receipts);
                                        $totalBalance += $balance;
                                        echo number_format($balance, 2);
                                    ?>  
                                </td>
                                <td class="text-right">
                                    <form method="post" action="{{ route('customers.destroy',$customer->id) }}">
                                        <a href="{{ route('customers.show',$customer->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @if (
                                            $customer->sales()->count() == 0 &&
                                            $customer->purchase()->count() == 0 &&
                                            $customer->receipts()->count() == 0 &&
                                            $customer->payments()->count() == 0
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
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-right">Total:</th>
                            <th class="text-right" >{{ number_format($totalSales, 2) }}</th>
                            <th class="text-right">{{ number_format($totalPurchase, 2) }}</th>
                            <th class="text-right">{{ number_format($totalReceipts, 2) }}</th>
                            <th class="text-right">{{ number_format($totalPayments, 2) }}</th>
                            <th class="text-right">{{ number_format($totalBalance, 2) }}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@stop

    


