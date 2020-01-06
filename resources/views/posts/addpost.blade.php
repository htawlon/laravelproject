@extends('layouts.app')

@section('title') AddPosts @stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                @include('partials.menu')
            </div>
            <div class="col-sm-9">
                <div><i class="fas fa-plus-square-o"></i>New post</div>
                <div class="dropdown-divider"></div>
                <div class="row">
                    <div class="col-sm-8">
                        <form enctype="multipart/form-data" method="post" action="{{route('post.add')}}">
                            @csrf
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control-file @if($errors->has('image')) is-invalid @endif">
                                @if($errors->has('image'))<span class="invalid-feedback">{{$errors->first('image')}}</span>@endif
                            </div>
                            <div class="form-group">
                                <label for="item_name">Item Name</label>
                                <input type="text" name="item_name" id="item_name" class="form-control-file @if($errors->has('item_name')) is-invalid @endif">
                                @if($errors->has('item_name'))<span class="invalid-feedback">{{$errors->first('item_name')}}</span>@endif
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control-file @if($errors->has('price')) is-invalid @endif">
                                @if($errors->has('price'))<span class="invalid-feedback">{{$errors->first('price')}}</span>@endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" name="description"  id="description" class="form-control-file @if($errors->has('description')) is-invalid @endif"></textarea>
                                @if($errors->has('description'))<span class="invalid-feedback">{{$errors->first('description')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <label for="Category"></label>
                               <select name="category" id="category" class="custom-select @if($errors->has('category')) is-invalid @endif">
                                   @foreach($cats as $c)
                                       <option value="{{$c->id}}">{{$c->cat_name}}</option>
                                       @endforeach
                               </select>
                                @if($errors->has('category'))<span class="invalid-feedback">{{$errors->first('category')}}</span>@endif
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-lg">Save</button>
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




