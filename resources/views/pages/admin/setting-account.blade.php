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
                          <option value="{{$Provinsi->id}}">{{$Provinsi->name}}</option>
                          <select name="fk_provinces_id"  id="fk_provinces_id" v-if="provinces" v-model="provinces_id" class="form-control">
                          <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                          </select>
                          <select v-else class="form-control"></select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="fk_regencies_id">City</label>
                        <select name="fk_regencies_id"  id="fk_regencies_id" v-if="regencies" v-model="regencies_id" class="form-control">
                          <option v-for="regencie in regencies" :value="regencie.id">@{{ regencie.name }}</option>
                          </select>
                          <select v-else class="form-control"></select>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
     $(document).ready(function() {
        // console.log('berhasil');
          $('.fk_provinces_id').select2();
      });
      </script>
    <script>
     

      var locations = new Vue({
        el: "#locations",
        mounted() {
          AOS.init();
          this.getProvincesData()
        },
        data: {
          provinces:null,
          regencies:null,
          provinces_id:null,
          regencies_id:null,
        
        },
        methods: {
          getProvincesData(){
            var self = this;
            axios.get('{{ route('api-provinces') }}')
                .then(function(response){
                  self.provinces = response.data;
                });
            },

            getRegenciesData(){
                var self = this;
                axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                    .then(function(response){
                      self.regencies = response.data;
              });
            }
        },
        watch: {
          provinces_id: function(val, oldVal){
            this.regencies_id=null;
            this.getRegenciesData();
          }
        },
      });
    </script>
@endpush