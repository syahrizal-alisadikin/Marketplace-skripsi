@extends('layouts.dashboard')
@section('title','Dashboard Account ')
    
@section('content')
   <!-- Page Content -->
    

    <div
      class="section-content section-dashboard-home"
      data-aos="fade-up"
    >
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">My Account</h2>
          <p class="dashboard-subtitle">
            Update your current profile
          </p>
        </div>
        <div class="dashboard-content" id="locations">
          <div class="row">
            <div class="col-12">
              <form action="{{route('dashboard-setting-update','dashboard-setting-account')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-2">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">Your Name</label>
                          <input
                            type="text"
                            class="form-control"
                            id="name"
                            aria-describedby="emailHelp"
                            name="name"
                            value="{{$user->name}}"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Your Email</label>
                          <input
                            type="email"
                            class="form-control"
                            id="email"
                            aria-describedby="emailHelp"
                            name="email"
                            value="{{$user->email}}"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="addressOne">Address 1</label>
                          <input
                            type="text"
                            class="form-control"
                            id="address_one"
                            aria-describedby="emailHelp"
                            name="address_one"
                            value="{{$user->address_one}}"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="addressTwo">Address 2</label>
                          <input
                            type="text"
                            class="form-control"
                            id="address_two"
                            aria-describedby="emailHelp"
                            name="address_two"
                            value="{{$user->address_two}}"
                          />
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label for="province">Province</label>
                          <select name="fk_provinces_id"  id="fk_provinces_id"  class="form-control">
                            <option value="{{$Provinsi->id}}">{{$Provinsi->name}}</option>
                            @foreach ($prov as $pro)
                              <option value="{{$pro->id}}">{{$pro->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="fk_regencies_id">City</label>
                        <select name="fk_regencies_id"  id="fk_regencies_id"  class="form-control">
                        <option value="{{$kota->id}}">{{$kota->name}}</option>
                          @foreach ($regency as $ko)
                          <option value="{{$ko->id}}">{{$ko->name}}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="postalCode">Zip Code</label>
                          <input
                            type="text"
                            class="form-control"
                            id="zip_code"
                            name="zip_code"
                            value="{{$user->zip_code}}"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="country">Country</label>
                          <input
                            type="text"
                            class="form-control"
                            id="country"
                            name="country"
                            value="{{$user->country}}"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="mobile">Mobile</label>
                          <input
                            type="text"
                            class="form-control"
                            id="phone_number"
                            name="phone_number"
                            value="{{$user->phone_number}}"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-right">
                        <button
                          type="submit"
                          class="btn btn-success px-5"
                        >
                          Save Now
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
     $(document).ready(function() {
        // console.log('berhasil');
          $('#fk_provinces_id,#fk_regencies_id').select2({
            theme:'bootstrap4',width:'style'
          });
      });
      </script>
  
@endpush