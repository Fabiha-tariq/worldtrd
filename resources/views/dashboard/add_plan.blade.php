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
                                    <h3 class="m-0">Add plan</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="{{ url('/dashboard/store-plan') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Plan title</label>
                                            <input type="text" class="form-control" value="{{ old('title') }}"
                                                placeholder="Enter plan title" name="title">
                                            @error('title')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Plan Category</label>
                                            <select name="plancat" class="form-select">
                                                <option selected disabled>Plan Category</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->cat_id }}">{{ $item->category_title }}</option>
                                                @endforeach
                                            </select>
                                            @error('plancat')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class=" col-md-4">
                                            <label class="form-label">Minimum plan amount (in PKR)</label>
                                            <input type="number" step="0.01" value="{{ old('minamount') }}"
                                                name="minamount" class="form-control" placeholder="Minimum plan amount">
                                            @error('minamount')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class=" col-md-4">
                                            <label class="form-label">Maximum plan amount (in PKR)</label>
                                            <input type="number" name="maxamount" step="0.01"
                                                value="{{ old('maxamount') }}" class="form-control"
                                                placeholder="Maximum plan amount">
                                            @error('maxamount')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class=" col-md-4">
                                            <label class="form-label">Duration number</label>
                                            <input type="number" class="form-control" placeholder="Enter Duration Number"
                                                name="durnumber">
                                            @error('durnumber')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Duration type</label>
                                            <select name="durtype" class="form-select">
                                                <option value="0" selected>Day</option>
                                            </select>
                                            @error('durtype')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class=" col-md-4">
                                            <label class="form-label">Daily Profit percentage (%)</label>
                                            <input type="number" step="0.01" name="daily_profit" class="form-control"
                                                placeholder="Daily Profit percentage">
                                            @error('daily_profit')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" for="inputState">Profite will return daily?</label>
                                            <select name="profitdaily" class="form-select">
                                                <option value="1" selected>Yes</option>
                                                <option value="0" >No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="inputState">Capital will return ?</label>
                                            <select name="capitalreturn" class="form-select">
                                                <option value="1" selected>Yes</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="inputState">Plan Status</label>
                                            <select name="status" class="form-select">
                                                <option value="1" selected>Active</option>
                                                <option value="0">Unactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-sm">Add plan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
