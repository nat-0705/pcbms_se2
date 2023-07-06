@extends('customers.customers_layout')

@section('customers_content')

    <div class="col-md-10">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Purchase Invoice Details</h6>
            </div>

            <div class="card-body">
                <div class="row clearfix justtify-content-md-center">
                    <div class="col-md-6">
                        <div class="no-padding no-margin"> <strong>Customer:</strong> {{ $customers->name }}</div>
                        <div class="no-padding no-margin"> <strong>Email:</strong> {{ $customers->email }}</div>
                        <div class="no-padding no-margin"> <strong>Phone:</strong> {{ $customers->phone }}</div>
                    </div>

                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <div class="no-padding no-margin"> <strong>Date:</strong> {{ $purchase->date }}</div>
                        <div class="no-padding no-margin"> <strong>Bank No:</strong> {{ $purchase->bank_no }}</div>
                    </div>
                </div>
            </div>

            <div class="invoice-items">
                <table class="table">
                    <thead>
                        <th>SL</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th class="text-right">Total</th>
                        <th class="text-right">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($purchase->items as $key => $item)
                            <tr>
                                <td>{{  $key+1 }}</td>
                                <td>{{ $item->products->title }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td class="text-right">{{ $item->total }}</td>
                                <td class="text-right">
                                    <form method="post" action="{{ route('customers.purchase.items.destroy',[$customers->id, $purchase->id, $item->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                        <tr>
                            <th></th>
                            <th>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#productsModal">
                                    <i class="fa fa-plus"></i> Add Items
                                </button>
                            </th>
                            <th colspan="2" class="text-right">Total: </th>
                            <th class="text-right">{{ $totalPurchase = $purchase->items()->sum('total') }}</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#paymentsForInvoiceModal">
                                    <i class="fa fa-plus"></i> Add Payments
                                </button>
                            </th>
                            <th colspan="2" class="text-right">Paid: </th>
                            <th class="text-right">{{ $totalPayments = $purchase->payments->sum('amount') }}</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-right">Due: </th>
                            <th class="text-right">{{ $totalPurchase - $totalPayments }}</th>
                            <th></th>
                        </tr>
                </table>
            </div>

        </div>
    </div>


    <!-- Modal Products -->
    <div class="modal fade" id="productsModal" tabindex="-1" role="dialog" aria-labelledby="productsModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open(['route' => ['customers.purchase.items.store', [$customers->id, $purchase->id]],  'method' => 'post']) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productsModalLongTitle">New Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-users fa-lg me-3 fa-fw"></i>
                                <span class="text-danger">*</span>
                                <div class="form-outline flex-fill mb-0 col md-4">
                                    {{ Form::select('products_id', $products , NULL, ['class' => 'form-control', 'id' => 'products', 'placeholder' => 'Products']); }}
                                </div>
                                </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <span class="text-danger">*</span>
                                <div class="form-outline flex-fill mb-0 col md-4">
                                    {{ Form::text('quantity', NULL, ['class' => 'form-control', 'id' => 'quantity', 'onkeyup' => 'getTotal()', 'placeholder' => 'Quantity', 'required']); }}
                                </div>
                            </div> 

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <span class="text-danger">*</span>
                                <div class="form-outline flex-fill mb-0 col md-4">
                                    {{ Form::text('price', NULL, ['class' => 'form-control', 'id' => 'price', 'onkeyup' => 'getTotal()', 'placeholder' => 'Price', 'required']); }}
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <span class="text-danger">*</span>
                                <div class="form-outline flex-fill mb-0 col md-4">
                                    {{ Form::text('total', NULL, ['class' => 'form-control', 'id' => 'total', 'placeholder' => 'Total', 'required', 'readonly']); }}
                                </div>
                            </div>



                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <!-- Modal Purchase Payments -->
    <div class="modal fade" id="paymentsForInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="paymentsForInvoiceModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open(['route' => ['customers.payments.store', $customers->id, $purchase->id],  'method' => 'post']) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentssModalLongTitle">New Paymentss</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <span class="text-danger">*</span>
                                <div class="form-outline flex-fill mb-0 col md-4">
                                    {{ Form::text('amount', NULL, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => 'Amount', 'required']); }}
                                </div>
                            </div> 

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <span class="text-danger">*</span>
                                <div class="form-outline flex-fill mb-0 col md-4">
                                    {{ Form::date('date', NULL, ['class' => 'form-control', 'id' => 'date', 'placeholder' => 'Date', 'required']); }}
                                </div>
                            </div> 

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0 col md-4">
                                    {{ Form::textarea('note', NULL, ['class' => 'form-control', 'id' => 'note', 'rows' => '3', 'placeholder' => 'Note']); }}
                                </div>
                            </div> 


                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script type="text/javascript">
        function getTotal(){
            var price = document.getElementById("price").value;
            var quantity = document.getElementById("quantity").value;

            if(price && quantity){
                var total = price * quantity;
                document.getElementById("total").value = total;
            }
        }
    </script>

@stop

    


