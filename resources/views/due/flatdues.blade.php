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
                <!-- if breadcrumb is single--><span>Client Due Amount Details</span>
              </li>
            <li class="breadcrumb-item active"><span>Flat Payment & Due</span></li>
          </ol>
        </nav>
    </div>
</header>

<div class="container">
    <div class="row my-5">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
            <h3 class="text-light">Flat Payment & Due Details</h3>
          </div>
          <div class="card-body" id="show_all_dues">
            <table class="table table-secondary table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer's ID</th>
                    <th scope="col">Customer's Name</th>
                    <th scope="col">File No.</th>
                    <th scope="col">Booking Money</th>
                    <th scope="col">Downpayment Amount</th>
                    <th scope="col">Installment Payment Complete</th>
                    <th scope="col">Installment Payment Due</th>
                    <th scope="col">Other Payment Complete</th>
                    <th scope="col">Other Payment Due</th>
                    <th scope="col">Total Payable Amount</th>
                    <th scope="col">Total Payment Complete Amount</th>
                    <th scope="col">Total Payment Due Amount</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <tr v-for="(customer, index) in customers" :key="customer.id">
                  <td>@{{ index + 1 }}</td>
                  <td>@{{ customer.customer_id }}</td>
                  <td>@{{ customer.name1 }}</td>
                  <td>@{{ customer.file_no }}</td>
                  <td>@{{ customer.payments.booking_money }}</td>
                  <td>@{{ customer.payments.downpayment }}</td>
                  <td>@{{ inst_pay_complete[index] }}</td>
                  <td>@{{ inst_pay_due[index] }}</td>
                  <td>@{{ other_pay_complete[index] }}</td>
                  <td>@{{ other_pay_due[index] }}</td>
                  <td>@{{ total_payable[index] }}</td>
                  <td>@{{ total_pay_complete[index] }}</td>
                  <td>@{{ total_due[index] }}</td>
                  <td>
                    {{-- <a href="#" id="' .$customer->id. '" class = "text-success mx-1 editIcon" data-bs-toggle = "modal" data-bs-target = "#editEngineerModal"><i class = "bi-pencil-square h4"></i></a>
                    <a href="#" id="' .$customer->id. '" class = "text-danger mx-1 deleteIcon"><i class = "bi-trash h4"></i></a> --}}
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
                inst_pay_complete: [],
                inst_pay_due: [],
                other_pay_complete: [],
                other_pay_due: [],
                total_payable: [],
                total_pay_complete: [],
                total_due: [],
            }
        },

        methods: {

        },

        mounted() {
            axios.get('http://127.0.0.1:8000/api/fetch_all_flatdues')
                .then(response => {
                    this.customers = response.data;
                    this.customers.forEach((customer, index) => {
                        var total_price = customer.prices.flat_price + customer.prices.utility_charge + customer.prices.car_parking  + customer.prices.additional_cost;
                        var total_payment = customer.payments.booking_money + customer.payments.downpayment + customer.payments.land_piling_money1 + customer.payments.land_piling_money2 + customer.payments.building_piling + customer.payments.first_roof_cast + customer.payments.top_roof_cast + customer.payments.final_work_cost + customer.payments.car_parking;
                        var remaining_price = total_price - total_payment;
                        var installment_profit = (5 * (customer.prices.installments / 12) * remaining_price) / 100;
                        var total_inst_amount = remaining_price + installment_profit;
                        var per_installment = total_inst_amount / customer.prices.installments;
                        this.inst_pay_complete[index] = per_installment * customer.payments.installments;
                        this.inst_pay_due[index] = total_inst_amount - this.inst_pay_complete[index];
                        this.other_pay_complete[index] = customer.payments.land_reg_cost + customer.payments.mutation_cost + customer.payments.flat_reg_cost + customer.payments.poa_cost;
                        var other_price = customer.prices.land_reg_cost + customer.prices.mutation_cost + customer.prices.flat_reg_cost + customer.prices.poa_cost;
                        this.other_pay_due[index] = other_price - this.other_pay_complete[index];
                        this.total_payable[index] = total_price + other_price + installment_profit;
                        this.total_pay_complete[index] = total_payment + this.inst_pay_complete[index] + this.other_pay_complete[index];
                        this.total_due[index] = this.total_payable[index] - this.total_pay_complete[index];
                    });
                })
                .catch(error => console.log(error));
        },
    });

    app.mount("#app");
    </script>
    @endsection
