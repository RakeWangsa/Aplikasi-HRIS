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
                <li><a class="dropdown-item" data-toggle="modal" data-target="#okr_kbl">OKR KBL</a></li>
                <li><a class="dropdown-item" data-toggle="modal" data-target="#okr_ash">OKR ASH</a></li>
            </ul>

            <!-- Modal OKR KBL -->
            <div class="modal fade" id="okr_kbl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Indikator OKR KBL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ route('addOKR') }}" method="post">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group mb-3">
                        <label for="jenis">Jenis :</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" value="OKR KBL" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="parent">Parent :</label>
                        <select class="form-control" id="parent" name="parent" required>
                            <option value="0">-</option>
                            @foreach($OKR_KBL as $row)
                            @if($row->level!="subofsub")
                              <option value="{{ $row->id }}">{{ $row->indikator }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group mb-3">
                          <label for="indikator">Indikator :</label>
                          <input type="text" class="form-control" id="indikator" name="indikator" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
              </div>
            </div>

            <!-- Modal OKR ASH -->
            <div class="modal fade" id="okr_ash" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Indikator OKR ASH</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ route('addOKR') }}" method="post">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group mb-3">
                        <label for="jenis">Jenis :</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" value="OKR ASH" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="parent">Parent :</label>
                        <select class="form-control" id="parent" name="parent" required>
                            <option value="0">-</option>
                            @foreach($OKR_ASH as $row)
                            @if($row->level!="subofsub")
                              <option value="{{ $row->id }}">{{ $row->indikator }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group mb-3">
                          <label for="indikator">Indikator :</label>
                          <input type="text" class="form-control" id="indikator" name="indikator" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
              </div>
            </div>

        </div>
    
        <div class="ml-auto">
            <button onclick="expandAllLists()" class="btn btn-success"><i class="fas fa-arrow-down"></i> Expand</button>
            <button onclick="collapseAllLists()" class="btn btn-danger"><i class="fas fa-arrow-up"></i> Hide</button>
        </div>

    </div>
    </nav>
    
</div>



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
 
 <div class="container mt-4">
  {{-- OKR KBL --}}
   <ul class="list-group">

    <li class="list-group-item list-group-item-action" style="background-color:#57de57">
        <div class="row">
    
    
        <div class="col">
          <strong>OKR KBL</strong>
        </div>
        <div class="col">

          </div>
          <div class="col">

          </div>
        <div class="col">
          <strong>Status</strong>
        </div>
        <div class="col">
          <strong>Action</strong>
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

     </div>
     <div class="col">
      <span class="badge @if($row->status == 'Pending') bg-warning @elseif($row->status == 'Failed') bg-danger @elseif($row->status == 'Complete') bg-success @endif" data-toggle="modal" data-target="#modal{{ $row->id }}">
        {{ $row->status }}
      </span>
     </div>
     <div class="col">
      <a href="{{ route('deleteOKR', ['id' => encrypt($row->id)]) }}" onclick="return confirm('Apakah Anda yakin?')"><span class='bx bxs-trash bx-border-circle bg-danger text-white'></span></a>
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

             </div>
             <div class="col">
              <span class="badge @if($sublist->status == 'Pending') bg-warning @elseif($sublist->status == 'Failed') bg-danger @elseif($sublist->status == 'Complete') bg-success @endif" data-toggle="modal" data-target="#modal{{ $sublist->id }}">
                {{ $sublist->status }}
              </span>
             </div>
             <div class="col">
              <a href="{{ route('deleteOKR', ['id' => encrypt($sublist->id)]) }}" onclick="return confirm('Apakah Anda yakin?')"><span class='bx bxs-trash bx-border-circle bg-danger text-white'></span></a>
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
                     
                   </div>
                   <div class="col">
                    <span class="badge @if($subofsub->status == 'Pending') bg-warning @elseif($subofsub->status == 'Failed') bg-danger @elseif($subofsub->status == 'Complete') bg-success @endif" data-toggle="modal" data-target="#modal{{ $subofsub->id }}">
                      {{ $subofsub->status }}
                    </span>
                   </div>
                   <div class="col">
                    <a href="{{ route('deleteOKR', ['id' => encrypt($subofsub->id)]) }}" onclick="return confirm('Apakah Anda yakin?')"><span class='bx bxs-trash bx-border-circle bg-danger text-white'></span></a>
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
          <strong>OKR ASH</strong>
        </div>
        <div class="col">

          </div>
          <div class="col">

          </div>
        <div class="col">
          <strong>Status</strong>
        </div>
        <div class="col">
          <strong>Action</strong>    
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
                     
     </div>
     <div class="col">
      <span class="badge @if($row->status == 'Pending') bg-warning @elseif($row->status == 'Failed') bg-danger @elseif($row->status == 'Complete') bg-success @endif" data-toggle="modal" data-target="#modal{{ $row->id }}">
        {{ $row->status }}
      </span>
     </div>
     <div class="col">
      <a href="{{ route('deleteOKR', ['id' => encrypt($row->id)]) }}" onclick="return confirm('Apakah Anda yakin?')"><span class='bx bxs-trash bx-border-circle bg-danger text-white'></span></a>
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
                     
             </div>
             <div class="col">
              <span class="badge @if($sublist->status == 'Pending') bg-warning @elseif($sublist->status == 'Failed') bg-danger @elseif($sublist->status == 'Complete') bg-success @endif" data-toggle="modal" data-target="#modal{{ $sublist->id }}">
                {{ $sublist->status }}
              </span>
             </div>
             <div class="col">
              <a href="{{ route('deleteOKR', ['id' => encrypt($sublist->id)]) }}" onclick="return confirm('Apakah Anda yakin?')"><span class='bx bxs-trash bx-border-circle bg-danger text-white'></span></a>
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
                     
                   </div>
                   <div class="col">
                    <span class="badge @if($subofsub->status == 'Pending') bg-warning @elseif($subofsub->status == 'Failed') bg-danger @elseif($subofsub->status == 'Complete') bg-success @endif" data-toggle="modal" data-target="#modal{{ $subofsub->id }}">
                      {{ $subofsub->status }}
                    </span>
                   </div>
                   <div class="col">
                    <a href="{{ route('deleteOKR', ['id' => encrypt($subofsub->id)]) }}" onclick="return confirm('Apakah Anda yakin?')"><span class='bx bxs-trash bx-border-circle bg-danger text-white'></span></a>
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

 @foreach($OKR as $row)
             <!-- Modal Status -->
             <div class="modal fade" id="modal{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $row->indikator }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ route('updateStatusOKR') }}" method="post">
                    @csrf
                    <div class="modal-body">
                    <div class="form-group mb-3">
                        <input style="display:none" type="text" class="form-control" id="id_okr" name="id_okr" value="{{ $row->id }}" readonly>
                        <label for="status">Status :</label>
                        <select class="form-control" id="status" name="status" required>
                              <option value="Complete" @if($row->status=="Complete") selected @endif>Complete</option>
                              <option value="Pending" @if($row->status=="Pending") selected @endif>Pending</option>
                              <option value="Failed" @if($row->status=="Failed") selected @endif>Failed</option>
                        </select>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
              </div>
            </div>
@endforeach
 
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