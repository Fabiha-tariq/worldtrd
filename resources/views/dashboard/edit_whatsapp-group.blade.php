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
                                    <h3 class="m-0">Edit Whats App Group</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="{{url('/dashboard/update-whatsapp-group/')}}/{{$data->id}}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="inputEmail4">Whats App Group Link</label>
                                            <input type="text" name="link" value="{{$data->link}}" class="form-control" required placeholder="Enter Link">
                                        </div>
                                        <div class="col-md-6">
                                        
                                            <label class="form-label" >Status</label>
                                            <select name="status"  class="form-select">
                                                @if ($data->status == 1)
                                                <option value="1" selected>Active</option>
                                                <option value="0">Inactive</option>
                                                    @else
                                                    <option value="1" >Active</option>
                                                    <option value="0" selected>Inactive</option>
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
