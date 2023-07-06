<div class="row clearfix mt-5">
    <div class="col-md-2">
        <div class="nav flex-column nav-pills">
            <a class="nav-link @if($tab_menu == 'user_info') active @endif" href="{{ route('customers.show', $customers->id) }}">Customer Info</a>
            <a class="nav-link @if($tab_menu == 'reports') active @endif" href="{{ route('customers.reports', $customers->id) }}">Reports</a>
            <a class="nav-link @if($tab_menu == 'sales') active @endif" href="{{ route('customers.sales', $customers->id) }}">Sales</a>
            <a class="nav-link @if($tab_menu == 'purchase') active @endif" href="{{ route('customers.purchase', $customers->id) }}">Purchase</a>
            <a class="nav-link @if($tab_menu == 'payments') active @endif" href="{{ route('customers.payments', $customers->id) }}">Payments</a>
            <a class="nav-link @if($tab_menu == 'receipts') active @endif" href="{{ route('customers.receipts', $customers->id) }}">Receipts</a>
        </div>
    </div>

    <div class="col-md-10">

        @yield('customers_content')
        
    </div>
</div>

<!-- Modal Sales -->
<div class="modal fade" id="salesModal" tabindex="-1" role="dialog" aria-labelledby="salesModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['customers.sales.store', $customers->id],  'method' => 'post']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="salesModalLongTitle">New Sales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <span class="text-danger">*</span>
                            <div class="form-outline flex-fill mb-0 col md-4">
                                {{ Form::text('bank_no', NULL, ['class' => 'form-control', 'id' => 'bank_no', 'placeholder' => 'Bank Number', 'required']); }}
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

<!-- Modal Purchase -->
<div class="modal fade" id="purchaseModal" tabindex="-1" role="dialog" aria-labelledby="purchaseModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['customers.purchase.store', $customers->id],  'method' => 'post']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="purchaseModalLongTitle">New Purchase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <span class="text-danger">*</span>
                            <div class="form-outline flex-fill mb-0 col md-4">
                                {{ Form::text('bank_no', NULL, ['class' => 'form-control', 'id' => 'bank_no', 'placeholder' => 'Bank Number', 'required']); }}
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

<!-- Modal Payments-->
<div class="modal fade" id="paymentsModal" tabindex="-1" role="dialog" aria-labelledby="paymentsModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['customers.payments.store', $customers->id],  'method' => 'post']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentsModalLongTitle">New Payments</h5>
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

<!-- Modal Receipt -->
<div class="modal fade" id="receiptsModal" tabindex="-1" role="dialog" aria-labelledby="receiptsModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['customers.receipts.store', $customers->id],  'method' => 'post']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="receiptsModalLongTitle">New Receipts</h5>
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