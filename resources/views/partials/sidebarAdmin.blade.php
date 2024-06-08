<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <?php
    $active = request()->is('user*') || request()->is('kategori*') || request()->is('event*') ||  request()->is('provinsi*') || request()->is('kota*') || request()->is('kecamatan*') || request()->is('detilEvent*') || request()->is('detilpemesanan*') || request()->is('pembayaran*') ||  request()->is('payments*');
    ?>
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ request()->is('adminHome') ?'' : 'collapsed' }}  " href="{{ route('homeAdmin') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->is('patients*') ? '' : 'collapsed' }} " href="{{ route('patient.index') }}">
          <i class="bi bi-grid"></i>
          <span>Patients</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link  {{ request()->is('bidang*') ? '' : 'collapsed' }}" href="{{ route('bidang.index') }}">
          <i class="bi bi-grid"></i>
          <span>Bidang Doctors</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->is('doctors*') ? '' : 'collapsed' }}" href="{{ route('doctors.data.index') }}">
          <i class="bi bi-grid"></i>
          <span>Doctors</span>
        </a>
      </li>



      <li class="nav-item">
        <a class="nav-link {{ request()->is('reports*') ? '' : 'collapsed' }} " href="{{ route('reports.index') }}">
          <i class="bi bi-grid"></i>
          <span>Reports</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->is('profileAdmin*') }}" href="{{ route('profileAdmin') }}">
          <i class="bi bi-grid"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Dashboard Nav -->







    </ul>

  </aside><!-- End Sidebar-->
