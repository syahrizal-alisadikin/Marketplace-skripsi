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
            <form action="">
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
                          name="storeName"
                          value="Papel La Casa"
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
                          value="200"
                        />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea
                          name="descrioption"
                          id="description"
                          cols="30"
                          rows="4"
                          class="form-control"
                        >
The Nike Air Max 720 SE goes bigger than ever before with Nike's tallest Air unit yet for unimaginable, all-day comfort. There's super breathable fabrics on the upper, while colours add a modern edge. Bring the past into the future with the Nike Air Max 2090, a bold look inspired by the DNA of the iconic Air Max 90. Brand-new Nike Air cushioning
                        </textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="thumbnails">Thumbnails</label>
                        <input
                          type="file"
                          multiple
                          class="form-control pt-1"
                          id="thumbnails"
                          aria-describedby="thumbnails"
                          name="thumbnails"
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