@extends('layouts.sleek.main')

@section('content')
<!-- First Row  -->
<div class="row">
  <div class="col-md-6 col-lg-6 col-xl-3">
    <div class="media widget-media p-4 bg-white border">
      <div class="icon rounded-circle mr-4 bg-primary">
        <i class="mdi mdi-account-outline text-white "></i>
      </div>
      <div class="media-body align-self-center">
        <h4 class="text-primary mb-2">5300</h4>
        <p>New Users</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-6 col-xl-3">
    <div class="media widget-media p-4 bg-white border">
      <div class="icon rounded-circle bg-warning mr-4">
        <i class="mdi mdi-cart-outline text-white "></i>
      </div>
      <div class="media-body align-self-center">
        <h4 class="text-primary mb-2">1953</h4>
        <p>Order Placed</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-6 col-xl-3">
    <div class="media widget-media p-4 bg-white border">
      <div class="icon rounded-circle mr-4 bg-danger">
        <i class="mdi mdi-cart-outline text-white "></i>
      </div>
      <div class="media-body align-self-center">
        <h4 class="text-primary mb-2">1450</h4>
        <p>Total Sales</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-6 col-xl-3">
    <div class="media widget-media p-4 bg-white border">
      <div class="icon bg-success rounded-circle mr-4">
        <i class="mdi mdi-diamond text-white "></i>
      </div>
      <div class="media-body align-self-center">
        <h4 class="text-primary mb-2">9503</h4>
        <p>Monthly Revenue</p>
      </div>
    </div>
  </div>
</div>
@endsection