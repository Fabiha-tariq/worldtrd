@extends('layouts.dashboard-layout')
@section('content')
    <style>
        #myheadingwithdrawl {
            animation: myanim 0.4s alternate infinite;
            /* animation-timing-function: ; */

        }

        @keyframes myanim {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">

                @if (count($withdrawcheck) >= 1)
                    <div class="col-md-12 my-5">

                        <h3 id="myheadingwithdrawl" class="text-danger text-center"> Only one withdraw in one Day </h3>

                    </div>
                @else
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Add withdraw</h3>
                                    </div>
                                </div>

                            </div>
                            <div class="container">
                                {{-- <div class="row my-2 justify-content-center">
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Bind Withdrawl Account
                                          </button>

                                    </div>
                                </div> --}}
<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
                                <div class="row">
                                    @if (session()->has('status1'))
                                        <div class="col-md-6">
                                            <div class="alert alert-danger alert-dismissible show" role="alert">
                                                <strong>{{ session()->get('status1') }} </strong>
                                                <button type="button" class="btn-close ms-auto  " data-bs-dismiss="alert"
                                                    aria-label="Close">X</button>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="main-title">
                                    <h3 class="text-end mx-5" style="color:red;">Withdrawl Charges <b>
                                            {{ $charges[0]->charges }}% </b></h3>
                                </div>
                                <div class="white_card_body">
                                    <div class="card-body">
                                        <form action="{{ url('/') }}/dashboard/store-withdraw" method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Select Currency</label>

                                                    <select class="form-select " name="currency" id="currency">

                                                        <option value="0">PKR</option>
                                                        {{-- <option value="1">USDT </option> --}}
                                                    </select>
                                                </div>

                                                <div class="col-md-6 mt-2">
                                                    <label class="form-label">With Draw amount (in <span id="amlabel"> PKR </span>)
                                                    </label>
                                                    <input type="number" required value="{{ old('amount') }}"
                                                        name="amount" id="amount" class="form-control " min="750"
                                                        placeholder="Enter amount" step="0.01">
                                                    @error('amount')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    <p>Total Amount with Charges in: <span id="aamount"></span> PKR</p>
                                                </div>

                                                <div class="col-md-6 mt-2">
                                                    <label class="form-label">With Draw amount (in <span id="currlabel"> PKR
                                                        </span>)
                                                    </label>
                                                    <input type="number" readonly min="0" name="final_amount"
                                                        id="final_amount" min="750" step="0.01"
                                                        class="form-control " placeholder="Enter Final Amount">
                                                </div>

                                                <div class="col-md-6 mt-2" id="bankname">
                                                    <label class="form-label">Enter Bank Name</label>
                                                    {{-- <input type="text" name="bankname" class="form-control"> --}}
                                                    <select name="bankname" class="form-select js-example-basic-single" required >
                                                        <option value="">Select a Bank</option>
                                                        <option value="AlBaraka">Al Baraka Bank (Pakistan) Limited</option>
                                                        <option value="ABL">Allied Bank Limited (ABL)</option>
                                                        <option value="Askari">Askari Bank</option>
                                                        <option value="BankAlfalah">Bank Alfalah Limited (BAFL)</option>
                                                        <option value="BankAlHabib">Bank Al-Habib Limited (BAHL)</option>
                                                        <option value="BankIslami">BankIslami Pakistan Limited</option>
                                                        <option value="BankOfPunjab">Bank of Punjab (BOP)</option>
                                                        <option value="BankOfKhyber">Bank of Khyber</option>
                                                        <option value="DeutscheBank">Deutsche Bank A.G</option>
                                                        <option value="DubaiIslamicBank">Dubai Islamic Bank Pakistan Limited (DIB Pakistan)</option>
                                                        <option value="Easypaisa">Easypaisa</option>
                                                        <option value="FaysalBank">Faysal Bank Limited (FBL)</option>
                                                        <option value="FirstWomenBank">First Women Bank Limited</option>
                                                        <option value="HBL">Habib Bank Limited (HBL)</option>
                                                        <option value="HabibMetropolitanBank">Habib Metropolitan Bank Limited</option>
                                                        <option value="ICBC">Industrial and Commercial Bank of China</option>
                                                        <option value="IDBP">Industrial Development Bank of Pakistan</option>
                                                        <option value="Jazzcash">JazzCash</option>
                                                        <option value="JSBank">JS Bank Limited</option>
                                                        <option value="MCB">MCB Bank Limited</option>
                                                        <option value="MCBIslamic">MCB Islamic Bank Limited</option>
                                                        <option value="MeezanBank">Meezan Bank Limited</option>
                                                        <option value="NBP">National Bank of Pakistan (NBP)</option>
                                                        <option value="SummitBank">Summit Bank Pakistan</option>
                                                        <option value="SCB">Standard Chartered Bank (Pakistan) Limited (SC Pakistan)</option>
                                                        <option value="SindhBank">Sindh Bank</option>
                                                        <option value="MUFG">The Bank of Tokyo-Mitsubishi UFJ (MUFG Bank Pakistan)</option>
                                                        <option value="UBL">United Bank Limited (UBL)</option>
                                                        <option value="ZTBL">Zarai Taraqiati Bank Limited</option>
                                                    </select>

                                                    @error('bankname')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mt-2" id="holdername">
                                                    <label class="form-label">Account Title Name</label>
                                                    <input type="text" name="holdername" required class="form-control"
                                                        placeholder="Enter Title Name">
                                                    @error('holdername')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label class="form-label">Account Number or Wallet Address</label>
                                                    <input type="text" name="account_number" class="form-control"
                                                        placeholder="Account Number">
                                                    @error('account_number')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Add withdraw</button>
                                        </form>
                                    </div>

                                    <div class="container">

                                        <ul class="mt-2">
                                            <li> <b> Points </b> </li>
                                            <li class="text-danger">Withdraw Receiving Time is 24 Hours But Usually it
                                                receives in 12 Hours</li>
                                        </ul>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        @endif



        <script>



            document.getElementById('amount').addEventListener('keyup', function() {

                var curr = document.getElementById('currency').value;

                let ddd = document.getElementById('amount').value;
                var aa = ddd / 100;
                aa = aa * {{ $charges[0]->charges }};

                document.getElementById('aamount').innerHTML = parseFloat(ddd) + aa ;

                if (curr == 0) {

                    ddd = ddd ;
                    document.getElementById('currlabel').innerHTML = 'PKR';
                    document.getElementById('final_amount').value = ddd;

                } else {
                    document.getElementById('final_amount').value = ddd * {{ session()->get('dollarrate') }};
                    document.getElementById('amlabel').innerText = '$';


                }

            });

            document.getElementById('currency').addEventListener('change', function() {

                var curr = this.value;
                let ddd = document.getElementById('amount').value;
                // var data = localStorage.getItem('dollarrate');
                // data = JSON.parse(data);


                if (curr == 1) {

                    document.getElementById('currlabel').innerHTML = 'PKR';
                    document.getElementById('final_amount').value = ddd * {{ session()->get('dollarrate') }};
                    document.getElementById('bankname').style = 'display:none';
                    document.getElementById('holdername').style = 'display:none';
                    document.getElementById('amount').setAttribute('min', 750);
                    document.getElementById('amlabel').innerText = '$';


                } else {
                    document.getElementById('bankname').style = 'display:block';
                    document.getElementById('holdername').style = 'display:block';
                    document.getElementById('final_amount').value = Math.floor(ddd *
                        {{ session()->get('dollarrate') }});
                    document.getElementById('currlabel').innerHTML = 'PKR';
                    document.getElementById('amount').setAttribute('min', 750);
                    document.getElementById('amlabel').innerHTML = 'PKR';


                }

            });
        </script>

        <br><br>


    @endsection
