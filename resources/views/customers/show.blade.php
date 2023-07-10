@extends('customers.customers_layout')


@section('customers_card')

    <!-- Content Row -->
    <div class="row">
        <!-- Total Sales -->
        <div class="col-xl-2 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Sales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $totalSales = 0;
                                    foreach($customers->sales as $sale)
                                    {
                                        $totalSales += $sale->items()->sum('total');
                                    }
                                    echo $totalSales;
                                ?>
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
        <div class="col-xl-2 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Purchase</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $totalPurchase = 0;
                                foreach($customers->purchase as $purchase)
                                {
                                    $totalPurchase += $purchase->items()->sum('total');
                                }
                                echo $totalPurchase;
                            ?>
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
        <div class="col-xl-2 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Receipts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalReceipts = $customers->receipts()->sum('amount') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Payments -->
        <div class="col-xl-2 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Payments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPayments = $customers->payments()->sum('amount') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            $totalBalance = ($totalPurchase + $totalReceipts) - ($totalSales + $totalPayments);
        ?>

        <!-- Total Balance -->
        <div class="col-xl-2 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Balance</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @if ($totalBalance >= 0)
                                {{ $totalBalance }}
                                @else
                                    0
                                @endif
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Due -->
        <div class="col-xl-2 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Due</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @if ($totalBalance < 0)
                                {{ $totalBalance }}
                                @else
                                    0
                                @endif
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

@stop

@section('customers_content')

    <div class="col-md-10">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Information of <strong>{{ $customers->name }}</strong></h6>
            </div>
            <div class="card-body">
                <div class="row clearfix justify-content-md-center">
                    <div class="col-md-12">
                        <table class="table table-borderless table-striped">
                            <tr>
                            <th scope="row" class="text-right">Group: </th>
                            <td>{{ $customers->groups->title }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-right">Name: </th>
                                <td>{{ $customers->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-right">Email: </th>
                                <td>{{ $customers->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-right">Phone</th>
                                <td>{{ $customers->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-right">Address: </th>
                                <td>{{ $customers->address }}</td>
                            </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

    


