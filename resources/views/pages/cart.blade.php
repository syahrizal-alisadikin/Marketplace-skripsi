@extends('layouts.app')
@section('title','MarketPlace Pages Cart')
@push('prepend-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
    
@section('content')
   <!-- Page Content -->
    <div class="page-content page-cart" id="locations" >
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Cart
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table
                class="table table-borderless table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Image</th>
                    <th scope="col">Name &amp; Seller</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Menu</th>
                  </tr>
                </thead>
                <tbody>
                  @php $totalprice = 0 @endphp
                  @forelse ($carts as $cart)
                     <tr>
                    {{-- <td style="width: 5%;">
                      <input type="checkbox" name="id[]" value="{{ $cart->id }}">
                    </td> --}}
                    <td style="width: 25%;">
                     @if ($cart->product->galleries)
                      <img
                        src="{{url('product/'.$cart->product->galleries->first()->photos)}}"
                        alt=""
                        class="cart-image"
                      />
                     @endif
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title">{{$cart->product->name}}</div>
                      <div class="product-subtitle">by {{$cart->product->user->store_name}}</div>
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title">${{$cart->product->price}}</div>
                      <div class="product-subtitle">USD</div>
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title d-flex">
                        <button type="button" @click="GetMin({{ $cart->id }})"  class="btn btn-sm btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                       <div class="mx-2">
                        {{$cart->quantity}}
                       </div>
                        <button type="button" @click="GetPlush({{ $cart->id }})"  class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button>
                      </div>
                      <div class="product-subtitle">Quantity</div>
                    </td>
                    <td style="width: 20%;">
                    <form action="{{route('delete-cart',$cart->id)}}" method="POST">
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="btn btn-remove-cart">
                        Remove
                      </button>
                    </form>
                    </td>
                  </tr> 
                  @php $totalprice += $cart->product->price * $cart->quantity @endphp
                  @empty
                     <tr class="text-center">
                       <td colspan="4">Tidak ada cart</td>
                     </tr>
                  @endforelse
                 
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Shipping Details</h2>
            </div>
          </div>
        <form action="{{route('checkout')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
              <input type="hidden" id="totalPrice" name="total_price" value="{{$totalprice}}">
              <input type="hidden" id="totalPay" name="total_pay" value="{{$totalprice}}">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="address_one">Address 1</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address_one"
                    aria-describedby="emailHelp"
                    name="address_one"
                    value="Setra Duta Cemara"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="address_two">Address 2</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address_two"
                    aria-describedby="emailHelp"
                    name="address_two"
                    value="Blok B2 No. 34"
                  />
                </div>
              </div>
            <div class="col-md-4" >
                <div class="form-group" >
                  <label for="phone_number">Mobile</label>
                  <input
                    type="text"
                    class="form-control"
                    id="phone_number"
                    name="phone_number"
                  />
                </div>
              </div>
             
            </div>
            <div class="row">
              <div class="col-md-4" >
                <div class="form-group" >
                  <label for="country">Country</label>
                  <input
                    type="text"
                    class="form-control"
                    id="country"
                    name="country"
                    value="Indonesia"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="province">Province</label>
                  <select name="fk_provinces_id"  id="fk_provinces_id" v-if="provinces" v-model="provinces_id" class="form-control">
                  <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                  </select>
                  <select v-else class="form-control"></select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="fk_regencies_id">City</label>
                 <select name="city_id" @change="GetCourier()"  id="fk_regencies_id" v-if="regencies" v-model="city_id" class="form-control">
                  <option v-for="regencie in regencies" :value="regencie.id">@{{ regencie.name }}</option>
                  </select>
                  <select v-else class="form-control"></select>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-4" >
              <div class="form-group" v-if="courier">
                  <label >KURIR PENGIRIMAN</label>
                  
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input select-courier"
                      type="radio"
                      name="courier"
                      id="ongkos_kirim-jne"
                      value="jne"
                      v-model="courier_type"
                      @change="getOngkir()"
                    />
                    <label
                      class="form-check-label font-weight-bold mr-4"
                      for="ongkos_kirim-jne"
                    >
                      JNE</label
                    >
                    <input
                      class="form-check-input select-courier"
                      type="radio"
                      name="courier"
                      id="ongkos_kirim-tiki"
                      value="tiki"
                      v-model="courier_type"
                      @change="getOngkir()"
                    />
                    <label
                      class="form-check-label font-weight-bold mr-4"
                      for="ongkos_kirim-jnt"
                      >TIKI</label
                    >
                    <input
                      class="form-check-input select-courier"
                      type="radio"
                      name="courier"
                      id="ongkos_kirim-pos"
                      value="pos"
                      v-model="courier_type"
                      @change="getOngkir()"
                    />
                    <label
                      class="form-check-label font-weight-bold"
                      for="ongkos_kirim-jnt"
                      >POS</label
                    >
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group" v-if="cost" >
                  
                  <label class="font-weight-bold">SERVICE KURIR</label>
                  <br />
                 <div
                    v-for="value in costs"
                    :key="value.service"
                    class="form-check form-check-inline"
                  >
                    <input
                      class="form-check-input"
                      type="radio"
                      name="cost"
                      :id="value.service"
                      :value="value.cost[0].value + '|' + value.service"
                      v-model="costService"
                      @change="getCostService()"
                    />
                    <label
                      class="form-check-label font-weight-normal mr-5"
                      :for="value.service"
                    >
                       @{{ value.service }} - Rp.
                      @{{ value.cost[0].value }}</label
                    >
                  </div>
                </div>
              </div>
            </div>
           
            <div class="row" data-aos="fade-up" data-aos-delay="150">
              <div class="col-12">
                <hr />
              </div>
              <div class="col-12">
                <h2>Payment Informations</h2>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200" >
              {{-- <div class="col-1 col-md-1">
                <div class="product-title"><input class="form-check-input" onclick="CheckBox(this)" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    All 
                  </label>
                </div>
              </div> --}}
              <div class="col-3 col-md-3">
                <div class="product-title">$0</div>
                <div class="product-subtitle">Country Tax</div>
              </div>
              <div class="col-3 col-md-2">
                <div class="product-title">$0</div>
                <div class="product-subtitle">Product Insurance</div>
              </div>
              <div class="col-4 col-md-2">
                <div class="product-title" id="courier_cost">$0</div>
                <div class="product-subtitle">Ship to <p id="tujuan"></p></div>
              </div>
              <div class="col-4 col-md-2">
                <div class="product-title text-success" id="totalPembayaran">${{$totalprice ?? 0}}</div>
                <div class="product-subtitle">Total</div>
              </div>
              <div class="col-8 col-md-3" v-if="checkout">
                <button
                type="submit"
                class="btn btn-success mt-4 px-4 btn-block"
                >
                  Checkout Now
                </button>
              </div>
            </div>
          </div>
          </form>
      </section>
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
       // function CheckBox
       function CheckBox(ele) {
        var checkboxes = document.getElementsByTagName('input');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox' ) {
                        checkboxes[i].checked = true;
                    }
                }
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = false;
                    }
                }
            }
          }
      </script>
    <script>
     

      var locations = new Vue({
        el: "#locations",
        mounted() {
          AOS.init();
          this.getProvincesData()
        },
        data(){
          return{
          courier:false,
          courier_cost:0,
          courier_service:"",
          cost:false,
          costs:[],
          costService:null,
          provinces:null,
          regencies:null,
          provinces_id:null,
          city_id:null,
          courier_type:null,
          checkout:null,
          }
        },
        methods: {
          GetCourier(){
            var self = this;
            self.courier = true;

             axios.get('{{ url('api/city_id') }}/' + self.city_id)
                    .then(function(response){
                    self.city = response.data.name;
                    document.getElementById("tujuan").innerHTML  = response.data.name;
              });
            // console.log(self.city_id)
          },
          getOngkir(){
            var self = this;

             axios.post("{{ route('api-checkOngkir') }}", {
                city_destination: self.city_id, // <-- ID kota
                courier: self.courier_type, // jenis kurir
              })
                .then((response) => {
                 
                  // set state cost menjadi true, untuk menampilkan pilihan cost pengiriman
                  self.cost = true;
                  //assign state costs dengan hasil response
                  self.costs = response.data.data[0].costs;
                })
                .catch((error) => {
                  console.log(error);
                });
           
          },
          getCostService(){
            var self = this;
            let shipping = self.costService.split("|");

            self.checkout = true;
            

            self.courier_cost = shipping[0];
            self.courier_service = shipping[1];
            let total = document.getElementById('totalPay').value;
            // console.log(total)
            console.log(self.courier_cost)
            let formatCost = new Intl.NumberFormat('id-ID', { maximumSignificantDigits: 5 }).format(self.courier_cost);
            document.getElementById('courier_cost').innerHTML = `Rp ${formatCost}`;

            let totalPayment = parseInt(total) + parseInt(self.courier_cost);
            let formatPayment = new Intl.NumberFormat('id-ID', { maximumSignificantDigits: 6 }).format(totalPayment);
            console.log("total " + totalPayment);
            document.getElementById('totalPembayaran').innerHTML = `Rp ${formatPayment}`;
            
            document.getElementById('totalPrice').value = totalPayment;
          },
          getProvincesData(){
            var self = this;
            axios.get('{{ route('api-provinces') }}')
                .then(function(response){

                  self.provinces = response.data;
                  
                });
            },

            getRegenciesData(){
                var self = this;
                
                axios.get('{{ url('api/city') }}/' + self.provinces_id)
                    .then(function(response){
                      console.log(response.data)
                    self.regencies = response.data;
                     
              });
            },

            GetPlush(id)
            {
              axios.post("{{ route('api-cart-increment') }}", {
                cart_id: id,
              })
              .then((response) => {
                
                window.location.reload();
              })
            },
            GetMin(id)
            {
              axios.post("{{ route('api-cart-decrement') }}", {
                cart_id: id,
              })
              .then((response) => {
                
                window.location.reload();
              })
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