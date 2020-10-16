@extends('layouts.superadmin')
@section('title','Dashboard Transaction ')
    
@section('content')
  <!-- Page Content -->
 

    <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Superadmin Dashboard</h2>
                <p class="dashboard-subtitle">
                  List Of Transaction
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-body">
                         {{-- <a href="{{route('transac.create')}}" class="btn btn-primary mb-3">Tambah Product Gallery Baru</a> --}}
                          <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                              <thead>
                                <tr>
                                  <td>ID</td>
                                  <td>Product</td>
                                  <td>User</td>
                                  <td>Price</td>
                                  <td>Status</td>
                                  <td>Kode</td>
                                </tr>
                              </thead>
                            </table>
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
<script>
  var datatable = $('#crudTable').DataTable({
      proccesing:true,
      serverSide:true,
      ordering:true,
      ajax:{
        url: '{!! route('transaction-superadmin.index') !!}',
      },
      columns:[
        { data:'id', name:'id'},
        { data:'product.name', name:'product.name'},
        { data:'transaction.user.name', name:'product.user.name'},
        { data:'price', name:'price'},
        { data:'shipping_status', name:'shipping_status'},
        { data:'code', name:'code'},
        
       
        
      ]

  })
</script>
    
@endpush