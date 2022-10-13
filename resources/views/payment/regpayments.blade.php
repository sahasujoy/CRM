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
                <!-- if breadcrumb is single--><span>Client Payment List</span>
              </li>
            <li class="breadcrumb-item active"><span>Registration Payment</span></li>
          </ol>
        </nav>
    </div>
</header>

<div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add New Payment</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" ref="addCloseBtn" aria-label="Close"></button>
    </div>
    <form action="#" @submit.prevent="addPayment" method="POST" id="add_payment_form">
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
            <label for="land_reg_cost">Land Registration Cost Payment</label>
            <input type="number" v-model="formData.land_reg_cost" name="land_reg_cost" class="form-control" placeholder="Land Registration Cost Payment" required>
          </div>
          <div class="col-lg">
            <label for="mutation_cost">Mutation Cost Payment</label>
            <input type="number" v-model="formData.mutation_cost" name="mutation_cost" class="form-control" placeholder="Mutation Cost Payment" required>
          </div>
        </div>
        <div class="row">
          <div class="col-lg">
            <label for="flat_reg_cost">Flat Registration Cost Payment</label>
            <input type="number" v-model="formData.flat_reg_cost" name="flat_reg_cost" class="form-control" placeholder="Flat Registration Cost Payment" required>
          </div>
          <div class="col-lg">
            <label for="poa_cost">Power of Attorney Cost Payment</label>
            <input type="number" v-model="formData.poa_cost" name="poa_cost" class="form-control" placeholder="Power of Attorney Cost Payment" required>
          </div>
        </div>
        <div class="row">
            <div class="col-lg">
              <label for="booking_money">Booking Money</label>
              <input type="number" v-model="formData.booking_money" name="booking_money" class="form-control" placeholder="Booking Money" required>
            </div>
            <div class="col-lg">
              <label for="downpayment">Downpayment Amount</label>
              <input type="number" v-model="formData.downpayment" name="downpayment" class="form-control" placeholder="Downpayment Amount" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="land_piling_money1">Land Piling Money 1</label>
              <input type="number" v-model="formData.land_piling_money1" name="land_piling_money1" class="form-control" placeholder="Land Piling Money 1" required>
            </div>
            <div class="col-lg">
              <label for="land_piling_money2">Land Piling Money 2</label>
              <input type="number" v-model="formData.land_piling_money2" name="land_piling_money2" class="form-control" placeholder="Land Piling Money 2" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="building_piling">Building Piling Amount</label>
              <input type="number" v-model="formData.building_piling" name="building_piling" class="form-control" placeholder="Building Piling Amount" required>
            </div>
            <div class="col-lg">
              <label for="first_roof_cast">First Roof Casting Amount</label>
              <input type="number" v-model="formData.first_roof_cast" name="first_roof_cast" class="form-control" placeholder="First Roof Casting Amount" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="top_roof_cast">Top Roof Casting Amount</label>
              <input type="number" v-model="formData.top_roof_cast" name="top_roof_cast" class="form-control" placeholder="Top Roof Casting Amount" required>
            </div>
            <div class="col-lg">
              <label for="final_work_cost">Final Work Amount</label>
              <input type="number" v-model="formData.final_work_cost" name="final_work_cost" class="form-control" placeholder="Final Work Amount" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="car_parking">Car Parking Cost</label>
              <input type="number" v-model="formData.car_parking" name="car_parking" class="form-control" placeholder="Car Parking Cost" required>
            </div>
            <div class="col-lg">
              <label for="installments">No. of Paid Installments</label>
              <input type="number" v-model="formData.installments" name="installments" class="form-control" placeholder="No. of Paid Installments" required>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="add_payment_btn" class="btn btn-primary">Add Payment</button>
      </div>
    </form>
  </div>
</div>
</div>

<div class="modal fade" id="editPaymentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" ref="updateCloseBtn"
                            aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" id="edit_payment_form"
                        @submit.prevent="updatePayment(payment.id)">
                        @csrf
                        <div class="modal-body p-4 bg-light">
                            <div class="my-2">
                                <label for="registration_id">File No.</label>
                                    <select v-model="payment.registration_id" name="registration_id" class="form-control">
                                        <option value="" disabled selected>Select a File No.</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->file_no }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="row">
                              <div class="col-lg">
                                <label for="land_reg_cost">Land Registration Cost Payment</label>
                                <input type="number" v-model="payment.land_reg_cost" name="land_reg_cost" class="form-control" placeholder="Land Registration Cost Payment" required>
                              </div>
                              <div class="col-lg">
                                <label for="mutation_cost">Mutation Cost Payment</label>
                                <input type="number" v-model="payment.mutation_cost" name="mutation_cost" class="form-control" placeholder="Mutation Cost Payment" required>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg">
                                <label for="flat_reg_cost">Flat Registration Cost Payment</label>
                                <input type="number" v-model="payment.flat_reg_cost" name="flat_reg_cost" class="form-control" placeholder="Flat Registration Cost Payment" required>
                              </div>
                              <div class="col-lg">
                                <label for="poa_cost">Power of Attorney Cost Payment</label>
                                <input type="number" v-model="payment.poa_cost" name="poa_cost" class="form-control" placeholder="Power of Attorney Cost Payment" required>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                  <label for="booking_money">Booking Money</label>
                                  <input type="number" v-model="payment.booking_money" name="booking_money" class="form-control" placeholder="Booking Money" required>
                                </div>
                                <div class="col-lg">
                                  <label for="downpayment">Downpayment Amount</label>
                                  <input type="number" v-model="payment.downpayment" name="downpayment" class="form-control" placeholder="Downpayment Amount" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg">
                                  <label for="land_piling_money1">Land Piling Money 1</label>
                                  <input type="number" v-model="payment.land_piling_money1" name="land_piling_money1" class="form-control" placeholder="Land Piling Money 1" required>
                                </div>
                                <div class="col-lg">
                                  <label for="land_piling_money2">Land Piling Money 2</label>
                                  <input type="number" v-model="payment.land_piling_money2" name="land_piling_money2" class="form-control" placeholder="Land Piling Money 2" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg">
                                  <label for="building_piling">Building Piling Amount</label>
                                  <input type="number" v-model="payment.building_piling" name="building_piling" class="form-control" placeholder="Building Piling Amount" required>
                                </div>
                                <div class="col-lg">
                                  <label for="first_roof_cast">First Roof Casting Amount</label>
                                  <input type="number" v-model="payment.first_roof_cast" name="first_roof_cast" class="form-control" placeholder="First Roof Casting Amount" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg">
                                  <label for="top_roof_cast">Top Roof Casting Amount</label>
                                  <input type="number" v-model="payment.top_roof_cast" name="top_roof_cast" class="form-control" placeholder="Top Roof Casting Amount" required>
                                </div>
                                <div class="col-lg">
                                  <label for="final_work_cost">Final Work Amount</label>
                                  <input type="number" v-model="payment.final_work_cost" name="final_work_cost" class="form-control" placeholder="Final Work Amount" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg">
                                  <label for="car_parking">Car Parking Cost</label>
                                  <input type="number" v-model="payment.car_parking" name="car_parking" class="form-control" placeholder="Car Parking Cost" required>
                                </div>
                                <div class="col-lg">
                                  <label for="installments">No. of Paid Installments</label>
                                  <input type="number" v-model="payment.installments" name="installments" class="form-control" placeholder="No. of Paid Installments" required>
                                </div>
                              </div>
                          </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="edit_building_btn" class="btn btn-success">Update
                                Payment</button>
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
            <h3 class="text-light">Manage Regirtration Payments</h3>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addPaymentModal"><i
                class="bi-plus-circle me-2"></i>Add New Payment</button>
          </div>
          <div class="card-body" id="show_all_payments">
            <table class="table table-secondary table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">File No.</th>
                    <th scope="col">Land Registry Cost Payment</th>
                    <th scope="col">Mutation Cost Payment</th>
                    <th scope="col">Flat Registration Cost Payment</th>
                    <th scope="col">Power of Attorney Cost Payment</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <tr v-for="(payment, index) in payments" :key="payment.id">
                  <td>@{{ index +1 }}</td>
                  <td>@{{ payment.customer.file_no }}</td>
                  <td>@{{ payment.land_reg_cost }}</td>
                  <td>@{{ payment.mutation_cost }}</td>
                  <td>@{{ payment.flat_reg_cost }}</td>
                  <td>@{{ payment.poa_cost }}</td>
                  <td>
                    <a href="#" id="#" @click.prevent="editPayment(payment.id)" class = "text-success mx-1 editIcon" data-bs-toggle = "modal" data-bs-target = "#editPaymentModal"><i class = "bi-pencil-square h4"></i></a>
                    <a href="#" id="#" @click.prevent="deletePayment(payment.id)" class = "text-danger mx-1 deleteIcon"><i class = "bi-trash h4"></i></a>
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
                payments: [],
                formData: {
                    registration_id: '',
                    land_reg_cost: '',
                    mutation_cost: '',
                    flat_reg_cost: '',
                    poa_cost: '',
                    booking_money: '',
                    downpayment: '',
                    land_piling_money1: '',
                    land_piling_money2: '',
                    building_piling: '',
                    first_roof_cast: '',
                    top_roof_cast: '',
                    final_work_cost: '',
                    car_parking: '',
                    installments: '',
                },
                payment: {},
            }
        },

        methods: {
            addPayment() {
                let formData = new FormData();
                axios.post('http://127.0.0.1:8000/api/store_payment', this.formData)
                    .then((response) => {
                        console.log(response);
                        if (response.data.status == 200) {
                            this.formData.registration_id = '';
                            this.formData.land_reg_cost = '';
                            this.formData.mutation_cost = '';
                            this.formData.flat_reg_cost = '';
                            this.formData.poa_cost = '';
                            this.formData.booking_money = '';
                            this.formData.downpayment = '';
                            this.formData.land_piling_money1 = '';
                            this.formData.land_piling_money2 = '';
                            this.formData.building_piling = '';
                            this.formData.first_roof_cast = '';
                            this.formData.top_roof_cast = '';
                            this.formData.final_work_cost = '';
                            this.formData.car_parking = '';
                            this.formData.installments = '';
                            this.$refs.addCloseBtn.click();
                            Swal.fire(
                                'Added!',
                                'Payment Added Successfully!',
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
                axios.get('http://127.0.0.1:8000/api/fetch_all_regpayments')
                    .then(response => this.payments = response.data)
                    .catch(error => console.log(error));
            },

            editPayment(id) {
                let url = `http://127.0.0.1:8000/api/edit_payment/${id}`;
                axios.get(url).then(response => {
                    this.payment = response.data;
                    console.log(this.payment);
                }).catch(error => {
                    console.log(error);
                });
            },

            updatePayment(id) {
                let url = `http://127.0.0.1:8000/api/update_payment/${id}`;
                axios.post(url, this.payment)
                    .then((response) => {
                        console.log(response);
                        if (response.data.status == 200) {
                            this.payment = {};
                            this.$refs.updateCloseBtn.click();
                            Swal.fire(
                                'Updated!',
                                'Payment Data Updated Successfully!',
                                'success'
                            );

                        }
                        this.fetchAll();
                        // $('#success').html(response.data.message)
                    }).catch((errors) => {
                        console.log(errors);
                    });
            },

            async deletePayment(id) {
                // alert(id);
                let url = `http://127.0.0.1:8000/api/delete_payment/${id}`;
                await axios.delete(url).then(response => {
                    if (response.data.status == 200) {
                        Swal.fire(
                            'Deleted!',
                            'Payment Data has been deleted.',
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
            axios.get('http://127.0.0.1:8000/api/fetch_all_regpayments')
                .then(response => this.payments = response.data)
                .catch(error => console.log(error));
        },
    });

    app.mount("#app");
    </script>
    @endsection
