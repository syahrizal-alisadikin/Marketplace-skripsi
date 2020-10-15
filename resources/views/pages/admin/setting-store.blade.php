@extends('layouts.dashboard')
@section('title','Dashboard Store ')
    
@section('content')
   <!-- Page Content -->
     

      <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
      >
        <div class="container-fluid">
          <div class="dashboard-heading">
            <h2 class="dashboard-title">Store Settings</h2>
            <p class="dashboard-subtitle">
              Make store that profitable
            </p>
          </div>
          <div class="dashboard-content">
            <div class="row">
              <div class="col-12">
              <form action="{{route('dashboard-setting-update','dashboard-setting-store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="storeName">Store Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="store_name"
                              aria-describedby="emailHelp"
                              name="store_name"
                              value="{{$user->store_name}}"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="fk_categories_id">Category</label>
                            <select
                              name="fk_categories_id"
                              id="fk_categories_id"
                              class="form-control"
                            >
                            <option value="{{$user->fk_categories_id}}">Tidak diganti</option>
                            @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                                  
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="is_store_open">Store Status</label>
                            <p class="text-muted">
                              Apakah saat ini toko Anda buka?
                            </p>
                            <div
                              class="custom-control custom-radio custom-control-inline"
                            >
                              <input
                                class="custom-control-input"
                                type="radio"
                                name="store_status"
                                id="openStoreTrue"
                                value="1"
                                {{ $user->store_status == 1 ? 'checked' : ''}}
                              />
                              <label
                                class="custom-control-label"
                                for="openStoreTrue"
                                >Buka</label
                              >
                            </div>
                            <div
                              class="custom-control custom-radio custom-control-inline"
                            >
                              <input
                                class="custom-control-input"
                                type="radio"
                                name="store_status"
                                id="openStoreFalse"
                                value="0"
                                {{ $user->store_status == 0 || $user->store_status == NULL ? 'checked' : ''}}
                              />
                              <label
                                makasih
                                class="custom-control-label"
                                for="openStoreFalse"
                                >Tutup Sementara</label
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col text-left">
                          <button
                            type="submit"
                            class="btn btn-success px-5"
                          >
                            Save Now
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection