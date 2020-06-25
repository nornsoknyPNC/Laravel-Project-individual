@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Comment') }}
                </div>
                <div class="card-body">
                    <form action="{{route('edit',$comments->id)}}" method="POST">
                        @csrf
                        @method('patch')
                        <textarea class="form-control" name="comment" id="comment" cols="100" rows="3" >{{$comments->comment}}</textarea>
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
