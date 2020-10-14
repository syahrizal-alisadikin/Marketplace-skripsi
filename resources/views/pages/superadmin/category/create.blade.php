@extends('layouts.superadmin')
@section('title','Dashboard MarketPlace ')
    
@section('content')
    <!-- Page Content -->
       <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Add New Category</h2>
                <p class="dashboard-subtitle">
                  Create your own Category
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row justify-content-center">
                  <div class="col-12">
                  <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="name">Category Name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  name="name"
                                  placeholder="Masukan category"
                                />
                              </div>
                            </div>
                            
                            
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="thumbnails">Thumbnails</label>
                                <input
                                  type="file"
                                  multiple
                                  class="form-control pt-1"
                                  id="photo"
                                  aria-describedby="thumbnails"
                                  name="photo"
                                />
                                
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

{{-- @push('addon-script')
<script>
  var datatable = $('#crudTable').DataTable({
      proccesing:true,
      serverSide:true,
      ordering:true,
      ajax:{
        url: '{!! route('category.index') !!}',
      },
      columns:[
        { data:'id', name:'id'},
        { data:'name', name:'name'},
        {data:'image',name:'image'},
        { data:'slug', name:'slug'},
        {
          data:'action',
          name:'action',
          orderable: false,
          searcable: false,
          width:'15%'
        },
      ]

  })
</script>
    
@endpush --}}