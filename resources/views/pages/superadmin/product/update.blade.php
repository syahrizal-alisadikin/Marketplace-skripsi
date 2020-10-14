@extends('layouts.superadmin')
@section('title','Dashboard MarketPlace ')
    
@section('content')
    <!-- Page Content -->
       <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Update Product</h2>
                <p class="dashboard-subtitle">
                  Create your own Product
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row justify-content-center">
                  <div class="col-12">
                  <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                     <div class="card">
                        <div class="card-body">
                          <div class="row">

                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="name">Product Name</label>
                                <input
                                  type="text"
                                  class="form-control @error('name') is-invalid @enderror"
                                  id="name"
                                  name="name"
                                  value="{{$product->name}}"
                                  placeholder="Masukan product"
                                />
                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                            </div>
                            
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="name">Pemilik Product</label>
                               <select name="fk_user_id" id="fk_user_id" class="form-control @error('fk_user_id') is-invalid @enderror">
                                <option value="{{$product->fk_user_id}}">{{$product->user->name}}</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                 @endforeach
                               </select>
                              </div>
                            </div>

                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="name">Category Product</label>
                               <select name="fk_categories_id" id="fk_categories_id" class="form-control  @error('fk_categories_id') is-invalid @enderror">
                                <option value="{{$product->fk_categories_id}}">{{$product->category->name}}</option>
                                 
                                @foreach ($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                 @endforeach
                               </select>
                              </div>
                            </div>

                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="name">Harga Product</label>
                              
                                <input type="number" name="price" value="{{$product->price}}"  class="form-control @error('price') is-invalid @enderror">
                              </div>
                            </div>

                             <div class="col-md-8">
                              <div class="form-group">
                                <label for="description">Description Product</label>
                              <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" >{{$product->description}}</textarea>
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

@push('addon-script')

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script>
     CKEDITOR.replace( 'description' );
    </script>
@endpush