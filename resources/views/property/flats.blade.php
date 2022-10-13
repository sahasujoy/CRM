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
                        <li class="breadcrumb-item">
                            <span>Property</span>
                        </li>
                        <li class="breadcrumb-item active"><span>Flats</span></li>
                    </ol>
                </nav>
            </div>
        </header>

        <div class="modal fade" id="addFlatModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Flat</h5>
                        <button type="button" class="btn-close" ref="submitBtn" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" @submit.prevent="addFlat" id="add_flat_form">
                        {{-- @csrf --}}
                        <div class="modal-body p-4 bg-light">
                            <div class="my-2">
                                <label for="building_id">Building Name</label>
                                <select v-model="formData.building_id" name="building_id" class="form-control">
                                    <option value="" disabled selected>Select a Building</option>
                                    @foreach ($buildings as $buildingitem)
                                        <option value="{{ $buildingitem->id }}">{{ $buildingitem->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="my-2">
                                <label for="no">Flat No.</label>
                                <input type="text" v-model="formData.no" name="no" class="form-control"
                                    placeholder="Flat No." required>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="floor">Flat Floor No.</label>
                                    <input type="text" v-model="formData.floor" name="floor" class="form-control"
                                        placeholder="Flat Floor No." required>
                                </div>
                                <div class="col-lg">
                                    <label for="face_direction">Flat Face Direction</label>
                                    <input type="text" v-model="formData.face_direction" name="face_direction"
                                        class="form-control" placeholder="Flat Face Direction" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="size">Flat Size</label>
                                    <input type="text" v-model="formData.size" name="size" class="form-control"
                                        placeholder="Flat Size" required>
                                </div>
                                <div class="my-2">
                                    <label for="sell_status">Sell Status</label>
                                    <select v-model="formData.sell_status" name="sell_status" class="form-control">
                                        <option value="" disabled selected>Select a Sell Status</option>
                                        <option value="Sold">Sold</option>
                                        <option value="Unsold">Unsold</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="add_flat_btn" class="btn btn-primary">Add Flat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editFlatModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Building</h5>
                        <button type="button" class="btn-close" ref="submitBtn" data-bs-dismiss="modal" ref="submitBtn"
                            aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" @submit.prevent="updateFlat(flat.id)" id="add_flat_form">
                        {{-- @csrf --}}
                        <div class="modal-body p-4 bg-light">
                            <div class="my-2">
                                <label for="building_id">Building Name</label>
                                <select v-model="flat.building_id" name="building_id" class="form-control">
                                    <option value="flat.building.name" disabled selected></option>
                                    @foreach ($buildings as $buildingitem)
                                        <option value="{{ $buildingitem->id }}">{{ $buildingitem->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="my-2">
                                <label for="no">Flat No.</label>
                                <input type="text" v-model="flat.no" name="no" class="form-control"
                                    placeholder="Flat No." required>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="floor">Flat Floor No.</label>
                                    <input type="text" v-model="flat.floor" name="floor" class="form-control"
                                        placeholder="Flat Floor No." required>
                                </div>
                                <div class="col-lg">
                                    <label for="face_direction">Flat Face Direction</label>
                                    <input type="text" v-model="flat.face_direction" name="face_direction"
                                        class="form-control" placeholder="Flat Face Direction" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="size">Flat Size</label>
                                    <input type="text" v-model="flat.size" name="size" class="form-control"
                                        placeholder="Flat Size" required>
                                </div>
                                <div class="my-2">
                                    <label for="sell_status">Sell Status</label>
                                    <select v-model="flat.sell_status" name="sell_status" class="form-control">
                                        <option value="" disabled selected>@{{ flat.sell_status }}</option>
                                        <option value="Sold">Sold</option>
                                        <option value="Unsold">Unsold</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="add_flat_btn" class="btn btn-primary">Update Flat</button>
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
                            <h3 class="text-light">Manage Flats</h3>
                            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addFlatModal"><i
                                    class="bi-plus-circle me-2"></i>Add New Flat</button>
                        </div>
                        <div class="card-body">
                            <table class="table table-secondary table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Building No.</th>
                                        <th scope="col">Flat No.</th>
                                        <th scope="col">Flat Floor No.</th>
                                        <th scope="col">Flat Face Direction</th>
                                        <th scope="col">Flat Size</th>
                                        <th scope="col">Sell Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(flat, index) in flats" :key="flat.id">
                                        <td>@{{ index + 1 }}</td>
                                        <td>@{{ flat.building.no }}</td>
                                        <td>@{{ flat.no }}</td>
                                        <td>@{{ flat.floor }}</td>
                                        <td>@{{ flat.face_direction }}</td>
                                        <td>@{{ flat.size }}</td>
                                        <td>@{{ flat.sell_status }}</td>
                                        <td>
                                            <a href="#" id="#" class="text-success mx-1 editIcon"
                                                @click.prevent="editFlat(flat.id)" data-bs-toggle="modal"
                                                data-bs-target="#editFlatModal"><i class="bi-pencil-square h4"></i></a>
                                            <a href="#" id="#" class="text-danger mx-1 deleteIcon"
                                                @click.prevent="deleteFlat(flat.id)"><i class="bi-trash h4"></i></a>
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
                    flats: [],
                    formData: {
                        building_id: '',
                        no: '',
                        floor: '',
                        face_direction: '',
                        size: '',
                        sell_status: '',
                    },
                    flat: {},
                }
            },

            methods: {
                addFlat() {
                    let formData = new FormData();
                    axios.post('http://127.0.0.1:8000/api/property/store_flat', this.formData)
                        .then((response) => {
                            console.log(response);
                            if (response.data.status == 200) {
                                this.formData.building_id = '';
                                this.formData.no = '';
                                this.formData.floor = '';
                                this.formData.face_direction = '';
                                this.formData.size = '';
                                this.formData.sell_status = '';
                                this.$refs.submitBtn.click();
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

                fetchAll() {
                    axios.get('http://127.0.0.1:8000/api/property/flats')
                        .then(response => this.flats = response.data)
                        .catch(error => console.log(error));
                },

                editFlat(id) {
                    let url = `http://127.0.0.1:8000/api/property/edit_flat/${id}`;
                    axios.get(url).then(response => {
                        this.flat = response.data;
                        console.log(this.flat);
                    }).catch(error => {
                        console.log(error);
                    });
                },

                updateFlat(id) {
                    let url = `http://127.0.0.1:8000/api/property/update_flat/${id}`;
                    axios.post(url, this.flat)
                        .then((response) => {
                            console.log(response);
                            if (response.data.status == 200) {
                                this.flat.building_id = '';
                                this.flat.no = '';
                                this.flat.floor = '';
                                this.flat.face_direction = '';
                                this.flat.size = '';
                                this.flat.sell_status = '';
                                this.$refs.submitBtn.click();
                                Swal.fire(
                                    'Updated!',
                                    'Flat Data Updated Successfully!',
                                    'success'
                                );

                            }
                            this.fetchAll();
                            // $('#success').html(response.data.message)
                        }).catch((errors) => {
                            console.log(errors);
                        });
                },

                async deleteFlat(id) {
                    // alert(id);
                    let url = `http://127.0.0.1:8000/api/property/delete_flat/${id}`;
                    await axios.delete(url).then(response => {
                        if (response.data.status == 200) {
                            Swal.fire(
                                'Deleted!',
                                'Flat Data has been deleted.',
                                'success'
                            )
                            this.fetchAll();
                        }
                    }).catch(error => {
                        console.log(error);
                    });
                },
            },

            mounted() {
                axios.get('http://127.0.0.1:8000/api/property/flats')
                    .then(response => this.flats = response.data)
                    .catch(error => console.log(error));
            },
        });

        app.mount("#app");
    </script>
@endsection
