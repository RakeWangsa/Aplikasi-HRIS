@extends('layouts.main')

@section('container')

<div class="pagetitle mt-3">
    <h1>Penilaian OKR</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/employee/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Penilaian</li>
            <li class="breadcrumb-item active">OKR</li>
        </ol>
    </nav>
</div>

<style>
    .subofsub-icon {
     width: 6px; /* Lebar ikon bulat */
     height: 6px; /* Tinggi ikon bulat */
     background-color: black; /* Warna latar belakang ikon */
     border-radius: 50%; /* Mengatur ikon menjadi bulat */
     display: inline-block;
     margin-right: 3px; /* Jarak antara ikon dan teks */
   }
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

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<div class="container">
    <div class="ml-auto mb-2">
        <button onclick="expandAllLists()" class="btn btn-success"><i class="fas fa-arrow-down"></i> Expand</button>
        <button onclick="collapseAllLists()" class="btn btn-danger"><i class="fas fa-arrow-up"></i> Hide</button>
    </div>

    {{-- OKR KBL --}}
     <ul class="list-group">
  
      <li class="list-group-item list-group-item-action" style="background-color:#57de57">
          <div class="row">
      
      
          <div class="col">
            OKR KBL
          </div>
          <div class="col">
  
            </div>
          <div class="col">
            Status
          </div>
        </div>
          </li>
  
          @foreach($OKR_KBL as $row)
          @if($row->parent=="0")
       <li class="list-group-item list-group-item-action">
       <div class="row">
   
   
       <div class="col">
         <button class="icon-button" data-toggle="collapse" href="#list{{ $row->id }}" onclick="toggleIcon('{{ $row->id }}')">
           <i id="{{ $row->id }}" class="fas fa-chevron-right"></i>
         </button>
         {{ $row->indikator }}
       </div>
       <div class="col">
  
       </div>
       <div class="col">
        <span class="badge @if($row->status == 'Pending') bg-warning @elseif($row->status == 'Failed') bg-danger @elseif($row->status == 'Complete') bg-success @endif">
          {{ $row->status }}
        </span>
       </div>
     </div>
       </li>
       <div id="list{{ $row->id }}" class="collapse">
         <ul class="list-group list-group-flush">
  
          @foreach($OKR_KBL as $sublist)
          @if($sublist->parent==$row->id)
           <li class="list-group-item list-group-item-action">
             <div class="row">
               <div class="col">
                 <button class="icon-button" data-toggle="collapse" href="#sublist{{ $sublist->id }}" onclick="toggleIcon('{{ $sublist->id }}')" style="margin-left:10px">
                   <i id="{{ $sublist->id }}" class="fas fa-chevron-right"></i>
                 </button>
                 {{ $sublist->indikator }}
               </div>
               <div class="col">
  
               </div>
               <div class="col">
                <span class="badge @if($sublist->status == 'Pending') bg-warning @elseif($sublist->status == 'Failed') bg-danger @elseif($sublist->status == 'Complete') bg-success @endif">
                  {{ $sublist->status }}
                </span>
               </div>
           </div>
           </li>
  
  
           <div id="sublist{{ $sublist->id }}" class="collapse">
             <ul class="list-group list-group-flush">
              @foreach($OKR_KBL as $subofsub)
              @if($subofsub->parent==$sublist->id)
               <li class="list-group-item">
   
                   <div class="row">
                     <div class="col">
                       <i class="subofsub-icon" style="margin-left:50px"></i>{{ $subofsub->indikator }}
                     </div>
                     <div class="col">
                       
                     </div>
                     <div class="col">
                      <span class="badge @if($subofsub->status == 'Pending') bg-warning @elseif($subofsub->status == 'Failed') bg-danger @elseif($subofsub->status == 'Complete') bg-success @endif">
                        {{ $subofsub->status }}
                      </span>
                     </div>
                   </div>
   
               </li>
               @endif
               @endforeach
  
             </ul>
           </div>
           @endif
           @endforeach
         </ul>
       </div>
       @endif
       @endforeach
  
     </ul>
  
     {{-- OKR ASH --}}
     <ul class="list-group mt-4">
  
      <li class="list-group-item list-group-item-action" style="background-color:#57de57">
          <div class="row">
      
      
          <div class="col">
            OKR ASH
          </div>
          <div class="col">
  
            </div>
          <div class="col">
            Status
          </div>
        </div>
          </li>
  
          @foreach($OKR_ASH as $row)
          @if($row->parent=="0")
       <li class="list-group-item list-group-item-action">
       <div class="row">
   
   
       <div class="col">
         <button class="icon-button" data-toggle="collapse" href="#list{{ $row->id }}" onclick="toggleIcon('{{ $row->id }}')">
           <i id="{{ $row->id }}" class="fas fa-chevron-right"></i>
         </button>
         {{ $row->indikator }}
       </div>
       <div class="col">
  
       </div>
       <div class="col">
        <span class="badge @if($row->status == 'Pending') bg-warning @elseif($row->status == 'Failed') bg-danger @elseif($row->status == 'Complete') bg-success @endif">
          {{ $row->status }}
        </span>
       </div>
     </div>
       </li>
       <div id="list{{ $row->id }}" class="collapse">
         <ul class="list-group list-group-flush">
  
          @foreach($OKR_ASH as $sublist)
          @if($sublist->parent==$row->id)
           <li class="list-group-item list-group-item-action">
             <div class="row">
               <div class="col">
                 <button class="icon-button" data-toggle="collapse" href="#sublist{{ $sublist->id }}" onclick="toggleIcon('{{ $sublist->id }}')" style="margin-left:10px">
                   <i id="{{ $sublist->id }}" class="fas fa-chevron-right"></i>
                 </button>
                 {{ $sublist->indikator }}
               </div>
               <div class="col">
  
               </div>
               <div class="col">
                <span class="badge @if($sublist->status == 'Pending') bg-warning @elseif($sublist->status == 'Failed') bg-danger @elseif($sublist->status == 'Complete') bg-success @endif">
                  {{ $sublist->status }}
                </span>
               </div>
           </div>
           </li>
  
  
           <div id="sublist{{ $sublist->id }}" class="collapse">
             <ul class="list-group list-group-flush">
              @foreach($OKR_ASH as $subofsub)
              @if($subofsub->parent==$sublist->id)
               <li class="list-group-item">
   
                   <div class="row">
                     <div class="col">
                       <i class="subofsub-icon" style="margin-left:50px"></i>{{ $subofsub->indikator }}
                     </div>
                     <div class="col">
                       
                     </div>
                     <div class="col">
                      <span class="badge @if($subofsub->status == 'Pending') bg-warning @elseif($subofsub->status == 'Failed') bg-danger @elseif($subofsub->status == 'Complete') bg-success @endif">
                        {{ $subofsub->status }}
                      </span>
                     </div>
                   </div>
   
               </li>
               @endif
               @endforeach
  
             </ul>
           </div>
           @endif
           @endforeach
         </ul>
       </div>
       @endif
       @endforeach
  
     </ul>
  
   </div>

@endsection