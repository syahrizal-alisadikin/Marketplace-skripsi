@extends('layouts.app')
@section('title','MarketPlace Pertama')
    
@section('content')
     <div class="page-content page-home">
      <section class="store-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
              <div
                id="storeCarousel"
                class="carousel slide"
                data-ride="carousel"
              >
                <ol class="carousel-indicators">
                  <li
                    data-target="#storeCarousel"
                    data-slide-to="0"
                    class="active"
                  ></li>
                  <li data-target="#storeCarousel" data-slide-to="1"></li>
                  <li data-target="#storeCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      src="/images/banner.jpg"
                      class="d-block w-100"
                      alt="Carousel Image"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="/images/banner.jpg"
                      class="d-block w-100"
                      alt="Carousel Image"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="/images/banner.jpg"
                      class="d-block w-100"
                      alt="Carousel Image"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Trend Categories</h5>
            </div>
          </div>
          <div class="row">
            <?php $i= 1 ?>
            @forelse ($categories as $category)
                <div
                  class="col-6 col-md-3 col-lg-2"
                  data-aos="fade-up"
                  data-aos-delay="<?= $i;?>00"
                >
                   <a class="component-categories d-block" href="{{route('categories-detail',$category->slug)}}">
                    <div class="categories-image">
                      <img
                        src="{{url('category/'.$category->photo)}}"
                        alt="Gadgets Categories"
                        class="w-100"
                        height="50"
                      />
                    </div>
                    <p class="categories-text">
                      {{$category->name}}
                    </p>
                  </a>
            </div>
            <?php $i++ ?>
            @empty
            <div
                  class="col-12 text-center py-5"
                  data-aos="fade-up"
                  data-aos-delay="100"
                >
                   Not Found Categories
            </div>
            @endforelse

           
          </div>
        </div>
      </section>
      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>New Products</h5>
            </div>
          </div>
          <div class="row">
            <?php $i = 1 ?>
            @forelse ($products as $product)
                <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="<?= $i;?>00"
              >
              <a class="component-products d-block" href="{{route('product-detail-user',$product->slug)}}">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      @if($product->galleries->count())
                      background-image: url('{{url('product/'.$product->galleries->first()->photos)}}');
                      @else
                      background-color: #eee;
                      @endif
                    "
                  ></div>
                </div>
                <div class="products-text">
                 {{$product->name}}
                </div>
                <div class="products-price">
                  ${{$product->price}}
                </div>
              </a>
            </div>
            <?php $i++?>
            @empty
            <div
                  class="col-12 text-center py-5"
                  data-aos="fade-up"
                  data-aos-delay="100"
                >
                   Not Found Product
            </div>
            @endforelse

          </div>
        </div>
      </section>
    </div>
@endsection