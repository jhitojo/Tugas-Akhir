<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-tukuemas elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard_admin" class="brand-link">
      <img src="/dist/img/logo.png" alt="Tukuemas Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light text-white" >Tukuemas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav warna-font nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard_admin" id="dashboard_admin" class="nav-link">
              <i class="nav-icon fa fa-columns"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           </li>
          <li class="nav-item">
            <a href="/category" id="category" class="nav-link">
              <i class="nav-icon fa fa-random"></i>
              <p>
                Category
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/category" id="list" class="nav-link klik_menu">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>List Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/category/create" id="add" class="nav-link klik_menu">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
            </ul> -->
          </>
          <li class="nav-item">
            <a href="/product" id="product" class="nav-link klik_menu">
              <i class="nav-icon fa fa-tags"></i>
              <p>
                Product
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/product" id="listproduct" class="nav-link klik_menu">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>List product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/product/create" id="addproduct" class="nav-link klik_menu">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add product</p>
                </a>
              </li>
            </ul> -->
          </li>
          </li>
          <li class="nav-item">
            <a href="/user" id="user" class="nav-link klik_menu">
              <i class="nav-icon fa fa-user"></i>
              <p>
                User
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="/transaksi" id="user" class="nav-link klik_menu">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                Pesanan
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/kontak_wa" id="user" class="nav-link klik_menu">
              <i class="nav-icon fa fa-comments"></i>
              <p>
                Pesan WhatsApp
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>

          <!-- <li class="nav-item">
              <button class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                      @csrf
                  </form>
          </li> -->

        </ul>
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 