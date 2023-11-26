@include('layouts.head')

@php
    $hariIni = date('d-m-Y');
    $notif = DB::table('pengumuman')
        ->where('waktu', 'LIKE', $hariIni . '%')
        ->select('*')
        ->get();
    $jumlahNotif = count($notif);
@endphp

<style>
.notifications {
    max-height: 300px;
    overflow-y: auto;
}

.notification-list {
    padding-right: 15px;
}
</style>
<header id="header" class="header fixed-top d-flex align-items-center">
   <div class="d-flex align-items-center justify-content-between"> <a href="#" class="logo d-flex align-items-center"> <img src="{{asset('admintemplate/img/farmhill-group.png')}}" alt="icon-farmhill-group"></a> <i class="bi bi-list toggle-sidebar-btn"></i></div>

   <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#"> <input type="text" name="query" placeholder="Search" title="Enter search keyword"> <button type="submit" title="Search"><i class="bi bi-search"></i></button></form>
   </div>

   <nav class="header-nav ms-auto">
      @auth
      <ul class="d-flex align-items-center">
         <li class="nav-item d-block d-lg-none"> <a class="nav-link nav-icon search-bar-toggle " href="#"> <i class="bi bi-search"></i> </a></li>
         <li class="nav-item dropdown">
            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <span class="badge bg-primary badge-number">{{ $jumlahNotif }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                <li class="dropdown-header"> You have {{ $jumlahNotif }} new notifications <a href="#"></a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <div class="notification-list">
                    @foreach($notif as $row)
                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                            <h4>Today, {{ last(explode(' ', $row->waktu)) }}</h4>
                            <p>{{ $row->pesan }}</p>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    @endforeach
                </div>

            </ul>
        </li>
        

         <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"> <img src="{{asset('admintemplate/img/aul.jpg')}}" alt="Profile" class="rounded-circle"> <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span> </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
               <li class="dropdown-header">
                  <h6>{{ auth()->user()->name }}</h6>
                  <span>{{ ['admin' => 'Administrator', 'karyawan' => 'Karyawan', 'executive' => 'Executive User'][auth()->user()->level] }}</span>
               </li>
               <li>
                  <hr class="dropdown-divider">
               </li>
               <li> <a class="dropdown-item d-flex align-items-center" {{ ($active === "profile_karyawan") ? 'active' : '' }}" href="/employee/profile"> <i class="bi bi-person"></i> <span>My Profile</span> </a></li>
               <hr class="dropdown-divider">
               <li>
                  <form action="/logout" method="post">
                     @csrf
                     <button type="submit" class="dropdown-item d-flex align-items-center">
                        <i class="bi bi-box-arrow-in-left"></i> Logout
                     </button>
                  </form>
               </li>
            </ul>
            @else
            <ul class="d-flex align-items-center">
               <li class="nav-item"> <a class="nav-link collapsed" href="/login"> <i class="bi bi-box-arrow-in-right"></i> <span>Login</span> </a></li>
            </ul>
            @endauth
         </li>
   </nav>
</header>