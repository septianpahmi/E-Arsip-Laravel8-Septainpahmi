<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/arsip') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @if (Auth::user()->role=='admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/arsip/kelola-user') }}">
          <i class="bi bi-person"></i>
          <span>Kelola Akun</span>
        </a>
      </li><!-- End Profile Page Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/arsip/uploadfile') }}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Upload File</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @endif
      @if (Auth::user()->role=='guru')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/arsip/uploadfile') }}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Upload File</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @endif
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/arsip/file') }}">
          <i class="bi bi-journal-text"></i>
          <span>File</span>
        </a>
      </li><!-- End Profile Page Nav -->
  
    </ul>

  </aside><!-- End Sidebar-->