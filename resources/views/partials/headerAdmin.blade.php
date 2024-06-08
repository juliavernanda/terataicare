 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

     <div class="d-flex align-items-center justify-content-between">
         <a href="index.html" class="logo d-flex align-items-center">

             <span class="d-none d-lg-block text-white">TERATAICARE</span>
         </a>
         <i class="bi bi-list toggle-sidebar-btn text-white"></i>
     </div><!-- End Logo -->

     <div class="search-bar">
         <form class="search-form d-flex align-items-center" method="POST" action="#">
             <input type="text" name="query" placeholder="Search" title="Enter search keyword">
             <button type="submit" title="Search"><i class="bi bi-search"></i></button>
         </form>
     </div><!-- End Search Bar -->

     <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center px-3">

             <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                 <i class="bi bi-door-open-fill text-white"></i><a class="text-white" href=" {{ route('logout') }}"  onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();" > {{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
             </a><!-- End Messages Icon -->




         </ul>
     </nav><!-- End Icons Navigation -->

 </header><!-- End Header -->
