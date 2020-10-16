@extends('layouts.dashboard')
@section('title','Dashboard Product ')

@section('content')
 <!-- Page Content -->
        
         

          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">{{$product->name}}</h2>
                <p class="dashboard-subtitle">
                  Product Details
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="{{route('product-update',$product->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method("PUT")
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">Product Name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  aria-describedby="name"
                                  name="name"
                                  value="{{$product->name}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="price">Price</label>
                                <input
                                  type="number"
                                  class="form-control"
                                  id="price"
                                  aria-describedby="price"
                                  name="price"
                                  value="{{$product->price}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="description">Category</label>
                                <select name="fk_categories_id" id="fk_categories_id" class="form-control">
                                  <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                                  @foreach ($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                      
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea
                                  name="description"
                                  id="description"
                                  class="form-control"
                                >
                                {!! $product->description !!}
                                </textarea>
                              </div>
                            </div>
                            <div class="col">
                              <button
                                type="submit"
                                class="btn btn-success btn-block px-5"
                              >
                                Update Product
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          @foreach ($product->galleries as $gallery)
                            <div class="col-md-4">
                            <div class="gallery-container">
                              <img
                                src="{{url('product/'.$gallery->photos ?? '')}}"
                                alt=""
                                class="w-100"
                                height="200"
                              />
                            <a class="delete-gallery" href="{{route('product-galery-delete',$gallery->id)}}">
                                <img src="/images/icon-delete.svg" alt="" />
                              </a>
                            </div>
                          </div>
                          @endforeach
                          
                        </div>
                            <div class="col mt-3">
                            <form action="{{route('product-upload-gallery')}}" enctype="multipart/form-data" method="POST">
                              @csrf
                            <input type="hidden" name="fk_product_id" id="fk_product_id" value="{{$product->id}}">
                              <input
                                  type="file"
                                  name="photos"
                                  id="file"
                                  style="display: none;"
                                  onchange="form.submit()"
                                />
                                <button
                                type="button"
                                  class="btn btn-secondary btn-block"
                                  onclick="thisFileUpload();"
                                >
                                Add Photo
                              </button>
                            </form>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <script>
      function thisFileUpload() {
        document.getElementById("file").click();
      }
    </script>
    <script>
          ClassicEditor
                  .create( document.querySelector( '#description' ) )
                  .then( editor => {
                          console.log( editor );
                  } )
                  .catch( error => {
                          console.error( error );
                  } );
  </script>
@endpush