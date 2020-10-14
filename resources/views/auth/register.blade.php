@extends('layouts.guest')
@section('content')
     <!-- Page Content -->
    <div class="page-content page-auth mt-5" id="register">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4">
              <h2>
                Memulai untuk jual beli <br />
                dengan cara terbaru
              </h2>
              <form action="{{route('register')}}" method="POST" class="mt-3">
                @csrf
                <div class="form-group">
                  <label>Full Name</label>
                  <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    aria-describedby="nameHelp"
                    placeholder="Masukan Full Name"
                    v-model="name"
                    value="{{old('name')}}"
                    required
                    autocomplete="name" 
                  />
                  @error('name')
                      <div class="invalid-feedback" role="alert">
                          {{ $message }}
                      </div>    
                  @enderror
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input
                    type="email"
                    name="email"
                    @change="checkForEmail()"
                    class="form-control  @error('email') is-invalid @enderror"
                    :class="{ 'is-invalid' : this.email_unavailable }"
                    aria-describedby="emailHelp"
                    placeholder="Masukan Email"
                    v-model="email"
                    autocomplete="email" 
                  />
                  @error('name')
                      <div class="invalid-feedback" role="alert">
                          {{ $message }}
                      </div>    
                  @enderror
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" placeholder="Masukan Password" autocomplete="password" class="form-control @error('password') is-invalid @enderror"  />
                   @error('password')
                      <div class="invalid-feedback" role="alert">
                          {{ $message }}
                      </div>    
                  @enderror
                </div>
                 <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Masukan Password Lagi" autocomplete="password_confirmation" class="form-control @error('password_confirm') is-invalid @enderror"   />
                   @error('password_confirmation')
                      <div class="invalid-feedback" role="alert">
                          {{ $message }}
                      </div>    
                  @enderror
                </div>
                <div class="form-group">
                  <label>Store</label>
                  <p class="text-muted">
                    Apakah anda juga ingin membuka toko?
                  </p>
                  <div
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      class="custom-control-input"
                      type="radio"
                      name="is_store_open"
                      id="openStoreTrue"
                      v-model="is_store_open"
                      :value="true"
                    />
                    <label class="custom-control-label" for="openStoreTrue"
                      >Iya, boleh</label
                    >
                  </div>
                  <div
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      class="custom-control-input"
                      type="radio"
                      name="is_store_open"
                      id="openStoreFalse"
                      v-model="is_store_open"
                      :value="false"
                    />
                    <label
                      makasih
                      class="custom-control-label"
                      for="openStoreFalse"
                      >Enggak, makasih</label
                    >
                  </div>
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label>Nama Toko</label>
                  <input
                    v-model="store_name"
                    id="store_name"
                    name="store_name"
                    type="text"
                    placeholder="Masukan Nama Toko"
                    class="form-control @error('store_name') is-invalid @enderror"
                    autofocus
                    autocomplete
                    aria-describedby="storeHelp"
                  />
                   @error('store_name')
                      <div class="invalid-feedback" role="alert">
                          {{ $message }}
                      </div>    
                  @enderror
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label>Kategori</label>
                  <select name="fk_categories_id" class="form-control">
                    <option value="" disabled>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" :disabled="this.email_unavailable" class="btn btn-success btn-block mt-4">
                  Sign Up Now
                </button>
              <a href="{{ route('login') }}"  class="btn btn-signup btn-block mt-2">
                  Back to Sign In
                </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      Vue.use(Toasted);

      var register = new Vue({
        el: "#register",
        mounted() {
          AOS.init();
         
        },
        methods: {
          checkForEmail: function(){
            var self = this;
            axios.get('{{ route('check-register') }}', {
                params: {
                  email: self.email
                }
              })
              .then(function (response) {
                // Handle Success
                if(response.data == "Available"){
                      self.$toasted.show(
                        "Email Anda Tersedia,Silahkan lanjutkan langkah pendaftaran.",
                        {
                          position: "top-center",
                          className: "rounded",
                          duration: 1000,
                        }
                      );
                }else{
                      self.email_unavailable = false ;
                      self.$toasted.error(
                        "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
                        {
                          position: "top-center",
                          className: "rounded",
                          duration: 1000,
                        }
                      );
                      self.email_unavailable = true;
                }
                console.log(response);
              })
              
          }
        },
        data() {
          return{
            name: "",
            email: "",
            is_store_open: true,
            store_name: "",
            email_unavailable:false
          }
        },
      });
    </script>
@endpush
