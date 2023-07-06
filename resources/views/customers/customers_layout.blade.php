@extends('layout.main')

@section('main_content')

        <div class="row clearfix page_header">
            <div class="col-md-4">
                <a class="btn btn-primary" href="{{ route('customers.index') }}"> <i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-md-8 text-right">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#salesModal">
                    <i class="fa fa-plus"></i> New Sale
                </button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#purchaseModal">
                    <i class="fa fa-plus"></i> New Purchase
                </button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#paymentsModal">
                    <i class="fa fa-plus"></i> New Payment
                </button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#receiptsModal">
                    <i class="fa fa-plus"></i> New Receipt
                </button>
            </div>
        </div>

        @yield('customers_card')

        @include('customers.customers_layout_content')

        

@stop

    


