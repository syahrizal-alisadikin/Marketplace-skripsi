@extends('layouts.app')
@section('title','MarketPlace Detail Page')
@push('prepend-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .checked {
    color: orange;
  }
  .rating {
  display: inline-block;
  position: relative;
  height: 35px;
  line-height: 35px;
  font-size: 35px;
}

.rating label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  cursor: pointer;
}

.rating label:last-child {
  position: static;
}

.rating label:nth-child(1) {
  z-index: 5;
}

.rating label:nth-child(2) {
  z-index: 4;
}

.rating label:nth-child(3) {
  z-index: 3;
}

.rating label:nth-child(4) {
  z-index: 2;
}

.rating label:nth-child(5) {
  z-index: 1;
}

.rating label input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.rating label .icon {
  float: left;
  color: transparent;
}

.rating label:last-child .icon {
  color: #000;
}

.rating:not(:hover) label input:checked ~ .icon,
.rating:hover label:hover input ~ .icon {
  color: orange;
}

.rating label input:focus:not(:checked) ~ .icon:last-child {
  color: #000;
  text-shadow: 0 0 5px orange;
}

/* User Rating */
.user-rating {
  /* display: inline-block; */
  position: relative;
  height: 15px;
  line-height: 15px;
  font-size: 15px;
}

.user-rating label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  cursor: pointer;
}
.user-rating label:last-child {
  position: static;
}
.user-rating label:nth-child(1) {
  z-index: 5;
}

.user-rating label:nth-child(2) {
  z-index: 4;
}

.user-rating label:nth-child(3) {
  z-index: 3;
}

.user-rating label:nth-child(4) {
  z-index: 2;
}

.user-rating label:nth-child(5) {
  z-index: 1;
}

.user-rating label input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.user-rating label .icon {
  float: left;
  color: transparent;
}

.user-rating label:last-child .icon {
  color: orange;
}

.user-rating:not(:hover) label input:checked ~ .icon,
.user-rating:hover label:hover input ~ .icon {
  color: orange;
}

.rating label input:focus:not(:checked) ~ .icon:last-child {
  color: #000;
  text-shadow: 0 0 5px orange;
}
  </style>
@endpush
@section('content')
      <!-- Page Content -->
    <div class="page-content page-details">
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
                    Product Details
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-gallery" id="gallery">
        <div class="container">
          <div class="row">
            <div class="col-lg-8" data-aos="zoom-in">
              <transition name="slide-fade" mode="out-in">
                <img
                  :key="photos[activePhoto].id"
                  :src="photos[activePhoto].url"
                  class="w-100 main-image"
                  alt=""
                />
              </transition>
            </div>
            <div class="col-lg-2">
              <div class="row">
                <div
                  class="col-3 col-lg-12 mt-2 mt-lg-0"
                  v-for="(photo, index) in photos"
                  :key="photo.id"
                  data-aos="zoom-in"
                  data-aos-delay="100"
                >
                  <a href="#" @click="changeActive(index)">
                    <img
                      :src="photo.url"
                      class="w-100 thumbnail-image"
                      :class="{ active: index == activePhoto }"
                      alt=""
                    />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <h1>{{$product->name}}</h1>
                <div class="owner">By {{$product->user->store_name}}</div>
                <div class="price">${{$product->price}}</div>
              </div>
              <div class="col-lg-2" data-aos="zoom-in">
                @auth
              <form action="{{ route('add-cart',$product->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <button
                  class="btn btn-success px-4 text-white btn-block mb-3"
                  type="submit"
                  >Add to Cart</button
                >

                </form>
                @else
                <a
                href="{{route('login')}}"
                class="btn btn-success  text-white btn-block mb-3"
                  >Sign in to add</a
                >
                @endauth
              </div>
            </div>
          </div>
        </section>
        <section class="store-description">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
               {!! $product->description !!}
              </div>
            </div>
          </div>
        </section>
        <section class="store-review">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8 mt-3 mb-3">
                <h5>Customer Review </h5>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-6">
                @if (count($comment) > 0)

                @foreach ($comment as $item)
                <ul class="list-unstyled">
                   
                  <li class="media">
                    <img
                      src="{{ $item->user->profile_photo_path ?? 'https://ui-avatars.com/api/?name=' . $item->user->name }}"
                      alt=""
                      class="mr-3 rounded-circle"
                    />
                    <div class="media-body">

                    <h5 class="mt-2">{{ $item->user->name }}</h5>
                    <div class="user-rating" style="margin-top: -7px !important">
                      @if ($item->starts == 1)
                      <label>
                        {{-- <input type="radio" name="stars" value="1" /> --}}
                        <span class="icon">★</span>
                        <span class="icon-black">★</span>
                        <span class="icon-black">★</span>
                        <span class="icon-black">★</span>
                        <span class="icon-black">★</span>

                      </label>
                          
                      @endif
                      @if ($item->starts == 2)
                      <label>
                        {{-- <input type="radio" name="stars" value="2" /> --}}
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon-black">★</span>
                        <span class="icon-black">★</span>
                        <span class="icon-black">★</span>

                      </label>
                      @endif
                      @if ($item->starts == 3)
                      <label>
                        {{-- <input type="radio" name="stars" value="3" /> --}}
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span> 
                        <span class="icon-black">★</span>
                        <span class="icon-black">★</span>

                      </label>
                      @endif
                      @if ($item->starts == 4)
                      <label>
                        {{-- <input type="radio" name="stars" value="4" /> --}}
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon-black">★</span>
                      </label>
                      @endif
                     @if ($item->starts == 5)
                     <label>
                      {{-- <input type="radio" name="stars" value="5" /> --}}
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                    </label>
                     @endif
                    </div>
                   <div class="commentar" >
                    {{ $item->comment }}
                   </div>
                    </div>
                  </li>

                   
                 
                </ul>
                @endforeach
                @auth
                      @if (!$data)
                      <div class="media-body my-4">
                        
                        <form action="{{ route('commentar') }}" method="POST">
                          @csrf
                           <input type="hidden" name="fk_product_id" value="{{ $product->id }}">
                           <input type="hidden" name="fk_user_id" value="{{ Auth::user()->id }}">
                           
                           <div class="rating">
                             <label>
                               <input type="radio" name="stars" value="1" />
                               <span class="icon">★</span>
                             </label>
                             <label>
                               <input type="radio" name="stars" value="2" />
                               <span class="icon">★</span>
                               <span class="icon">★</span>
                             </label>
                             <label>
                               <input type="radio" name="stars" value="3" />
                               <span class="icon">★</span>
                               <span class="icon">★</span>
                               <span class="icon">★</span>   
                             </label>
                             <label>
                               <input type="radio" name="stars" value="4" />
                               <span class="icon">★</span>
                               <span class="icon">★</span>
                               <span class="icon">★</span>
                               <span class="icon">★</span>
                             </label>
                             <label>
                               <input type="radio" name="stars" value="5" />
                               <span class="icon">★</span>
                               <span class="icon">★</span>
                               <span class="icon">★</span>
                               <span class="icon">★</span>
                               <span class="icon">★</span>
                             </label>
                           </div>
                           <textarea name="comment" placeholder="Masukan Pesan" cols="20" rows="5" class="form-control"></textarea>
                           <button type="submit" class="btn btn-success mt-2"> Send</button>
                        </form>
                       </div>
                      @endif
                   @endauth
                @else
                <ul class="list-unstyled">
                  <li class="media">
                   Belum Ada Komentar
                    
                  </li>

                   @auth
                       <div class="media-body my-4">
                     <form action="{{ route('commentar') }}" method="POST">
                       @csrf
                        <input type="hidden" name="fk_product_id" value="{{ $product->id }}">
                        <input type="hidden" name="fk_user_id" value="{{ Auth::user()->id }}">
                      <div class="rating">
                        <label>
                          <input type="radio" name="stars" value="1" />
                          <span class="icon">★</span>
                        </label>
                        <label>
                          <input type="radio" name="stars" value="2" />
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                        </label>
                        <label>
                          <input type="radio" name="stars" value="3" />
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>   
                        </label>
                        <label>
                          <input type="radio" name="stars" value="4" />
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                        </label>
                        <label>
                          <input type="radio" name="stars" value="5" />
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                        </label>
                      </div>
                        <textarea name="comment" placeholder="Masukan Pesan" cols="20" rows="5" class="form-control"></textarea>
                        <button type="submit" class="btn btn-success mt-2"> Send</button>
                     </form>
                    </div>
                   @endauth
                 
                </ul>
                
                @endif
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var gallery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photos: [
           @foreach($product->galleries as $gallery)
            {
              id: {{$gallery->id}},
              url: "{{url('product/'.$gallery->photos)}}",
            },
          @endforeach
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
@endpush