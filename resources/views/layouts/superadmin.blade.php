<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>
    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
 
    @stack('addon-style')
</head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/admin.png" alt="" class="my-4" style="max-width: 150px" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="{{route('superadmin-dashboard')}}"
              class="list-group-item list-group-item-action {{ request()->is('Superadmin') ? 'active' : ''}}"
              >Dashboard</a
            >
            <a
             href="{{route('products.index')}}"
              class="list-group-item list-group-item-action {{ request()->is('Superadmin/products') ? 'active' : ''}}"
             >Products</a
            >

            <a
             href="{{route('product-gallery.index')}}"
              class="list-group-item list-group-item-action {{ request()->is('Superadmin/product-gallery*') ? 'active' : ''}}"
             >Galleries</a
            >
            <a
              href="{{route('category.index')}}"
              class="list-group-item list-group-item-action {{ request()->is('Superadmin/category*') ? 'active' : ''}}"
              >Categories</a
            >
            <a
              href="{{route('transaction-superadmin.index')}}"
              class="list-group-item list-group-item-action {{ request()->is('Superadmin/transaction-superadmin*') ? 'active' : ''}}"
              >Transactions</a
            >
           <a
              href="{{route('user.index')}}"
              class="list-group-item list-group-item-action {{ request()->is('Superadmin/user*') ? 'active' : ''}}"

              >Users</a
            >
            <a
              href="#"
              class="list-group-item list-group-item-action"
              >My Account</a
            >
          </div>
        </div>
        <!-- /#sidebar-wrapper -->
        {{-- Navbar --}}
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
                    Hi, {{Auth::user()->name}}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  
                    {{-- <div class="dropdown-divider"></div> --}}
                    <a class="dropdown-item" href="/">Logout</a>
                  </div>
                </li>
               
              </ul>
              <!-- Mobile Menu -->
              <ul class="navbar-nav d-block d-lg-none mt-3">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    Hi,  {{Auth::user()->name}}
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
          <!-- Page Content -->
          @yield('content')
          </div>
        <!-- /#page-content-wrapper -->
      </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    @stack('prepend-style')
    {{-- <script src="/vendor/jquery/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <!-- Menu Toggle Script -->
    <script>
      // $(document).ready(function(){
      //   $('a').on('click',function(){
      //     $('li.active').removeClass("active");
      //     $(this).addClass("active");
      //   });
      // });
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    @stack('addon-script')
  </body>
</html>
