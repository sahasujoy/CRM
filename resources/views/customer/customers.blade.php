@extends('master')
@section('content')
    <div class="content" id="app">
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
                        <li class="breadcrumb-item active"><span>Customers</span></li>
                    </ol>
                </nav>
            </div>
        </header>


        <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" ref="addCloseBtn"
                            aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" @submit.prevent="addCustomer" id="add_customer_form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body p-4 bg-light">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="file_no">File No.</label>
                                    <input type="text" v-model="formData.file_no" name="file_no" class="form-control"
                                        placeholder="File No." required>
                                </div>
                                <div class="col-lg">
                                    <label for="name">Customer's Name 1</label>
                                    <input type="text" v-model="formData.name1" name="name1" class="form-control"
                                        placeholder="Customer Name" required>
                                </div>
                                <div class="col-lg">
                                    <label for="customer_id">Customer ID</label>
                                    <input type="text" v-model="formData.customer_id" name="customer_id"
                                        class="form-control" placeholder="Customer ID" required>
                                </div>
                                <div class="col-lg">
                                    <label for="father_name1">Father's Name</label>
                                    <input type="text" v-model="formData.father_name1" name="father_name1"
                                        class="form-control" placeholder="Father's Name" required>
                                </div>
                                <div class="col-lg">
                                    <label for="mother_name1">Mother's Name</label>
                                    <input type="text" v-model="formData.mother_name1" name="mother_name1"
                                        class="form-control" placeholder="Mother's Name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="hus_wife_name">Husband's/Wife's Name</label>
                                    <input type="text" v-model="formData.hus_wife_name" name="hus_wife_name"
                                        class="form-control" placeholder="Husband's/Wife's Name">
                                    <label for="relationship">Select Relationship</label>
                                    <select v-model="formData.relationship" name="relationship" id="#">
                                        <option value="" selected>Select an option</option>
                                        <option value="Wife">Wife</option>
                                        <option value="Husband">Husband</option>
                                    </select>
                                </div>
                                <div class="col-lg">
                                    <label for="nid_no">National ID Number</label>
                                    <input type="text" v-model="formData.nid_no" name="nid_no" class="form-control"
                                        placeholder="Customer ID" required>
                                </div>
                                <div class="col-lg">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="date" v-model="formData.date_of_birth" name="date_of_birth"
                                        class="form-control" placeholder="Date of Birth" required>
                                </div>
                                <div class="col-lg">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" v-model="formData.phone" name="phone" class="form-control"
                                        placeholder="Phone Number" required>
                                </div>
                                <div class="col-lg">
                                    <label for="others_file_no">Others File No.</label>
                                    <input type="text" v-model="formData.others_file_no" name="others_file_no"
                                        class="form-control" placeholder="Others File No." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="name2">Customer's Name 2</label>
                                    <input type="text" v-model="formData.name2" name="name2" class="form-control"
                                        placeholder="Customer's Name 2">
                                </div>
                                <div class="col-lg">
                                    <label for="father_name2">Father's Name</label>
                                    <input type="text" v-model="formData.father_name2" name="father_name2"
                                        class="form-control" placeholder="Father's Name">
                                </div>
                                <div class="col-lg">
                                    <label for="booking_date">Booking Date</label>
                                    <input type="date" v-model="formData.booking_date" name="booking_date"
                                        class="form-control" placeholder="Booking Date" required>
                                </div>
                                <div class="col-lg">
                                    <label for="profession">Profession</label>
                                    <input type="text" v-model="formData.profession" name="profession"
                                        class="form-control" placeholder="Profession" required>
                                </div>
                                <div class="col-lg">
                                    <label for="designation">Designation (Optional)</label>
                                    <input type="text" v-model="formData.designation" name="designation"
                                        class="form-control" placeholder="Designation (Optional)">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="email">Email Address</label>
                                    <input type="email" v-model="formData.email" name="email" class="form-control"
                                        placeholder="Email Address" required>
                                </div>
                                <div class="col-lg">
                                    <label for="mailing_address">Mailing Address</label>
                                    <input type="text" v-model="formData.mailing_address" name="mailing_address"
                                        class="form-control" placeholder="Mailing Address" required>
                                </div>
                                <div class="col-lg">
                                    <label for="permanent_address">Permanent Address</label>
                                    <input type="text" v-model="formData.permanent_address" name="permanent_address"
                                        class="form-control" placeholder="Permanent Address" required>
                                </div>
                                <div class="col-lg">
                                    <label for="office_address">Office Address (Optional)</label>
                                    <input type="text" v-model="formData.office_address" name="office_address"
                                        class="form-control" placeholder="Office Address (optional)">
                                </div>
                                <div class="col-lg">
                                    <label for="country">Country</label>
                                    <input type="text" v-model="formData.country" name="country" class="form-control"
                                        placeholder="Country" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="nominee_name">Nominee Name</label>
                                    <input type="text" v-model="formData.nominee_name" name="nominee_name"
                                        class="form-control" placeholder="Nominee Name" required>
                                </div>
                                <div class="col-lg">
                                    <label for="relation_with_nominee">Relation with Nominee</label>
                                    <input type="text" v-model="formData.relation_with_nominee"
                                        name="relation_with_nominee" class="form-control"
                                        placeholder="Relation with Nominee" required>
                                </div>
                                <div class="col-lg">
                                    <label for="nominee_phone">Nominee Contact Number</label>
                                    <input type="text" v-model="formData.nominee_phone" name="nominee_phone"
                                        class="form-control" placeholder="Nominee Contact Number" required>
                                </div>
                                <div class="col-lg">
                                    <label for="nominee_address">Nominee Address</label>
                                    <input type="text" v-model="formData.nominee_address" name="nominee_address"
                                        class="form-control" placeholder="Nominee Address" required>
                                </div>
                                <div class="col-lg">
                                    <label for="nominee_gets">Nominee Gets</label>
                                    <input type="text" v-model="formData.nominee_gets" name="nominee_gets"
                                        class="form-control" placeholder="Nominee Gets" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="building_no">Building No.</label>
                                    <select v-model="formData.building_no" v-on:change="getFlat(formData.building_no)" name="building_no" id=""
                                        class="form-control">
                                        <option value="" selected>Select Building No.</option>
                                        @foreach ($buildings as $building)
                                            <option value="{{ $building->id }}">{{ $building->no }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg">
                                    <label for="flat_no">Flat No.</label>
                                    <select v-model="formData.flat_no" v-on:change="getFlatSize(formData.flat_no)" name="flat_no" id="flat_no"
                                        class="form-control">
                                        <option value="" v-show="show" disabled>Select Building No. First</option>
                                        <option value="" v-show="!show" disabled>Select Flat</option>
                                        {{-- <option value="" v-if="flats == !null" disabled>Select Flat</option> --}}
                                        <option v-for="flat in flats" :value="flat.id">@{{ flat.no }}</option>
                                        {{-- @foreach ($flats as $flat)
                        <option value="{{ $flat->id }}">{{ $flat->no }}</option>
                    @endforeach --}}
                                    </select>
                                </div>
                                <div class="col-lg" id="flat_size">
                                    <label for="flat_size">Flat Size</label>
                                    <input type="text"
                                        v-model="formData.flat_size"
                                     name="flat_size" id="flat_size"
                                        class="form-control" placeholder="Flat Size" required>
                                </div>
                                <div class="col-lg">
                                    <label for="media_name">Media Name</label>
                                    <input type="text" v-model="formData.media_name" name="media_name"
                                        class="form-control" placeholder="Media Name" required>
                                </div>
                                <div class="col-lg">
                                    <label for="media_phone">Media Phone Number</label>
                                    <input type="text" v-model="formData.media_phone" name="media_phone"
                                        class="form-control" placeholder="Media Phone Number" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="customer_image">Client's Image</label>
                                    <input type="file" ref="inputFile1" v-on:change="clientImageChange" name="customer_image"
                                        class="form-control" placeholder="Client's Image" required>
                                </div>
                                <div class="col-lg">
                                    <label for="nominee_image">Nominee's Image</label>
                                    <input type="file" ref="inputFile2" v-on:change="nomineeImageChange" name="nominee_image"
                                        class="form-control" placeholder="Nominee's Image" required>
                                </div>
                                <div class="col-lg">
                                    <label for="agreements">Agreement Upload</label>
                                    <input type="file" ref="inputFile3" v-on:change="agreementImageChange" name="agreements"
                                        class="form-control" placeholder="Agreement Upload" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="add_customer_btn" class="btn btn-primary">Add Customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" ref="editCloseBtn"
                            aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" @submit.prevent="updateCustomer(customer.id)"
                        id="add_customer_form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body p-4 bg-light">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="file_no">File No.</label>
                                    <input type="text" v-model="customer.file_no" name="file_no" class="form-control"
                                        placeholder="File No." required>
                                </div>
                                <div class="col-lg">
                                    <label for="name">Customer's Name 1</label>
                                    <input type="text" v-model="customer.name1" name="name1" class="form-control"
                                        placeholder="Customer Name" required>
                                </div>
                                <div class="col-lg">
                                    <label for="customer_id">Customer ID</label>
                                    <input type="text" v-model="customer.customer_id" name="customer_id"
                                        class="form-control" placeholder="Customer ID" required>
                                </div>
                                <div class="col-lg">
                                    <label for="father_name1">Father's Name</label>
                                    <input type="text" v-model="customer.father_name1" name="father_name1"
                                        class="form-control" placeholder="Father's Name" required>
                                </div>
                                <div class="col-lg">
                                    <label for="mother_name1">Mother's Name</label>
                                    <input type="text" v-model="customer.mother_name1" name="mother_name1"
                                        class="form-control" placeholder="Mother's Name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="hus_wife_name">Husband's/Wife's Name</label>
                                    <input type="text" v-model="customer.hus_wife_name" name="hus_wife_name"
                                        class="form-control" placeholder="Husband's/Wife's Name">
                                    <label for="relationship">Select Relationship</label>
                                    <select v-model="customer.relationship" name="relationship" id="#">
                                        <option value="" selected>Select an option</option>
                                        <option value="Wife">Wife</option>
                                        <option value="Husband">Husband</option>
                                    </select>
                                </div>
                                <div class="col-lg">
                                    <label for="nid_no">National ID Number</label>
                                    <input type="text" v-model="customer.nid_no" name="nid_no" class="form-control"
                                        placeholder="Customer ID" required>
                                </div>
                                <div class="col-lg">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="date" v-model="customer.date_of_birth" name="date_of_birth"
                                        class="form-control" placeholder="Date of Birth" required>
                                </div>
                                <div class="col-lg">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" v-model="customer.phone" name="phone" class="form-control"
                                        placeholder="Phone Number" required>
                                </div>
                                <div class="col-lg">
                                    <label for="others_file_no">Others File No.</label>
                                    <input type="text" v-model="customer.others_file_no" name="others_file_no"
                                        class="form-control" placeholder="Others File No." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="name2">Customer's Name 2</label>
                                    <input type="text" v-model="customer.name2" name="name2" class="form-control"
                                        placeholder="Customer's Name 2">
                                </div>
                                <div class="col-lg">
                                    <label for="father_name2">Father's Name</label>
                                    <input type="text" v-model="customer.father_name2" name="father_name2"
                                        class="form-control" placeholder="Father's Name">
                                </div>
                                <div class="col-lg">
                                    <label for="booking_date">Booking Date</label>
                                    <input type="date" v-model="customer.booking_date" name="booking_date"
                                        class="form-control" placeholder="Booking Date" required>
                                </div>
                                <div class="col-lg">
                                    <label for="profession">Profession</label>
                                    <input type="text" v-model="customer.profession" name="profession"
                                        class="form-control" placeholder="Profession" required>
                                </div>
                                <div class="col-lg">
                                    <label for="designation">Designation (Optional)</label>
                                    <input type="text" v-model="customer.designation" name="designation"
                                        class="form-control" placeholder="Designation (Optional)">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="email">Email Address</label>
                                    <input type="email" v-model="customer.email" name="email" class="form-control"
                                        placeholder="Email Address" required>
                                </div>
                                <div class="col-lg">
                                    <label for="mailing_address">Mailing Address</label>
                                    <input type="text" v-model="customer.mailing_address" name="mailing_address"
                                        class="form-control" placeholder="Mailing Address" required>
                                </div>
                                <div class="col-lg">
                                    <label for="permanent_address">Permanent Address</label>
                                    <input type="text" v-model="customer.permanent_address" name="permanent_address"
                                        class="form-control" placeholder="Permanent Address" required>
                                </div>
                                <div class="col-lg">
                                    <label for="office_address">Office Address (Optional)</label>
                                    <input type="text" v-model="customer.office_address" name="office_address"
                                        class="form-control" placeholder="Office Address (optional)">
                                </div>
                                <div class="col-lg">
                                    <label for="country">Country</label>
                                    <input type="text" v-model="customer.country" name="country" class="form-control"
                                        placeholder="Country" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="nominee_name">Nominee Name</label>
                                    <input type="text" v-model="customer.nominee_name" name="nominee_name"
                                        class="form-control" placeholder="Nominee Name" required>
                                </div>
                                <div class="col-lg">
                                    <label for="relation_with_nominee">Relation with Nominee</label>
                                    <input type="text" v-model="customer.relation_with_nominee"
                                        name="relation_with_nominee" class="form-control"
                                        placeholder="Relation with Nominee" required>
                                </div>
                                <div class="col-lg">
                                    <label for="nominee_phone">Nominee Contact Number</label>
                                    <input type="text" v-model="customer.nominee_phone" name="nominee_phone"
                                        class="form-control" placeholder="Nominee Contact Number" required>
                                </div>
                                <div class="col-lg">
                                    <label for="nominee_address">Nominee Address</label>
                                    <input type="text" v-model="customer.nominee_address" name="nominee_address"
                                        class="form-control" placeholder="Nominee Address" required>
                                </div>
                                <div class="col-lg">
                                    <label for="nominee_gets">Nominee Gets</label>
                                    <input type="text" v-model="customer.nominee_gets" name="nominee_gets"
                                        class="form-control" placeholder="Nominee Gets" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="building_no">Building No.</label>
                                    <select v-model="customer.building_no" v-on:change="getFlat(customer.building_no)" name="building_no" id=""
                                        class="form-control">
                                        <option value="" selected>Select Building No.</option>
                                        @foreach ($buildings as $building)
                                            <option value="{{ $building->id }}">{{ $building->no }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg">
                                    <label for="flat_no">Flat No.</label>
                                    <select v-model="customer.flat_no" v-on:change="getFlatSize(customer.flat_no)" name="flat_no" id="flat_no"
                                        class="form-control">
                                        <option value="" v-show="show" disabled>Select Building No. First</option>
                                        <option value="" v-show="!show" disabled>Select Flat</option>
                                        {{-- <option value="" v-if="flats == !null" disabled>Select Flat</option> --}}
                                        <option v-for="flat in flats" :value="flat.id">@{{ flat.no }}</option>
                                        {{-- @foreach ($flats as $flat)
                        <option value="{{ $flat->id }}">{{ $flat->no }}</option>
                    @endforeach --}}
                                    </select>
                                </div>
                                <div class="col-lg" id="flat_size">
                                    <label for="flat_size">Flat Size</label>
                                    <input type="text" v-model="customer.flat_size" name="flat_size" id="flat_size"
                                        class="form-control" placeholder="Flat Size" required>
                                </div>
                                <div class="col-lg">
                                    <label for="media_name">Media Name</label>
                                    <input type="text" v-model="customer.media_name" name="media_name"
                                        class="form-control" placeholder="Media Name" required>
                                </div>
                                <div class="col-lg">
                                    <label for="media_phone">Media Phone Number</label>
                                    <input type="text" v-model="customer.media_phone" name="media_phone"
                                        class="form-control" placeholder="Media Phone Number" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="customer_image">Client's Image</label>
                                    <input type="file" ref="updateFile1" v-on:change="clientImageUpdate" name="customer_image"
                                        class="form-control" placeholder="Client's Image">
                                </div>
                                <div class="col-lg">
                                    <label for="nominee_image">Nominee's Image</label>
                                    <input type="file" ref="updateFile2" v-on:change="nomineeImageUpdate" name="nominee_image"
                                        class="form-control" placeholder="Nominee's Image">
                                </div>
                                <div class="col-lg">
                                    <label for="agreements">Agreement Upload</label>
                                    <input type="file" ref="updateFile3" v-on:change="agreementImageUpdate" name="agreements"
                                        class="form-control" placeholder="Agreement Upload">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="add_customer_btn" class="btn btn-primary">Update Customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                            <h3 class="text-light">Manage Customers</h3>
                            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addCustomerModal"><i
                                    class="bi-plus-circle me-2"></i>Add New Customer</button>
                        </div>
                        <div class="card-body">
                            <table class="table table-secondary table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Customer ID</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Contact No.</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Customer Image</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(customer, index) in customers" :key="customer.id">
                                        <td>@{{ index + 1 }}</td>
                                        <td>@{{ customer.customer_id }}</td>
                                        <td>@{{ customer.name1 }}</td>
                                        <td>@{{ customer.phone }}</td>
                                        <td>@{{ customer.email }}</td>
                                        <td>@{{ customer.mailing_address }}</td>
                                        <td>@{{ customer.country }}</td>
                                        <td><img :src="'/storage/images/'+customer.customer_image" :style="{ width: width }"
                                                class="img-thumbnail rounded-circle" /></td>
                                        <td>
                                            <a :href="'/customer_details/'+customer.id" id="#"
                                                class="text-danger mx-1 displayIcon"><i class="bi-display h4"></i></a>
                                            <a href="#" id="#" @click.prevent="editCustomer(customer.id)"
                                                class="text-success mx-1 editIcon" data-bs-toggle="modal"
                                                data-bs-target="#editCustomerModal"><i class="bi-pencil-square h4"></i></a>
                                            <a href="#" id="#" @click.prevent="deleteCustomer(customer.id)"
                                                class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const app = Vue.createApp({
            data() {
                return {
                    customers: [],
                    width: "50px",
                    formData: {
                        file_no: '',
                        name1: '',
                        customer_id: '',
                        father_name1: '',
                        mother_name1: '',
                        hus_wife_name: '',
                        relationship: '',
                        nid_no: '',
                        date_of_birth: '',
                        phone: '',
                        others_file_no: '',
                        name2: '',
                        father_name2: '',
                        booking_date: '',
                        profession: '',
                        designation: '',
                        email: '',
                        mailing_address: '',
                        permanent_address: '',
                        office_address: '',
                        country: '',
                        nominee_name: '',
                        relation_with_nominee: '',
                        nominee_phone: '',
                        nominee_address: '',
                        nominee_gets: '',
                        building_no: '',
                        flat_no: '',
                        flat_size: '',
                        media_name: '',
                        media_phone: '',
                        customer_image: null,
                        nominee_image: null,
                        agreements: null,
                    },
                    customer: {},
                    flats: [],
                    show: true,
                }
            },

            methods: {
                clientImageChange(e)
                {
                    console.log(e.target.files[0]);
                    this.formData.customer_image = e.target.files[0];
                },

                nomineeImageChange(e)
                {
                    console.log(e.target.files[0]);
                    this.formData.nominee_image = e.target.files[0];
                },

                agreementImageChange(e)
                {
                    console.log(e.target.files[0]);
                    this.formData.agreements = e.target.files[0];
                },

                clientImageUpdate(e)
                {
                    console.log(e.target.files[0]);
                    this.customer.customer_image = e.target.files[0];
                },

                nomineeImageUpdate(e)
                {
                    console.log(e.target.files[0]);
                    this.customer.nominee_image = e.target.files[0];
                },

                agreementImageUpdate(e)
                {
                    console.log(e.target.files[0]);
                    this.customer.agreements = e.target.files[0];
                },

                addCustomer()
                {
                    const config = {
                        headers: {
                            'content-type': 'multipart/form-data'
                        }
                    };

                    let formData = new FormData();
                    formData.append('customer_image', this.formData.customer_image);
                    formData.append('nominee_image', this.formData.nominee_image);
                    formData.append('agreements', this.formData.agreements);

                    axios.post('http://127.0.0.1:8000/api/store_customer', this.formData, config)
                        .then((response) => {
                            console.log(response);
                            if (response.data.status == 200) {
                                    this.formData.file_no = '',
                                    this.formData.name1 = '',
                                    this.formData.customer_id = '',
                                    this.formData.father_name1 = '',
                                    this.formData.mother_name1 = '',
                                    this.formData.hus_wife_name = '',
                                    this.formData.relationship = '',
                                    this.formData.nid_no = '',
                                    this.formData.date_of_birth = '',
                                    this.formData.phone = '',
                                    this.formData.others_file_no = '',
                                    this.formData.name2 = '',
                                    this.formData.father_name2 = '',
                                    this.formData.booking_date = '',
                                    this.formData.profession = '',
                                    this.formData.designation = '',
                                    this.formData.email = '',
                                    this.formData.mailing_address = '',
                                    this.formData.permanent_address = '',
                                    this.formData.office_address = '',
                                    this.formData.country = '',
                                    this.formData.nominee_name = '',
                                    this.formData.relation_with_nominee = '',
                                    this.formData.nominee_phone = '',
                                    this.formData.nominee_address = '',
                                    this.formData.nominee_gets = '',
                                    this.formData.building_no = '',
                                    this.formData.flat_no = '',
                                    this.formData.flat_size = '',
                                    this.formData.media_name = '',
                                    this.formData.media_phone = '',
                                    this.formData.customer_image = '',
                                    this.formData.nominee_image = '',
                                    this.formData.agreements = '',
                                    this.$refs.inputFile1.value = null;
                                    this.$refs.inputFile2.value = null;
                                    this.$refs.inputFile3.value = null;
                                    this.$refs.addCloseBtn.click();
                                Swal.fire(
                                    'Added!',
                                    'Client Added Successfully!',
                                    'success'
                                );
                            }
                            this.fetchAll();
                            // $('#success').html(response.data.message)
                        }).catch((errors) => {
                            console.log(errors);
                        });
                },

                fetchAll()
                {
                    axios.get('http://127.0.0.1:8000/api/fetch_all_customers')
                        .then(response => this.customers = response.data)
                        .catch(error => console.log(error));
                },

                editCustomer(id)
                {
                    let url = `http://127.0.0.1:8000/api/edit_customer/${id}`;
                    axios.get(url).then(response => {
                        this.customer = response.data;
                        console.log(this.land);
                    }).catch(error => {
                        console.log(error);
                    });
                },

                updateCustomer(id)
                {
                    const config = {
                        headers: {
                            'content-type': 'multipart/form-data'
                        }
                    }

                    let url = `http://127.0.0.1:8000/api/update_customer/${id}`;
                    axios.post(url, this.customer, config)
                        .then((response) => {
                            console.log(response);
                            if (response.data.status == 200) {
                                    this.customer.file_no = '',
                                    this.customer.name1 = '',
                                    this.customer.customer_id = '',
                                    this.customer.father_name1 = '',
                                    this.customer.mother_name1 = '',
                                    this.customer.hus_wife_name = '',
                                    this.customer.relationship = '',
                                    this.customer.nid_no = '',
                                    this.customer.date_of_birth = '',
                                    this.customer.phone = '',
                                    this.customer.others_file_no = '',
                                    this.customer.name2 = '',
                                    this.customer.father_name2 = '',
                                    this.customer.booking_date = '',
                                    this.customer.profession = '',
                                    this.customer.designation = '',
                                    this.customer.email = '',
                                    this.customer.mailing_address = '',
                                    this.customer.permanent_address = '',
                                    this.customer.office_address = '',
                                    this.customer.country = '',
                                    this.customer.nominee_name = '',
                                    this.customer.relation_with_nominee = '',
                                    this.customer.nominee_phone = '',
                                    this.customer.nominee_address = '',
                                    this.customer.nominee_gets = '',
                                    this.customer.building_no = '',
                                    this.customer.flat_no = '',
                                    this.customer.flat_size = '',
                                    this.customer.media_name = '',
                                    this.customer.media_phone = '',
                                    this.customer.customer_image = '',
                                    this.customer.nominee_image = '',
                                    this.customer.agreements = '',
                                    this.$refs.updateFile1.value = null;
                                    this.$refs.updateFile2.value = null;
                                    this.$refs.updateFile3.value = null;
                                    this.$refs.editCloseBtn.click();
                                Swal.fire(
                                    'Updated!',
                                    'Customer Updated Successfully!',
                                    'success'
                                );

                            }
                            this.fetchAll();
                            // $('#success').html(response.data.message)
                        }).catch((errors) => {
                            console.log(errors);
                        });
                },

                async deleteCustomer(id)
                {
                    // alert(id);
                    let url = `http://127.0.0.1:8000/api/delete_customer/${id}`;
                    await axios.delete(url).then(response => {
                        if (response.data.status == 200) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            this.fetchAll();
                        }
                    }).catch(error => {
                        console.log(error);
                    });
                },

                getFlat(building_id)
                {
                    let url = `http://127.0.0.1:8000/api/customer/get_flats/${building_id}`;
                    axios.get(url)
                        .then(response => {
                            this.flats = response.data;
                            this.show = false;
                        }).catch(error => console.log(error));
                },

                getFlatSize(flat_id)
                {
                    let url = `http://127.0.0.1:8000/api/customer/get_flat_size/${flat_id}`;
                    axios.get(url)
                        .then(response => {
                            this.formData.flat_size = response.data;
                            this.customer.flat_size = response.data;
                        }).catch(error => console.log(error));
                }
            },



            mounted() {
                axios.get('http://127.0.0.1:8000/api/fetch_all_customers')
                    .then(response => {
                        this.customers = response.data;
                    }).catch(error => console.log(error));
            },
        });

        app.mount("#app");
    </script>
    @endsection
