@extends('layouts.website-layout')
@section('content')
    <!-- Banner Area Starts -->

    <!-- Banner Area Ends -->
    <!-- Pricing Starts -->
    <section class="pricing">
        <div class="container" style="">
            <div class="row">
                @if (session()->has('status'))
                    <div class="col-md-6">
                        <div class="alert alert-danger alert-dismissible show" role="alert">
                            <strong>{{ session()->get('status') }} </strong>
                            <button type="button" class="btn-close ms-auto  " data-bs-dismiss="alert"
                                aria-label="Close">X</button>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Section Content Starts -->
            <h3 class="text-center">Investment Now</h3>
            <div class="row pricing-tables-content pricing-page">
                <div class="pricing-container">
                    <!-- Pricing Tables Starts -->
                    <div class="container">
                        <br>
                        <h4 class="text-success">You Already Invested {{$investamount[0]->iamount ? : 0}} PKR in this plan</h4>
                        <br>
                        <form action="{{ url('/investstore') }}/{{ $data[0]->plan_id }}" method="POST"
                            enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-6">
                                    @csrf
                                    <label for="" class="form-label">Enter Amount in PKR</label>
                                    <input type="number" id="amount"  name="amount"
                                        placeholder="Minimum: {{ $data[0]->minimum_amount }} PKR and Maximum: {{ $data[0]->maximum_amount }} PKR"
                                        step="1" class="form-control">
                                        <br>
                                        <p>Total Amount with Profit: <span id="amountset">0</span></p>
                                </div>
                                {{-- <div class="col-md-6">
                                    <label for="" class="form-label">Confirm Invest ?</label><br>
                                    <label for="">Yes </label> &nbsp;&nbsp; <input type="radio" name="status" value="1" checked>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<label for="">No</label> &nbsp;&nbsp; <input type="radio" name="status" value="0">
                                </div> --}}
                            </div>
                            <br>
                            <div class="row ">
                                <div class="col-md-3">

                                    <button type="submit" class="btn btn-primary ">Invest Confirm</button>
                                </div>
                            </div>

                        </form>

                    </div>


                </div>
            </div>

        </div>
    </section>


    <script>

            document.getElementById("amount").addEventListener('keyup',function(){

                let amount = this.value;
                let per = amount / 100;
                per  = per * {{$data[0]->daily_profit_percentage}}
                let fff = per * {{$data[0]->duration_number}};
                let final_amount = parseFloat(amount) + parseFloat(fff);
                document.getElementById("amountset").innerText = final_amount;

        });



    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
