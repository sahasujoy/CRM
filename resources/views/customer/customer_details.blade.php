@extends('master')
@section('content')
<header>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
              <!-- if breadcrumb is single--><span>Home</span>
            </li>
            {{-- <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Property</span>
              </li> --}}
            <li class="breadcrumb-item active"><span>Customerss</span></li>
          </ol>
        </nav>
    </div>
</header>


<div class="body flex-grow-1 px-3">
    <div class="container-lg">
      <div class="card mb-3">
        <div class="card-header"><div class="d-flex justify-content-center"><strong>Information</strong></div></div>
        <div class="card-body">
            <div class="bg-light d-flex justify-content-between">
                <div>
                    <p><u>File No.</u>: {{ $customer->file_no }} | <u>Customer ID</u>: {{ $customer->customer_id }}</p>
                    <p><u>Building No.</u>: {{ $customer->flat->building->no }} | <u>Flat No.</u>: {{ $customer->flat->no }} | <u>Flat Size</u>: {{ $customer->flat_size }} sqft.</p>
                </div>
                <div class="d-flex justify-content-end">
                    <img src="/storage/images/{{ $customer->customer_image }}" width = "100px" height="100px" class = "img-thumbnail rounded"/>
                </div>
            </div>
            <br>
            <h5><u>Client's Information</u></h5>
            <div class="bg-light d-flex justify-content-between">
                <div>
                    <p><label for="">Customer's Name</label> &emsp; <input type="text" value="{{ $customer->name1 }}" disabled></p>
                    <p><label for="">Father's Name</label> &emsp; <input type="text" value="{{ $customer->father_name1 }}" disabled></p>
                    <p><label for="">Mother's Name</label> &emsp; <input type="text" value="{{ $customer->mother_name1 }}" disabled></p>
                    <p><label for="">Husband's/Wife's Name</label> &emsp; <input type="text" value="{{ $customer->hus_wife_name }}" disabled></p>
                    <p><label for="">Customer's Name 2</label> &emsp; <input type="text" value="{{ $customer->name2 }}" disabled></p>
                    <p><label for="">Father's Name</label> &emsp; <input type="text" value="{{ $customer->father_name2 }}" disabled></p>
                    <p><label for="">Email Address</label> &emsp; <input type="text" value="{{ $customer->email }}" disabled></p>
                    <p><label for="">Mailing Address</label> &emsp; <textarea cols="30" rows="" disabled>{{ $customer->mailing_address }}</textarea></p>
                    <p><label for="">Permanent Address</label> &emsp; <textarea cols="30" rows="" disabled>{{ $customer->permanent_address }}</textarea></p>

                </div>
                <div>
                    <p><label for="">Date of Birth</label> &emsp; <input type="text" value="{{ $customer->date_of_birth }}" disabled></p>
                    <p><label for="">Phone Number</label> &emsp; <input type="text" value="{{ $customer->phone }}" disabled></p>
                    <p><label for="">National ID Number</label> &emsp; <input type="text" value="{{ $customer->nid_no }}" disabled></p>
                    <p><label for="">Profession</label> &emsp; <input type="text" value="{{ $customer->profession }}" disabled></p>
                    <p><label for="">Designation (Optional)</label> &emsp; <input type="text" value="{{ $customer->designation }}" disabled></p>
                    <p><label for="">Country</label> &emsp; <input type="text" value="{{ $customer->country }}" disabled></p>
                    <p><label for="">Booking Date</label> &emsp; <input type="text" value="{{ $customer->booking_date }}" disabled></p>
                    <p><label for="">Office Address</label> &emsp; <textarea cols="30" rows="4" disabled>{{ $customer->office_address }}</textarea></p>
                </div>
            </div>
            <br>
            <h5><u>Nominee's Information</u></h5>
            <div class="bg-light d-flex justify-content-between">
                <div>
                    <p><label for="">Nominee's Name</label> &emsp; <input type="text" value="{{ $customer->nominee_name }}" disabled></p>
                    <p><label for="">Nominee Gets</label> &emsp; <input type="text" value="{{ $customer->nominee_gets }}" disabled></p>
                    <p><label for="">Nominee Address</label> &emsp; <textarea cols="30" rows="4" disabled>{{ $customer->nominee_address }}</textarea></p>
                </div>
                <div>
                    <div class="d-flex justify-content-end">
                        <img src="/storage/images/{{ $customer->nominee_image }}" width = "100px" height="100px" class = "img-thumbnail rounded"/>
                    </div>
                    <br>
                    <p><label for="">Nominee Phone Number</label> &emsp; <input type="text" value="{{ $customer->nominee_phone }}" disabled></p>
                    <p><label for="">Relationship with Nominee</label> &emsp; <input type="text" value="{{ $customer->relation_with_nominee }}" disabled></p>
                </div>
            </div>
            <br>
            <h5><u>Media Information</u></h5>
            <div class="bg-light d-flex justify-content-between">
                <div>
                    <p><label for="">Media Name</label> &emsp; <input type="text" value="{{ $customer->media_name }}" disabled></p>
                    <p><label for="">Other File No.</label> &emsp; <input type="text" value="{{ $customer->others_file_no }}" disabled></p>
                </div>
                <div>
                    <p><label for="">Media Phone Number</label> &emsp; <input type="text" value="{{ $customer->media_phone }}" disabled></p>
                </div>
            </div>
      </div>
      </div>
    </div>
  </div>
@endsection
