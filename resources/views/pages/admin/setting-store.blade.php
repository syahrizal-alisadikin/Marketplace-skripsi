@extends('layouts.dashboard')
@section('title','Dashboard Store ')
    
@section('content')
   <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav
        class="navbar navbar-store navbar-expand-lg navbar-light fixed-top"
        data-aos="fade-down"
      >
        <button
          class="btn btn-secondary d-md-none mr-auto mr-2"
          id="menu-toggle"
        >
          &laquo; Menu
        </button>

        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto d-none d-lg-flex">
            <li class="nav-item dropdown">
              <a
                class="nav-link"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <img
                  src="/images/icon-user.png"
                  alt=""
                  class="rounded-circle mr-2 profile-picture"
                />
                Hi, Angga
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/index.html"
                  >Back to Store</a
                >
                <a class="dropdown-item" href="/dashboard-account.html"
                  >Settings</a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/">Logout</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link d-inline-block mt-2" href="#">
                <img src="/images/icon-cart-empty.svg" alt="" />
              </a>
            </li>
          </ul>
          <!-- Mobile Menu -->
          <ul class="navbar-nav d-block d-lg-none mt-3">
            <li class="nav-item">
              <a class="nav-link" href="#">
                Hi, Angga
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-inline-block" href="#">
                Cart
              </a>
            </li>
          </ul>
        </div>
      </nav>

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
                <form action="">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="storeName">Store Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="storeName"
                              aria-describedby="emailHelp"
                              name="storeName"
                              value="Papel La Casa"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="category">Category</label>
                            <select
                              name="category"
                              id="category"
                              class="form-control"
                            >
                              <option value="Furniture">Furniture</option>
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
                                name="is_store_open"
                                id="openStoreTrue"
                                value="true"
                                checked
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
                                name="is_store_open"
                                id="openStoreFalse"
                                value="false"
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
                        <div class="col text-right">
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
    </div>
@endsection