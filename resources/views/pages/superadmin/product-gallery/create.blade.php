@extends('layouts.superadmin')
@section('title','Dashboard MarketPlace ')
    
@section('content')
    <!-- Page Content -->
       <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Add New Product Gallery</h2>
                <p class="dashboard-subtitle">
                  Create your own Product Gallery
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row justify-content-center">
                  <div class="col-12">
                  <form action="{{route('product-gallery.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="card">
                        <div class="card-body">
                          <div class="row">

                            
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="name">Product</label>
                               <select name="fk_product_id" id="fk_product_id" class="form-control @error('fk_product_id') is-invalid @enderror">
                                 @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                                 @endforeach
                               </select>
                              </div>
                            </div>

                          

                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="photos">Photo Product</label>
                              
                                <input type="file" name="photos"   class="form-control @error('photos') is-invalid @enderror" required>
                              </div>
                            </div>

                            
                           
                                
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-8">
                          <button
                            type="submit"
                            class="btn btn-success btn-block px-5"
                          >
                            Save Now
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
@endsection

