@extends('layouts.app')

@section('title') edit User @stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                @include('partials.menu')
            </div>
            <div class="col-sm-9">
                <div><i class="fas fa-plus-square-o"></i> Edit User</div>
                <div class="dropdown-divider"></div>
                <div class="row">
                    <div class="col-sm-8">
                        <form  method="post" action="{{route('user.update')}}">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input value="{{$user->name}}" type="text" name="name" id="name" class="form-control-file @if($errors->has('name')) is-invalid @endif">
                                @if($errors->has('name'))<span class="invalid-feedback">{{$errors->first('item_name')}}</span>@endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input value="{{$user->email}}" type="email" name="email" id="email" class="form-control-file @if($errors->has('email')) is-invalid @endif">
                                @if($errors->has('email'))<span class="invalid-feedback">{{$errors->first('email')}}</span>@endif
                            </div>
                            <a href="{{route('user')}}" class="btn btn-outline-secondary btn-lg"> Cancel</a>
                            <button type="submit" class="btn btn-outline-primary btn-lg"> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(Session('info'))
        <div class="alert alert-success myAlert">
            {{Session('info')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

@stop






