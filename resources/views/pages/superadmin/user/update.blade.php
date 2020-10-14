@extends('layouts.superadmin')
@section('title','Dashboard MarketPlace ')
    
@section('content')
    <!-- Page Content -->
       <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Update User</h2>
                <p class="dashboard-subtitle">
                  Create your own User
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row justify-content-center">
                  <div class="col-12">
                  <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="card">
                        <div class="card-body">
                          <div class="row">

                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="name">User Name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  name="name"
                                  value="{{$user->name}}"
                                  placeholder="Masukan user"
                                  required
                                />
                              </div>
                            </div>

                             <div class="col-md-8">
                              <div class="form-group">
                                <label for="name">User Email</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  id="email"
                                  name="email"
                                  value="{{$user->email}}"
                                  placeholder="Masukan Email"
                                  required
                                />
                              </div>
                            </div>

                             <div class="col-md-8">
                              <div class="form-group">
                                <label for="name">Password </label>
                                <input
                                  type="password"
                                  class="form-control"
                                  id="password"
                                  name="password"
                                  placeholder="Masukan Password"
                                />
                                <p class="text-muted">Kosongkan Jika tidak diganti</p>
                              </div>
                            </div>

                             <div class="col-md-8">
                              <div class="form-group">
                                <label for="name">Roles </label>
                                <select name="roles" id="roles" class="form-control">
                                  @if ($user->roles == "ADMIN")
                                  <option value="ADMIN">Admin</option>
                                  <option value="USER">User</option>
                                  @else
                                  <option value="USER">User</option>
                                  <option value="ADMIN">Admin</option>
                                  @endif
                                </select>
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
        url: '{!! route('user.index') !!}',
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