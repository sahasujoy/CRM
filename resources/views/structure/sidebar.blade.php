<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
      <img src="{{ asset('images/excelitai.png') }}"  height="46" alt="">
      <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
        <use xlink:href="{{ asset('assets/brand/coreui.svg#signet') }}"></use>
      </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">
          1. Dashboard<span class="badge badge-sm bg-info ms-auto"></span></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('customer.view') }}">
        2. Client Information</a></li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            3. Client Price Information</a>
          <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="{{ route('price.reg.view') }}"><span class="nav-icon"></span> Regisration Costs</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('price.flat.view') }}"><span class="nav-icon"></span> Registered Flat Prices</a></li>
          </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            4. Client Payment List</a>
          <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="{{ route('payment.reg.view') }}"><span class="nav-icon"></span> Regisration Payment</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('payment.flat.view') }}"><span class="nav-icon"></span> Flat Price Payment</a></li>
          </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            5. Client Due Amount Details</a>
          <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="{{ route('due.reg.view') }}"><span class="nav-icon"></span> Regisration Payment & Due</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('due.flat.view') }}"><span class="nav-icon"></span> Flat Payment & Due</a></li>
          </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            6. Customer Building & Flat Details </a>
          <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="{{ route('land.view') }}"><span class="nav-icon"></span> Lands</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('building.view') }}"><span class="nav-icon"></span> Buildings</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('flat.view') }}"><span class="nav-icon"></span> Flats</a></li>
            </ul>
        </li>
        <li class="nav-group"><a class="nav-link" href="{{ route('registration.status.view') }}">
            7. Search by Property Registration Status </a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('registration.flat.details') }}">
            8. Registration Details Client Search</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('bnf.details.view') }}">
            9. Building & Flat Details</a></li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
  </div>
