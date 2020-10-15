@extends('layouts.dashboard')
@section('title','Dashboard Create Product ')
    
@section('content')
   <div
      class="section-content section-dashboard-home"
      data-aos="fade-up"
    >
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Add New Product</h2>
        <p class="dashboard-subtitle">
          Create your own product
        </p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
          <form action="{{route('product-store')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <input type="hidden" name="fk_user_id" value="{{Auth::user()->id}}">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Product Name</label>
                        <input
                          type="text"
                          class="form-control @error('name') is-invalid @enderror"
                          id="name"
                          aria-describedby="name"
                          name="name"
                          value="{{old('name')}}"
                          placeholder="Masukan Nama Poduct"
                        />
                          @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input
                          type="number"
                          class="form-control @error('price') is-invalid @enderror"
                          id="price"
                          aria-describedby="price"
                          name="price"
                          value="{{old('price')}}"
                          placeholder="Masukan Harga Product"
                        />
                         @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>
                      <div class="col-md-12">
                      <div class="form-group">
                        <label for="fk_categories_id">Category</label>
                      <select name="fk_categories_id" id="fk_categories_id" class="form-control">
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
                          cols="50"
                          rows="10"
                          class="form-control @error('description') is-invalid @enderror"
                          placeholder="Masukan Description"
                        >
                        {{old('description')}}
                        </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="photos">Thumbnails</label>
                        <input
                          type="file"
                          multiple
                          class="form-control pt-1"
                          id="photos"
                          aria-describedby="photos"
                          name="photos"
                        />
                        <small class="text-muted">
                          Kamu dapat memilih lebih dari satu file
                        </small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
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
  </div>
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    {{-- <script>
      function thisFileUpload() {
        document.getElementById("file").click();
      }
    </script> --}}
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