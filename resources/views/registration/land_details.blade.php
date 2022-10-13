@extends('master')
@section('content')
    <div id="app">
        <header>
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0 ms-2">
                        <li class="breadcrumb-item">
                            <!-- if breadcrumb is single--><span>Home</span>
                        </li>
                        <li class="breadcrumb-item active"><span>Registration Details Client Search</span></li>
                    </ol>
                </nav>
            </div>
        </header>


        <div style="padding-left: 20px; padding-top: 10px;">
            <a class="btn btn-light" href="{{ route('registration.land.details')}}">Land Details</a> &nbsp;
            <a class="btn btn-secondary" href="{{ route('registration.flat.details')}}">Flat Details</a> &nbsp;
            <a class="btn btn-secondary" href="{{ route('registration.mutation.details')}}">Mutation Details</a> &nbsp;
            <a class="btn btn-secondary" href="{{ route('registration.poa.details')}}">Power of Attorney Details</a> &nbsp;
        </div>

        <div class="modal fade" id="addLandRegModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Land Registration Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" ref="addCloseBtn" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" id="#" @submit.prevent="addLandDetails">
                        @csrf
                        <div class="modal-body p-4 bg-light">
                            <div class="my-2">
                                <label for="land_id">File No.</label>
                                <select name="" v-model="formData.customer_id" class="form-control">
                                    <option value="" disabled selected>Select a File No.</option>
                                    <option v-for="customer in customers" :value="customer.id">@{{ customer.file_no }}</option>
                                </select>
                            </div>
                            <div class="my-2">
                                <label for="">Customer Land Registration Date</label>
                                <input type="date" v-model="formData.land_reg_date" name="name" class="form-control"
                                    placeholder="Land Registration Date" required>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="">Customer Land Registration Sub-deed No.</label>
                                    <input type="text" v-model="formData.land_reg_sub_deed_no" class="form-control"
                                        placeholder="Customer Land Registration Sub-deed No." required>
                                </div>
                                <div class="col-lg">
                                    <label for="">Individual Land Size(Decimal)</label>
                                    <input type="text" v-model="formData.individual_land_size" name=""
                                        class="form-control" placeholder="Individual Land Size(Decimal)" required>
                                </div>
                            </div>
                            <div class="my-2">
                                    <label for="">Mouza Name</label>
                                    <input type="text" v-model="formData.mouza_name" name="" class="form-control"
                                        placeholder="Mouza Name" required>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="">CS Daag No.</label>
                                    <input type="text" v-model="formData.land_dcs" name="" class="form-control"
                                        placeholder="CS Daag No." required>
                                </div>
                                <div class="col-lg">
                                    <label for="">SA Daag No.</label>
                                    <input type="text" v-model="formData.land_dsa" name="" class="form-control"
                                        placeholder="SA Daag No." required>
                                </div>
                                <div class="col-lg">
                                    <label for="">RS Daag No.</label>
                                    <input type="text" v-model="formData.land_drs" name="" class="form-control"
                                        placeholder="RS Daag No." required>
                                </div>
                                <div class="col-lg">
                                    <label for="">BS Daag No.</label>
                                    <input type="text" v-model="formData.land_dbs" name="" class="form-control"
                                        placeholder="BS Daag No." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="">CS Khatiyan No.</label>
                                    <input type="text" v-model="formData.land_kcs" name="" class="form-control"
                                        placeholder="CS Khatiyan No." required>
                                </div>
                                <div class="col-lg">
                                    <label for="">SA Khatiyan No.</label>
                                    <input type="text" v-model="formData.land_ksa" name="" class="form-control"
                                        placeholder="SA Khatiyan No." required>
                                </div>
                                <div class="col-lg">
                                    <label for="">RS Khatiyan No.</label>
                                    <input type="text" v-model="formData.land_krs" name="" class="form-control"
                                        placeholder="RS Khatiyan No." required>
                                </div>
                                <div class="col-lg">
                                    <label for="">BS Khatiyan No.</label>
                                    <input type="text" v-model="formData.land_kbs" name="" class="form-control"
                                        placeholder="BS Khatiyan No." required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="#" class="btn btn-primary">Add Land Reg Details</button>
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
                            <h3 class="text-light">Manage Land Registration Details</h3>
                            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addLandRegModal"><i
                                    class="bi-plus-circle me-2"></i>Add New Land Registration</button>
                        </div>
                        <div class="card-body">
                            <table class="table table-secondary table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Customer's Name</th>
                                        <th scope="col">Customer's ID</th>
                                        <th scope="col">File No.</th>
                                        <th scope="col">Building No.</th>
                                        <th scope="col">Land Size(Decimal per Person)</th>
                                        <th scope="col">Land Registration Date</th>
                                        <th scope="col">Land Registration Sub-deed No.</th>
                                        <th scope="col">CS Daag No.</th>
                                        <th scope="col">SA Daag No.</th>
                                        <th scope="col">RS Daag No.</th>
                                        <th scope="col">BS Daag No.</th>
                                        <th scope="col">CS Khatiyan No.</th>
                                        <th scope="col">SA Khatiyan No.</th>
                                        <th scope="col">RS Khatiyan No.</th>
                                        <th scope="col">BS Khatiyan No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in land_reg_details" :key="item.id">
                                        <td>@{{ index + 1 }}</td>
                                        <td>@{{ item.customer.name1 }}</td>
                                        <td>@{{ item.customer.customer_id }}</td>
                                        <td>@{{ item.customer.file_no }}</td>
                                        <td>@{{ item.customer.building.no }}</td>
                                        <td>@{{ item.individual_land_size }}</td>
                                        <td>@{{ item.land_reg_date }}</td>
                                        <td>@{{ item.land_reg_sub_deed_no }}</td>
                                        <td>@{{ item.land_dcs }}</td>
                                        <td>@{{ item.land_dsa }}</td>
                                        <td>@{{ item.land_drs }}</td>
                                        <td>@{{ item.land_dbs }}</td>
                                        <td>@{{ item.land_kcs }}</td>
                                        <td>@{{ item.land_ksa }}</td>
                                        <td>@{{ item.land_krs }}</td>
                                        <td>@{{ item.land_kbs }}</td>
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
                        formData: {
                            customer_id: '',
                            land_reg_date: '',
                            land_reg_sub_deed_no: '',
                            individual_land_size: '',
                            mouza_name: '',
                            land_dcs: '',
                            land_dsa: '',
                            land_drs: '',
                            land_dbs: '',
                            land_kcs: '',
                            land_ksa: '',
                            land_krs: '',
                            land_kbs: '',
                        },
                        land_reg_details: [],
                    }
                },

                methods: {
                    addLandDetails() {
                        let formData = new FormData();
                        axios.post('http://127.0.0.1:8000/api/registration/store_land_details', this.formData)
                            .then((response) => {
                                console.log(response);
                                if (response.data.status == 200) {
                                    this.formData.customer_id = '';
                                    this.formData.land_reg_date = '';
                                    this.formData.land_reg_sub_deed_no = '';
                                    this.formData.individual_land_size = '';
                                    this.formData.mouza_name = '';
                                    this.formData.land_dcs = '';
                                    this.formData.land_dsa = '';
                                    this.formData.land_drs = '';
                                    this.formData.land_dbs = '';
                                    this.formData.land_kcs = '';
                                    this.formData.land_ksa = '';
                                    this.formData.land_krs = '';
                                    this.formData.land_kbs = '';
                                    this.$refs.addCloseBtn.click();
                                    Swal.fire(
                                        'Added!',
                                        'Land Registration Details Added Successfully!',
                                        'success'
                                    );

                                }
                                this.fetchAll();
                                // $('#success').html(response.data.message)
                            }).catch((errors) => {
                                console.log(errors);
                            });
                    },

                    fetchAll() {
                        axios.get('http://127.0.0.1:8000/api/registration/land_details')
                            .then(response => this.land_reg_details = response.data.land_reg_details)
                            .catch(error => console.log(error));
                    },
                },

                mounted() {
                    axios.get('http://127.0.0.1:8000/api/registration/land_details')
                        .then(response => {
                            this.customers = response.data.customer;
                            this.land_reg_details = response.data.land_reg_details;
                        })
                        .catch(error => console.log(error));
                },
            });

        app.mount("#app");
    </script>
@endsection
