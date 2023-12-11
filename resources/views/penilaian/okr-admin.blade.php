@extends('layouts.main')

@section('container')

<div class="pagetitle mt-3">
    <h1>Penilaian OKR</h1>
    <nav>
        <ol class="breadcrumb mr-auto">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Penilaian</li>
            <li class="breadcrumb-item active">OKR</li>
        </ol>
        <div class="d-flex justify-content-between align-items-center">
        <div class="dropdown mr-3">
            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Tambah Indikator OKR
            </a>
    
            <!-- Dropdown items -->
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="">OKR KBL</a></li>
                <li><a class="dropdown-item" href="">OKR ASH</a></li>
            </ul>
        </div>
    
        <div class="ml-auto">
            <button onclick="expandAllLists()" class="btn btn-success"><i class="fas fa-arrow-down"></i> Expand</button>
            <button onclick="collapseAllLists()" class="btn btn-danger"><i class="fas fa-arrow-up"></i> Hide</button>
        </div>

    </div>
    </nav>
    
</div>

<style>
    .container {
        margin: 0;
        padding: 0;
    }

    .icon-button {
        border-style: none;
        background-color: white;
    }

    .table-bordered {
        background: white;
    }
</style>


<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  </head>

  <style>
    .subofsub-icon {
     width: 6px; /* Lebar ikon bulat */
     height: 6px; /* Tinggi ikon bulat */
     background-color: black; /* Warna latar belakang ikon */
     border-radius: 50%; /* Mengatur ikon menjadi bulat */
     display: inline-block;
     margin-right: 3px; /* Jarak antara ikon dan teks */
   }
 </style>
 
 <div class="container mt-4">
   <ul class="list-group">

    <li class="list-group-item list-group-item-action bg-secondary">
        <div class="row text-light">
    
    
        <div class="col">
          OKR KBL
        </div>
        <div class="col">

          </div>
        <div class="col">
          Action
        </div>
      </div>
        </li>

     <li class="list-group-item list-group-item-action">
     <div class="row">
 
 
     <div class="col">
       <button class="icon-button" data-toggle="collapse" href="#list1" onclick="toggleIcon('icon1')">
         <i id="icon1" class="fas fa-chevron-right"></i>
       </button>
       Order A
     </div>
     <div class="col">
       30 Oktober
     </div>
     <div class="col">
       Action
     </div>
   </div>
     </li>
     <div id="list1" class="collapse">
       <ul class="list-group list-group-flush">
         <li class="list-group-item list-group-item-action">
 
           <div class="row">
             <div class="col">
               <button class="icon-button" data-toggle="collapse" href="#sublist1-1" onclick="toggleIcon('icon1-1')" style="margin-left:10px">
                 <i id="icon1-1" class="fas fa-chevron-right"></i>
               </button>
               Meja Makan
             </div>
             <div class="col">
               29 Oktober
             </div>
             <div class="col">
               Action
             </div>
         </div>
         </li>
         <div id="sublist1-1" class="collapse">
           <ul class="list-group list-group-flush">
             <li class="list-group-item">
 
                 <div class="row">
                   <div class="col">
                     <i class="subofsub-icon" style="margin-left:50px"></i>Rangka
                   </div>
                   <div class="col">
                     25 Oktober
                   </div>
                   <div class="col">
                     Action
                   </div>
                 </div>
 
             </li>
             <li class="list-group-item">
 
                 <div class="row">
                   <div class="col">
                     <i class="subofsub-icon" style="margin-left:50px"></i>Finishing
                   </div>
                   <div class="col">
                     26 Oktober
                   </div>
                   <div class="col">
                     Action
                   </div>
                 </div>
 
             </li>
           </ul>
         </div>
         <li class="list-group-item list-group-item-action">
 
           <div class="row">
             <div class="col">
               <button class="icon-button" data-toggle="collapse" href="#sublist1-2" onclick="toggleIcon('icon1-2')" style="margin-left:10px">
                 <i id="icon1-2" class="fas fa-chevron-right"></i>
               </button>
               Kursi Makan
             </div>
             <div class="col">
               28 Oktober
             </div>
             <div class="col">
               Action
             </div>
         </div>
         </li>
         <div id="sublist1-2" class="collapse">
           <ul class="list-group list-group-flush">
             <li class="list-group-item">
 
                 <div class="row">
                   <div class="col">
                     <i class="subofsub-icon" style="margin-left:50px"></i>Rangka
                   </div>
                   <div class="col">
                     24 Oktober
                   </div>
                   <div class="col">
                     Action
                   </div>
                 </div>
 
             </li>
           </ul>
         </div>
       </ul>
     </div>
     <li class="list-group-item list-group-item-action">
     <div class="row">
 
 
     <div class="col">
       <button class="icon-button" data-toggle="collapse" href="#list2" onclick="toggleIcon('icon2')">
         <i id="icon2" class="fas fa-chevron-right"></i>
       </button>
       Order B
     </div>
     <div class="col">
       5 November
     </div>
     <div class="col">
       Action
     </div>
   </div>
     </li>
     <div id="list2" class="collapse">
       <ul class="list-group list-group-flush">
         <li class="list-group-item list-group-item-action">
 
           <div class="row">
             <div class="col">
               <button class="icon-button" data-toggle="collapse" href="#sublist2-1" onclick="toggleIcon('icon2-1')" style="margin-left:10px">
                 <i id="icon2-1" class="fas fa-chevron-right"></i>
               </button>
               Lemari
             </div>
             <div class="col">
               3 November
             </div>
             <div class="col">
               Action
             </div>
         </div>
         </li>
         <div id="sublist2-1" class="collapse">
           <ul class="list-group list-group-flush">
             <li class="list-group-item">
 
                 <div class="row">
                   <div class="col">
                     <i class="subofsub-icon" style="margin-left:50px"></i>Rangka
                   </div>
                   <div class="col">
                     1 November
                   </div>
                   <div class="col">
                     Action
                   </div>
                 </div>
 
             </li>
             <li class="list-group-item">
 
                 <div class="row">
                   <div class="col">
                     <i class="subofsub-icon" style="margin-left:50px"></i>Finishing
                   </div>
                   <div class="col">
                     2 November
                   </div>
                   <div class="col">
                     Action
                   </div>
                 </div>
 
             </li>
           </ul>
         </div>
         <li class="list-group-item list-group-item-action">
 
           <div class="row">
             <div class="col">
               <button class="icon-button" data-toggle="collapse" href="#sublist2-2" onclick="toggleIcon('icon2-2')" style="margin-left:10px">
                 <i id="icon2-2" class="fas fa-chevron-right"></i>
               </button>
               Buffet
             </div>
             <div class="col">
               6 November
             </div>
             <div class="col">
               Action
             </div>
         </div>
         </li>
         <div id="sublist2-2" class="collapse">
           <ul class="list-group list-group-flush">
             <li class="list-group-item">
 
                 <div class="row">
                   <div class="col">
                     <i class="subofsub-icon" style="margin-left:50px"></i>Rangka
                   </div>
                   <div class="col">
                     4 November
                   </div>
                   <div class="col">
                     Action
                   </div>
                 </div>
 
             </li>
           </ul>
         </div>
       </ul>
     </div>
   </ul>
 </div>
 
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script>
   function toggleIcon(iconId) {
     const icon = document.getElementById(iconId);
     if (icon.classList.contains('fa-chevron-right')) {
       icon.classList.remove('fa-chevron-right');
       icon.classList.add('fa-chevron-down');
     } else {
       icon.classList.remove('fa-chevron-down');
       icon.classList.add('fa-chevron-right');
     }
   }
 
   function expandAllLists() {
    const collapsibleButtons = document.querySelectorAll('.icon-button');

    collapsibleButtons.forEach(button => {
      const targetId = button.getAttribute('href').replace('#', '');
      const targetElement = document.getElementById(targetId);

      if (targetElement && !targetElement.classList.contains('show')) {
        button.click(); // Click to expand if not already expanded
      }
    });
  }

  function collapseAllLists() {
    const collapsibleButtons = document.querySelectorAll('.icon-button');

    collapsibleButtons.forEach(button => {
      const targetId = button.getAttribute('href').replace('#', '');
      const targetElement = document.getElementById(targetId);

      if (targetElement && targetElement.classList.contains('show')) {
        button.click(); // Click to collapse if already expanded
      }
    });
  }
 </script>

@endsection