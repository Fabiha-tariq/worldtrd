@extends('layouts.dashboard-layout')
@section('content')

<div class="main_content_iner ">
    <div class="container-fluid p-0 sm_padding_15px">
    <div class="row justify-content-center">

    <div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
    <div class="white_card_header">
    <div class="box_header m-0">
    <div class="main-title">
    <h3 class="m-0">Add Bank Payment Information</h3>
    </div>
    </div>
    </div>
    <div class="white_card_body">
    <div class="card-body">
    <form action="{{url('/')}}/dashboard/add-bank-payment-info-store" method="POST">
        @csrf
    <div class="row mb-3">
    <div class="col-md-6">
    <label class="form-label" for="inputEmail4">Bank Name</label>
    <input type="text" class="form-control" id="inputEmail4" name="bank_name" value="{{old('bank_name')}}"  placeholder="Enter Bank Name"/>
    @error('bank_name')
    <p class="text-danger">{{$message}}</p>
    @enderror
    
</div>
    <div class=" col-md-6">
    <label class="form-label" for="inputPassword4">Account Title</label>
    <input type="text" class="form-control" id="inputPassword4" name="account_title" value="{{old('account_title')}}" placeholder="Enter Account Title">
    @error('account_title')
    <p class="text-danger">{{$message}}</p>
    @enderror
    </div>

    </div>
    <div class="row mb-3">

        <div class=" col-md-6">
            <label class="form-label" for="inputPassword4">Account Number</label>
            <input type="text" class="form-control" id="inputPassword4" name="account_number" value="{{old('account_number')}}" placeholder="Enter Account Title">
            @error('account_number')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    
    <div class="col-md-6">
        <label class="form-label" for="inputState">Status</label>
        <select id="inputState" name="status" class="form-select">
        <option required selected disabled  >Select Status</option>
        <option value="1">Active</option>
        <option value="0">Inactive</option>
        </select>
        @error('status')
        <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-sm">Add Info</button>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

@endsection
