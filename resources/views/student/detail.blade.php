@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{$students->id}}" enctype="multipart/form-data">
                <div class="card-header text-center"><img src="/uploads/students/{{ $students->picture }}" width="100px;" height="100px;"></div>

                <div class="card-body">
                        @csrf
                        {{-- @method('patch') --}}
                        <h3><b>{{$students->firstname}} {{$students->lastname}}</b> - {{$students->class}}</h3>
                        <br>
                        <h5>Description</h5>
                        <p>{{$students->description}}</p>
                        <h5>Tutor By: {{$students->user->firstname}}</h5>
                        <hr>
                    </form>
                    <form action="{{route('addComment',$students->id)}}" method="POST">
                        @csrf
                        <textarea class="form-control" name="comment" id="comment" cols="150" rows="3" placeholder="Write comment..."></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                    {{-- <form action="{{route('getComment')}}" method="POST">
                        @foreach ($students as $comment)
                        <textarea class="form-control" name="comment" id="comment" cols="150" rows="3" ></textarea>
                        @endforeach
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
