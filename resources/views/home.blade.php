
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <!-- Nav tabs -->
           <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#home">Follow Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#Out">Out Of Follow Up</a>
            </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
              @if (Auth::user()->role == 1)
                <a href="{{route('students.create')}}" data-toggle="modal" data-target="#myModal">Add Student</a><br><br>
                <div class="modal" id="myModal">
                  <div class="modal-dialog">
                  <div class="modal-content">
                <div class="col-md-12">
                      <div class="header">{{ __('Add Student') }}
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <hr>
                      <div class="card-body">
                      <form method="POST" action="{{route('students.store')}}" enctype="multipart/form-data">
                              @csrf

                              <div class="form-row">
                                  <div class="form-group col-md-6">
                                      <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" placeholder="Firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" placeholder="Lastname" required autocomplete="current-lastname">
                              </div>

                              <div class="form-row">
                                  <div class="form-group col-md-4">
                                      <select id="class" class="form-control @error('class') is-invalid @enderror" name="class" required autocomplete="current-class">
                                          <option disabled selected>Class</option>
                                          <option value="WEP2020-A">WEP2020-A</option>
                                          <option value="WEP2020-B">WEP2020-B</option>
                                          <option value="SNA2020">SNA2020</option>
                                          <option value="Class2021-A">Class2021-A</option>
                                          <option value="Class2021-B">Class2021-B</option>
                                          <option value="Class2021-C">Class2021-C</option>
                                      </select>
                                  </div>

                                  <div class="form-group col-md-4">
                                      <input id="image" type="file" class="form-control @error('file') is-invalid @enderror" name="image"  autocomplete="current-file">
                                  </div>

                                  <div class="form-group col-md-4">
                                      <select id="tutor" class="form-control @error('tutor') is-invalid @enderror" name="tutor"  autocomplete="current-class">
                                          <option disabled selected>Tutor</option>
                                          <option value="Admin">Admin</option>
                                          <option value="Normal">Normal</option>
                                      </select>
                                  </div>
                              </div>
                              
                              <div class="form-group">
                                  <textarea class="form-control" name="description" id="description" cols="100" rows="4" placeholder="Description"></textarea>
                                </div>
                                
                              <div class="form-group row mb-0">
                                  <div class="col-md-8 offset-md-4">
                                      <button type="submit" class="btn btn-primary ">
                                          {{ __('Add') }}
                                      </button>
                                  </div>
                              </div>

                              </div>
                          </form>
                      </div>
                </div>
                </div>
                </div>
              </div>   
              @endif
              
              <div class="col-md-12">
                <input id="search" type="text" class="form-control @error('search') is-invalid @enderror" name="search" placeholder="Search Student Data" required autocomplete="current-search">

                @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div><br>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Picture</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Class</th>
                  @if (Auth::user()->role ==1)
                  <th>Action</th>
                  @endif
                  @if (Auth::user()->role ==0)
                  <th>Action</th>
                  @endif
                </tr>
              </thead>
              <tbody id="followupTable">
                @foreach ($students as $student)
              <tr>
                  @if ($student->activeFollowup==1)
                    <td> <img src="/uploads/students/{{ $student->picture }}" width="100px;" height="100px;"></td>
                    <td> {{ $student->firstname }}</td>
                    <td> {{ $student->lastname }}</td>
                    <td> {{ $student->class }}</td>
                    @if (Auth::user()->role == 1)
                    <td>
                      <a href="{{route('backFollowup',$student->id)}}"><span class="material-icons" title="Out from followup">person_add_disabled</span></a><b> |</b> 
                      <a href="{{route('students.show',$student->id)}}"><span class="material-icons text-info">edit</span></a>
                      <a href="{{route('students.edit',$student->id)}}"><span class="material-icons text-success">remove_red_eyes</span></a>
                    </td>
                    @endif
                    @if (Auth::user()->role == 0)
                     <td><a href="{{route('students.edit',$student->id)}}"><span class="material-icons text-success">remove_red_eyes</span></a></td>
                    @endif
                    @endif
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>



            {{-- Out of followup view --}}
            
            <div id="Out" class="container tab-pane fade"><br>
              <div class="col-md-12">
                <input id="search" type="text" class="form-control @error('search') is-invalid @enderror" name="search" placeholder="Search Student Data" required autocomplete="current-search">

                @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div><br>
              <table class="table table-hover">
                <thead>
                <tr>
                    <th>Picture</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Class</th>
                    @if (Auth::user()->role == 1)
                      <th>Action</th>
                    @endif
                </tr>
              </thead>
              <tbody id="outTable">
                @foreach ($students as $student)
                <tr>
                  @if ($student->activeFollowup==0)
                    <td> <img src="/uploads/students/{{ $student->picture }}" width="100px;" height="100px;"></td>
                    <td> {{ $student->firstname }}</td>
                    <td> {{ $student->lastname }}</td>
                    <td> {{ $student->class }}</td>
                    @if (Auth::user()->role == 1)   
                    <td>
                      <a href="{{route('outFollowup',$student->id)}}"><span class="material-icons text-danger" title="Add to followup">person_add</span></a>
                    </td>
                    @endif
                    @endif
                </tr>
              </tbody>
                @endforeach
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
</div>
@endsection
