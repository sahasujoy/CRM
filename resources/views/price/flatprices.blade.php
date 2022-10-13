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
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Client Price Information</span>
              </li>
            <li class="breadcrumb-item active"><span>Registered Flat Prices</span></li>
          </ol>
        </nav>
    </div>
</header>


<div class="modal fade" id="addPriceModal" tabindex="-1" aria-labelledby="exampleModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add New Price</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" ref="addCloseBtn" aria-label="Close"></button>
    </div>
    <form action="#" @submit.prevent="addPrice" method="POST" id="add_price_form">
      @csrf
      <div class="modal-body p-4 bg-light">
        <div class="my-2">
            <label for="registration_id">File No.</label>
                <select v-model="formData.registration_id" name="registration_id" class="form-control">
                    <option value="" disabled selected>Select a File No.</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->file_no }}</option>
                    @endforeach
                </select>
        </div>
        <div class="row">
          <div class="col-lg">
            <label for="land_reg_cost">Land Registration Cost</label>
            <input type="number" v-model="formData.land_reg_cost" name="land_reg_cost" class="form-control" placeholder="Land Registration Cost" required>
          </div>
          <div class="col-lg">
            <label for="mutation_cost">Mutation Cost</label>
            <input type="number" v-model="formData.mutation_cost" name="mutation_cost" class="form-control" placeholder="Mutation Cost" required>
          </div>
        </div>
        <div class="row">
          <div class="col-lg">
            <label for="flat_reg_cost">Flat Registration Cost</label>
            <input type="number" v-model="formData.flat_reg_cost" name="flat_reg_cost" class="form-control" placeholder="Flat Registration Cost" required>
          </div>
          <div class="col-lg">
            <label for="poa_cost">Power of Attorney Cost</label>
            <input type="number" v-model="formData.poa_cost" name="poa_cost" class="form-control" placeholder="Power of Attorney Cost" required>
          </div>
        </div>
        <div class="row">
            <div class="col-lg">
              <label for="flat_price">Flat Price</label>
              <input type="number" v-model="formData.flat_price" name="flat_price" class="form-control" placeholder="Flat Price" required>
            </div>
            <div class="col-lg">
              <label for="utility_charge">Utility Charge</label>
              <input type="number" v-model="formData.utility_charge" name="utility_charge" class="form-control" placeholder="Utility Charge" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="car_parking">Car Parking Charge</label>
              <input type="number" v-model="formData.car_parking" name="car_parking" class="form-control" placeholder="Car Parking Charge" required>
            </div>
            <div class="col-lg">
              <label for="additional_cost">Additional Cost</label>
              <input type="number" v-model="formData.additional_cost" name="additional_cost" class="form-control" placeholder="Additional Cost" required>
            </div>
          </div>
          <div class="my-2">
            <label for="installments">No. of Installments</label>
            <input type="number" v-model="formData.installments" name="installments" class="form_control" placeholder="No. of Installments" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="add_price_btn" class="btn btn-primary">Add Price</button>
      </div>
    </form>
  </div>
</div>
</div>

<div class="modal fade" id="editPriceModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Building</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" ref="updateCloseBtn"
                            aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" id="edit_building_form"
                        @submit.prevent="updatePrice(price.id)">
                        @csrf
                        <div class="modal-body p-4 bg-light">
                            <div class="my-2">
                                <label for="registration_id">File No.</label>
                                    <select v-model="price.registration_id" name="registration_id" class="form-control">
                                        <option value="" disabled selected>Select a File No.</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->file_no }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="row">
                              <div class="col-lg">
                                <label for="land_reg_cost">Land Registration Cost</label>
                                <input type="number" v-model="price.land_reg_cost" name="land_reg_cost" class="form-control" placeholder="Land Registration Cost" required>
                              </div>
                              <div class="col-lg">
                                <label for="mutation_cost">Mutation Cost</label>
                                <input type="number" v-model="price.mutation_cost" name="mutation_cost" class="form-control" placeholder="Mutation Cost" required>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg">
                                <label for="flat_reg_cost">Flat Registration Cost</label>
                                <input type="number" v-model="price.flat_reg_cost" name="flat_reg_cost" class="form-control" placeholder="Flat Registration Cost" required>
                              </div>
                              <div class="col-lg">
                                <label for="poa_cost">Power of Attorney Cost</label>
                                <input type="number" v-model="price.poa_cost" name="poa_cost" class="form-control" placeholder="Power of Attorney Cost" required>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                  <label for="flat_price">Flat Price</label>
                                  <input type="number" v-model="price.flat_price" name="flat_price" class="form-control" placeholder="Flat Price" required>
                                </div>
                                <div class="col-lg">
                                  <label for="utility_charge">Utility Charge</label>
                                  <input type="number" v-model="price.utility_charge" name="utility_charge" class="form-control" placeholder="Utility Charge" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg">
                                  <label for="car_parking">Car Parking Charge</label>
                                  <input type="number" v-model="price.car_parking" name="car_parking" class="form-control" placeholder="Car Parking Charge" required>
                                </div>
                                <div class="col-lg">
                                  <label for="additional_cost">Additional Cost</label>
                                  <input type="number" v-model="price.additional_cost" name="additional_cost" class="form-control" placeholder="Additional Cost" required>
                                </div>
                              </div>
                              <div class="my-2">
                                <label for="installments">No. of Installments</label>
                                <input type="number" v-model="price.installments" name="installments" class="form_control" placeholder="No. of Installments" required>
                              </div>
                          </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="edit_building_btn" class="btn btn-success">Update
                                Price</button>
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
            <h3 class="text-light">Manage Flat Prices</h3>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addPriceModal"><i
                class="bi-plus-circle me-2"></i>Add New Price</button>
          </div>
          <div class="card-body" id="show_all_prices">
            <table class="table table-secondary table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">File No.</th>
                    <th scope="col">Flat Price</th>
                    <th scope="col">Utility Charge</th>
                    <th scope="col">Car Parking Price</th>
                    <th scope="col">Addition Work Cost</th>
                    <th scope="col">Number of Installments</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <tr v-for="(price, index) in prices" :key="price.id">
                  <td>@{{ index + 1 }}</td>
                  <td>@{{ price.customer.file_no }}</td>
                  <td>@{{ price.flat_price }}</td>
                  <td>@{{ price.utility_charge }}</td>
                  <td>@{{ price.car_parking }}</td>
                  <td>@{{ price.additional_cost }}</td>
                  <td>@{{ price.installments }}</td>
                  <td>
                    <a href="#" id="#" @click.prevent = "editPrice(price.id)" class = "text-success mx-1 editIcon" data-bs-toggle = "modal" data-bs-target = "#editPriceModal"><i class = "bi-pencil-square h4"></i></a>
                    <a href="#" id="#" @click.prevent = "deletePrice(price.id)" class = "text-danger mx-1 deleteIcon"><i class = "bi-trash h4"></i></a>
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
                prices: [],
                formData: {
            registration_id: '',
            land_reg_cost: '',
            mutation_cost: '',
            flat_reg_cost: '',
            poa_cost: '',
            flat_price: '',
            utility_charge: '',
            car_parking: '',
            additional_cost: '',
            installments: '',
                },
                price: {},
            }
        },

        methods: {
            addPrice() {
                let formData = new FormData();
                axios.post('http://127.0.0.1:8000/api/store_price', this.formData)
                    .then((response) => {
                        console.log(response);
                        if (response.data.status == 200) {
                            this.formData.registration_id = '';
                            this.formData.land_reg_cost = '';
                            this.formData.mutation_cost = '';
                            this.formData.flat_reg_cost = '';
                            this.formData.poa_cost = '';
                            this.formData.flat_price = '';
                            this.formData.utility_charge = '';
                            this.formData.car_parking = '';
                            this.formData.additional_cost = '';
                            this.formData.installments = '';
                            this.$refs.addCloseBtn.click();
                            Swal.fire(
                                'Added!',
                                'Price Added Successfully!',
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
                axios.get('http://127.0.0.1:8000/api/fetch_all_flatprices')
                    .then(response => this.prices = response.data)
                    .catch(error => console.log(error));
            },

            editPrice(id) {
                let url = `http://127.0.0.1:8000/api/edit_price/${id}`;
                axios.get(url).then(response => {
                    this.price = response.data;
                    console.log(this.price);
                }).catch(error => {
                    console.log(error);
                });
            },

            updatePrice(id) {
                let url = `http://127.0.0.1:8000/api/update_price/${id}`;
                axios.post(url, this.price)
                    .then((response) => {
                        console.log(response);
                        if (response.data.status == 200) {
                            this.price = {};
                            this.$refs.updateCloseBtn.click();
                            Swal.fire(
                                'Updated!',
                                'Prcie Data Updated Successfully!',
                                'success'
                            );

                        }
                        this.fetchAll();
                        // $('#success').html(response.data.message)
                    }).catch((errors) => {
                        console.log(errors);
                    });
            },

            async deletePrice(id) {
                // alert(id);
                let url = `http://127.0.0.1:8000/api/delete_price/${id}`;
                await axios.delete(url).then(response => {
                    if (response.data.status == 200) {
                        Swal.fire(
                            'Deleted!',
                            'Price Data has been deleted.',
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
            axios.get('http://127.0.0.1:8000/api/fetch_all_flatprices')
                .then(response => this.prices = response.data)
                .catch(error => console.log(error));
        },
    });

app.mount("#app");
    </script>
    @endsection
