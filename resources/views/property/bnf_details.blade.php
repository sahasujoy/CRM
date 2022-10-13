@extends('master')
@section('content')
    <div class="content" id="app">
        <header>
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0 ms-2">
                        <li class="breadcrumb-item">
                            <span>Home</span>
                        </li>
                        <li class="breadcrumb-item active"><span>Building & Flat Details</span></li>
                    </ol>
                </nav>
            </div>
        </header>

        <div class="container">
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                            <h3 class="text-light">Building & Flat Details</h3>
                            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addBuildingModal"><i
                                    class="bi-plus-circle me-2"></i>Add Building Information</button>
                        </div>
                        <div class="card-body" id="#">
                            <table class="table table-secondary table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Building Name</th>
                                        <th scope="col">Building Location</th>
                                        <th scope="col">Road No.</th>
                                        <th scope="col">Building Face Direction</th>
                                        <th scope="col">Building Number</th>
                                        <th scope="col">Total Number of Floors</th>
                                        <th scope="col">Total Number of Flats</th>
                                        <th scope="col">Work Start Date</th>
                                        <th scope="col">Work Complete Date</th>
                                        <th scope="col">Work Complete Extended Date</th>
                                        <th scope="col">Number of Flat Sold</th>
                                        <th scope="col">Number of Flat Unsold</th>
                                        <th scope="col">Update Building Information</th>
                                        <th scope="col">Add Flat</th>
                                        <th scope="col">Action View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(building, index) in buildings" :key="building.id">
                                        <td>@{{ index + 1 }}</td>
                                        <td>@{{ building.name }}</td>
                                        <td>@{{ building.location }}</td>
                                        <td>@{{ building.road_no }}</td>
                                        <td>@{{ building.face_direction }}</td>
                                        <td>@{{ building.no }}</td>
                                        <td>@{{ building.floors }}</td>
                                        <td>@{{ building.flats }} <br>
                                            {{-- <a href="{{ route('bnf.fbyb', ['id' => $building->id]) }}" class="btn btn-primary" role="button">details</a> --}}
                                        </td>
                                        <td>@{{ building.start_date }}</td>
                                        <td>@{{ building.complete_date }}</td>
                                        <td>@{{ building.complete_extended_date }}</td>
                                        <td>@{{ building.no_of_sold }}</td>
                                        <td>@{{ building.no_of_unsold }}</td>
                                        <td><a href="#" id="#" @click.prevent="editBuilding(building.id)" class="text-success mx-1 editIcon"
                                                data-bs-toggle="modal" data-bs-target="#editBuildingModal"><i
                                                    class="bi-pencil-square h4"></i></a></td>
                                        <td><a href="#" id="#" @click.prevent="findBuilding(building.id)"
                                                class="text-success mx-1 editIcon" data-bs-toggle="modal"
                                                data-bs-target="#addFlatModal"><i
                                                    class="bi bi-plus h3"></i></a></td>
                                        <td>
                                            <a :href="'/property/fbyb/'+building.id" id="#" class = "text-success mx-1">
                                            <i class="bi bi-eye h4"></i></a>
                                        </td>


                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addFlatModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add New Flat</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            ref="addFlatCloseBtn" aria-label="Close"></button>
                                                    </div>
                                                    <form action="#" method="POST" @submit.prevent="addFlat()" id="add_flat_form"
                                                        enctype="multipart/form-data">
                                                        {{-- @csrf --}}
                                                        <div class="modal-body p-4 bg-light">
                                                            <div class="my-2">
                                                                <label for="">Building Name</label>
                                                                <input type="text" :value="flatBuilding.name" disabled>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg">
                                                                    <label for="">Road No.</label>
                                                                    <input type="text" :value="flatBuilding.road_no"
                                                                        disabled>
                                                                </div>
                                                                <div class="col-lg">
                                                                    <label for="">Building Number</label>
                                                                    <input type="text" :value="flatBuilding.no" disabled>
                                                                </div>
                                                                <div class="col-lg">
                                                                    <label for="">Building Face Direction</label>
                                                                    <input type="text" :value="flatBuilding.face_direction" disabled>
                                                                </div>
                                                                <div class="col-lg">
                                                                    <label for="">Building Location</label>
                                                                    <input type="text" :value="flatBuilding.location" disabled>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <h6><u>Add Flat Details</u></h6>
                                                            <input type="text" name="building_id" v-model="flatFormData.building_id"
                                                                hidden>
                                                            <div class="my-2">
                                                                <label for="no">Flat No.</label>
                                                                <input type="text" v-model="flatFormData.no"
                                                                    name="no" class="form-control"
                                                                    placeholder="Flat No." required>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg">
                                                                    <label for="floor">Flat Floor No.</label>
                                                                    <input type="text" v-model="flatFormData.floor"
                                                                        name="floor" class="form-control"
                                                                        placeholder="Flat Floor No." required>
                                                                </div>
                                                                <div class="col-lg">
                                                                    <label for="face_direction">Flat Face Direction</label>
                                                                    <input type="text"
                                                                        v-model="flatFormData.face_direction"
                                                                        name="face_direction" class="form-control"
                                                                        placeholder="Flat Face Direction" required>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg">
                                                                    <label for="size">Flat Size</label>
                                                                    <input type="text" v-model="flatFormData.size"
                                                                        name="size" class="form-control"
                                                                        placeholder="Flat Size" required>
                                                                </div>
                                                                <div class="my-2">
                                                                    <label for="sell_status">Sell Status</label>
                                                                    <select v-model="flatFormData.sell_status"
                                                                        name="sell_status" class="form-control">
                                                                        <option value="" disabled selected>Select a Sell Status</option>
                                                                        <option value="Sold">Sold</option>
                                                                        <option value="Unsold">Unsold</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" id="add_flat_btn"
                                                                class="btn btn-primary">Add Flat</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

        <div class="modal fade" id="addBuildingModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Building</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" ref="addCloseBtn"
                            aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" id="add_building_form" @submit.prevent="addBuilding">
                        @csrf
                        <div class="modal-body p-4 bg-light">
                            <div class="my-2">
                                <label for="land_id">Land Mouza Name</label>
                                <select name="land_id" v-model="formData.land_id" class="form-control">
                                    <option value="" disabled selected>Select a land</option>
                                    <option v-for="land in lands" :value="land.id">@{{ land.mouza_name }}</option>
                                </select>
                            </div>
                            <div class="my-2">
                                <label for="name">Building Name</label>
                                <input type="text" v-model="formData.name" name="name" class="form-control"
                                    placeholder="Building Name" required>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="road_no">Road No.</label>
                                    <input type="text" v-model="formData.road_no" name="road_no" class="form-control"
                                        placeholder="Road No." required>
                                </div>
                                <div class="col-lg">
                                    <label for="no">Building No.</label>
                                    <input type="text" v-model="formData.no" name="no" class="form-control"
                                        placeholder="Building No." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="face_direction">Building Face Direction</label>
                                    <input type="text" v-model="formData.face_direction" name="face_direction"
                                        class="form-control" placeholder="Building Face Direction" required>
                                </div>
                                <div class="col-lg">
                                    <label for="location">Building Location</label>
                                    <input type="text" v-model="formData.location" name="location"
                                        class="form-control" placeholder="Building Location" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="floors">Total Number of Floors</label>
                                    <input type="text" v-model="formData.floors" name="floors" class="form-control"
                                        placeholder="Total Number of Floors" required>
                                </div>
                                <div class="col-lg">
                                    <label for="flats">Total Number of Flats</label>
                                    <input type="text" v-model="formData.flats" name="flats" class="form-control"
                                        placeholder="Total Number of Flats" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="start_date">Work Start Date</label>
                                    <input type="date" v-model="formData.start_date" name="start_date"
                                        class="form-control" placeholder="Work Start Date" required>
                                </div>
                                <div class="col-lg">
                                    <label for="complete_date">Work Complete Date</label>
                                    <input type="date" v-model="formData.complete_date" name="complete_date"
                                        class="form-control" placeholder="Work Complete Date" required>
                                </div>
                            </div>
                            <div class="my-2">
                                <label for="complete_extended_date">Work Complete Extended Date</label>
                                <input type="date" v-model="formData.complete_extended_date"
                                    name="complete_extended_date" class="form-control"
                                    placeholder="Work Complete Extended Date" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="add_building_btn" class="btn btn-primary">Add Building</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editBuildingModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Building</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" ref="updateCloseBtn"
                            aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" id="edit_building_form"
                        @submit.prevent="updateBuilding(building.id)">
                        @csrf
                        <div class="modal-body p-4 bg-light">
                            <div class="my-2">
                                <label for="land_id">Land Mouza Name</label>
                                <select v-model="building.land_id" name="land_id" id="land_id" class="form-control">
                                    <option value="building.lands.mouza_name" disabled selected>Select a land</option>
                                    <option v-for="land in lands" :value="land.id">@{{ land.mouza_name }}</option>
                                </select>
                            </div>
                            <div class="my-2">
                                <label for="name">Building Name</label>
                                <input type="text" v-model="building.name" name="name" id="name"
                                    class="form-control" placeholder="Building Name" required>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="road_no">Road No.</label>
                                    <input type="text" v-model="building.road_no" name="road_no" id="road_no"
                                        class="form-control" placeholder="Road No." required>
                                </div>
                                <div class="col-lg">
                                    <label for="no">Building No.</label>
                                    <input type="text" v-model="building.no" name="no" id="no"
                                        class="form-control" placeholder="Building No." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="face_direction">Building Face Direction</label>
                                    <input type="text" v-model="building.face_direction" name="face_direction"
                                        id="face_direction" class="form-control" placeholder="Building Face Direction"
                                        required>
                                </div>
                                <div class="col-lg">
                                    <label for="location">Building Location</label>
                                    <input type="text" v-model="building.location" name="location" id="location"
                                        class="form-control" placeholder="Building Location" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="floors">Total Number of Floors</label>
                                    <input type="text" v-model="building.floors" name="floors" id="floors"
                                        class="form-control" placeholder="Total Number of Floors" required>
                                </div>
                                <div class="col-lg">
                                    <label for="flats">Total Number of Flats</label>
                                    <input type="text" v-model="building.flats" name="flats" id="flats"
                                        class="form-control" placeholder="Total Number of Flats" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="start_date">Work Start Date</label>
                                    <input type="date" v-model="building.start_date" name="start_date"
                                        id="start_date" class="form-control" placeholder="Work Start Date" required>
                                </div>
                                <div class="col-lg">
                                    <label for="complete_date">Work Complete Date</label>
                                    <input type="date" v-model="building.complete_date" name="complete_date"
                                        id="complete_date" class="form-control" placeholder="Work Complete Date"
                                        required>
                                </div>
                            </div>
                            <div class="my-2">
                                <label for="complete_extended_date">Work Complete Extended Date</label>
                                <input type="date" v-model="building.complete_extended_date"
                                    name="complete_extended_date" id="complete_extended_date" class="form-control"
                                    placeholder="Work Complete Extended Date" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="edit_building_btn" class="btn btn-success">Update
                                Building</button>
                        </div>
                    </form>
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
                    buildings: [],
                    lands: [],
                    formData: {
                        land_id: '',
                        name: '',
                        road_no: '',
                        no: '',
                        face_direction: '',
                        location: '',
                        floors: '',
                        flats: '',
                        start_date: '',
                        complete_date: '',
                        complete_extended_date: '',
                    },
                    building: {},
                    flatFormData: {
                        building_id: '',
                        no: '',
                        floor: '',
                        face_direction: '',
                        size: '',
                        sell_status: '',
                    },
                    flatBuilding: {},
                }
            },

            methods: {
                findBuilding(id) {
                    this.flatFormData.building_id = id;
                    let url = `http://127.0.0.1:8000/api/property/edit_building/${id}`;
                    axios.get(url).then(response => {
                        this.flatBuilding = response.data;
                        console.log(this.flatBuilding);
                        if(this.$refs.addFlatCloseBtn.click())
                        {
                            this.flatFormData.building_id = '';
                            this.flatFormData.no = '';
                            this.flatFormData.floor = '';
                            this.flatFormData.face_direction = '';
                            this.flatFormData.size = '';
                            this.flatFormData.sell_status = '';
                        }
                    }).catch(error => {
                        console.log(error);
                    });
                },

                addFlat() {
                    let flatFormData = new FormData();
                    axios.post('http://127.0.0.1:8000/api/property/store_flat', this.flatFormData)
                        .then((response) => {
                            console.log(response);
                            if (response.data.status == 200) {
                                this.flatBuilding = {};
                                this.flatFormData.building_id = '';
                                this.flatFormData.no = '';
                                this.flatFormData.floor = '';
                                this.flatFormData.face_direction = '';
                                this.flatFormData.size = '';
                                this.flatFormData.sell_status = '';
                                this.$refs.addFlatCloseBtn.click();
                                Swal.fire(
                                    'Added!',
                                    'Flat Added Successfully!',
                                    'success'
                                );

                            }
                            this.fetchAll();
                            // $('#success').html(response.data.message)
                        }).catch((errors) => {
                            console.log(errors);
                        });
                },

                addBuilding() {
                    let formData = new FormData();
                    axios.post('http://127.0.0.1:8000/api/property/store_building', this.formData)
                        .then((response) => {
                            console.log(response);
                            if (response.data.status == 200) {
                                this.formData.land_id = '';
                                this.formData.name = '';
                                this.formData.road_no = '';
                                this.formData.no = '';
                                this.formData.face_direction = '';
                                this.formData.location = '';
                                this.formData.floors = '';
                                this.formData.flats = '';
                                this.formData.start_date = '';
                                this.formData.complete_date = '';
                                this.formData.complete_extended_date = '';
                                this.$refs.addCloseBtn.click();
                                Swal.fire(
                                    'Added!',
                                    'Building Added Successfully!',
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
                    axios.get('http://127.0.0.1:8000/api/property/bnf_details')
                        .then(response => {
                            this.buildings = response.data.buildings;
                            this.lands = response.data.lands;
                        })
                        .catch(error => console.log(error));
                },

                editBuilding(id) {
                    let url = `http://127.0.0.1:8000/api/property/edit_building/${id}`;
                    axios.get(url).then(response => {
                        this.building = response.data;
                        console.log(this.building);
                    }).catch(error => {
                        console.log(error);
                    });
                },

                updateBuilding(id) {
                    let url = `http://127.0.0.1:8000/api/property/update_building/${id}`;
                    axios.post(url, this.building)
                        .then((response) => {
                            console.log(response);
                            if (response.data.status == 200) {
                                this.building = {};
                                this.$refs.updateCloseBtn.click();
                                Swal.fire(
                                    'Updated!',
                                    'Building Data Updated Successfully!',
                                    'success'
                                );

                            }
                            this.fetchAll();
                            // $('#success').html(response.data.message)
                        }).catch((errors) => {
                            console.log(errors);
                        });
                },
            },

            mounted() {
                axios.get('http://127.0.0.1:8000/api/property/bnf_details')
                    .then(response => {
                        this.buildings = response.data.buildings;
                        this.lands = response.data.lands;
                    })
                    .catch(error => console.log(error));
            },
        });

        app.mount("#app");
    </script>
@endsection
