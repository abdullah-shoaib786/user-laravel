@extends('main')

@section('content')
    <h1>Profile Page Here!</h1>
    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{Session::get('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="upload" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="email" value="{{session('email')}}"/>
        <input  type="file" name="file" />
        <button type="submit">Upload Profile</button>
    </form>


    <a href="/logout">Logout</a>
@stop


