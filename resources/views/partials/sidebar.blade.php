<aside id="sidebar" class="sidebar">
   <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
         @auth
         @if (auth()->user()->level=="karyawan")
         <a class="nav-link collapsed {{ ($active === "dash_karyawan") ? 'active' : '' }}" href="/employee/dashboard"> <i class='bx bxs-dashboard'></i><span>Dashboard</span> </a>
         <a class="nav-link collapsed {{ ($active === "absensi_karyawan") ? 'active' : '' }}" href="/employee/absensi"> <i class='bx bxs-time-five'></i><span>Absensi</span> </a>
         <a class="nav-link collapsed {{ ($active === "timesheet_karyawan") ? 'active' : '' }}" href="/timesheet/time-tracker"> <i class='bx bxs-spreadsheet'></i><span>Timesheet</span> </a>
      <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#"> <i class='bx bxs-report'></i><span>Penilaian</span><i class="bi bi-chevron-down ms-auto"></i> </a>
         <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li> <a class="nav-link collapsed {{ ($active === "okr_karyawan") ? 'active' : '' }}" href="/employee/okr"> <i class="bi bi-circle"></i><span>OKR</span> </a></li>
            <li> <a class="nav-link collapsed {{ ($active === "kpi_karyawan") ? 'active' : '' }}" href="/employee/kpi"> <i class="bi bi-circle"></i><span>KPI</span> </a></li>
         </ul>
      </li>

      @elseif (auth()->user()->level=="executive")
      <a class="nav-link collapsed {{ ($active === "dash_executive") ? 'active' : '' }}" href="/executive/dashboard"> <i class='bx bxs-dashboard'></i><span>Dashboard</span> </a>
      <a class="nav-link collapsed {{ ($active === "profile_executive") ? 'active' : '' }}" href="/daftar/karyawan"> <i class='bx bxs-user-circle'></i><span>Daftar Karyawan</span> </a>
      <a class="nav-link collapsed {{ ($active === "timesheet_executive") ? 'active' : '' }}" href="/executive/timesheet"> <i class='bx bxs-spreadsheet'></i><span>Timesheet</span> </a>

      @elseif (auth()->user()->level=="admin")
      <a class="nav-link collapsed {{ ($active === "dash_admin") ? 'active' : '' }}" href="/admin/dashboard"> <i class='bx bxs-dashboard'></i><span>Dashboard</span> </a>
      <a class="nav-link collapsed {{ ($active === "daftar_absensi") ? 'active' : '' }}" href="/daftar/absensi"> <i class='bi bi-card-list'></i><span>Daftar Absensi</span> </a>
      <a class="nav-link collapsed {{ ($active === "profile_admin") ? 'active' : '' }}" href="/admin/profiles"> <i class='bx bxs-user-circle'></i><span>Profiles</span> </a>
      <a class="nav-link collapsed {{ ($active === "task_timesheet") ? 'active' : '' }}" href="/admin/task-timesheet"> <i class='bx bxs-hourglass'></i><span>Task Timesheet</span> </a>
      <a class="nav-link collapsed {{ ($active === "manage_user") ? 'active' : '' }}" href="/user/management"> <i class='bi bi-people'></i><span>Management User</span> </a>
      <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#"> <i class='bx bxs-report'></i><span>Penilaian</span><i class="bi bi-chevron-down ms-auto"></i> </a>
         <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li> <a class="nav-link collapsed {{ ($active === "okr_executive") ? 'active' : '' }}" href="/admin/okr"> <i class="bi bi-circle"></i><span>OKR</span> </a></li>
            <li> <a class="nav-link collapsed {{ ($active === "kpi_executive") ? 'active' : '' }}" href="/admin/kpi"> <i class="bi bi-circle"></i><span>KPI</span> </a></li>
         </ul>
      </li>
      @endif
      @endauth
      </li>

      @auth
      <li class="nav-item">
         <form action="/logout" method="post" class="nav-link collapsed">
            @csrf
            <button type="submit">
               <i class="bi bi-box-arrow-in-left"></i><span>Logout</span>
            </button>
         </form>
      </li>
      @else
      <li class="nav-item"> <a class="nav-link collapsed" href="/login"> <i class="bi bi-box-arrow-in-right"></i> <span>Login</span> </a></li>
      @endauth
   </ul>
</aside>