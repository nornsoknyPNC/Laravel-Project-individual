@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action="{{route('students.update',$students->id)}}" enctype="multipart/form-data">
                <div class="card-header text-center"><img src="/uploads/students/{{ $students->picture }}" width="100px;" height="100px;">
                </div>

                <div class="card-body">
                        @csrf
                        @method('patch')
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" placeholder="Firstname" value="{{$students->firstname}}" required autocomplete="firstname" autofocus>
                            </div>
                            <div class="form-group col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" placeholder="Lastname" value="{{$students->lastname}}" required autocomplete="current-lastname">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <select id="class" class="form-control @error('class') is-invalid @enderror" name="class" required autocomplete="current-class">
                                    <option value="WEP2020-A" @if($students->class==='WEP2020-A') selected='selected' @endif>WEP2020-A</option>
                                    <option value="WEP2020-B" @if($students->class==='WEP2020-B') selected='selected' @endif>WEP2020-B</option>
                                    <option value="SNA2020" @if($students->class==='SNA2020') selected='selected' @endif>SNA2020</option>
                                    <option value="Class2021-A" @if($students->class==='Class2021-A') selected='selected' @endif>Class2021-A</option>
                                    <option value="Class2021-B" @if($students->class==='Class2021-B') selected='selected' @endif>Class2021-B</option>
                                    <option value="Class2021-C" @if($students->class==='Class2021-C') selected='selected' @endif>Class2021-C</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <input id="image" type="file" class="form-control @error('file') is-invalid @enderror" name="image" required autocomplete="current-file">
                            </div>

                            <div class="form-group col-md-4">
                                <select id="tutor" class="form-control @error('tutor') is-invalid @enderror" name="tutor" required autocomplete="current-class">
                                    <option value="Admin" @if($students->tutor==='Admin') selected='selected' @endif>Admin</option>
                                    <option value="Normal" @if($students->tutor==='Normal') selected='selected' @endif>Normal</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                        <textarea class="form-control" name="description" id="description" cols="100" rows="4" placeholder="Description">{{$students->description}}</textarea>
                          </div>
                          
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Save') }}
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
@endsection
