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
                <span>Client Due Amount Details</span>
              </li>
            <li class="breadcrumb-item active"><span>Registration Payment & Due</span></li>
          </ol>
        </nav>
    </div>
</header>

<div class="container">
    <div class="row my-5">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
            <h3 class="text-light">Registration Amount Payment & Due Details</h3>
          </div>
          <div class="card-body" id="show_all_dues">
            <table class="table table-secondary table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer's ID</th>
                    <th scope="col">Customer's Name</th>
                    <th scope="col">File No.</th>
                    <th scope="col">Land Registry Amount</th>
                    <th scope="col">Payment Complete Amount</th>
                    <th scope="col">Mutation Cost</th>
                    <th scope="col">Payment Complete Amount</th>
                    <th scope="col">Flat Registration Cost</th>
                    <th scope="col">Payment Complete Amount</th>
                    <th scope="col">Power of Attorney Cost</th>
                    <th scope="col">Payment Complete Amount</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <tr v-for="(customer, index) in customers" :key="customer.id">
                  <td>@{{ index + 1 }}</td>
                  <td>@{{ customer.customer_id }}</td>
                  <td>@{{ customer.name1 }}</td>
                  <td>@{{ customer.file_no }}</td>
                  <td>@{{ customer.prices.land_reg_cost }}</td>
                  <td>@{{ customer.payments.land_reg_cost }}</td>
                  <td>@{{ customer.prices.mutation_cost }}</td>
                  <td>@{{ customer.payments.mutation_cost }}</td>
                  <td>@{{ customer.prices.flat_reg_cost }}</td>
                  <td>@{{ customer.payments.flat_reg_cost }}</td>
                  <td>@{{ customer.prices.poa_cost }}</td>
                  <td>@{{ customer.payments.poa_cost }}</td>
                  <td>
                    {{-- <a href="#" id="#" class = "text-success mx-1 editIcon" data-bs-toggle = "modal" data-bs-target = "#editEngineerModal"><i class = "bi-pencil-square h4"></i></a> --}}
                    <a href="#" id="#" class = "text-danger mx-1 deleteIcon"><i class = "bi-trash h4"></i></a>
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
            }
        },

        methods: {

        },

        mounted() {
            axios.get('http://127.0.0.1:8000/api/fetch_all_regdues')
                .then(response => {
                    this.customers = response.data;
                })
                .catch(error => console.log(error));
        },
    });

    app.mount("#app");
    </script>
    @endsection
