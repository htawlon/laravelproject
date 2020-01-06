@extends('layouts.app')

@section('title') edit User @stop

@section('content')
    @include('partials.slide')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-sm-3">
                <div class="card shadow">
                  <div class=card-header>Search</div>
                    <div class="card-body">
                        <p><a href="{{route('shopping_cart')}}">
                              <span class="badge badge-success">
                                  <i class="fas fa-shopping-basket"></i> &nbsp;
                                  {{Session::has('cart')? Session::get('cart')->totalQty: "0"}}
                              </span>   items
                            </a>
                        </p>
                        <form method="get" action="{{route('search.posts')}}">
                            <div class="form-group">
                                <input type="search" required name="q" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                   <div class="card-header"><i class="fas fa-clipboard-list"></i>Category</div>
                    <div class="card-body">
                        <table class="table table-borderless table-hover">
                                @foreach($cats as $c)
                                    <tr class="small d-block">
                                        <td class="d-block">
                                            <a class="d-block" href="{{route('posts.by.category',['cat_id'=>$c->id])}}">{{$c->cat_name}}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    @foreach($posts as $p)
                        <div class="col-sm-4">
                            <div class="card mb-3 card" data-toogle="tooltip" data-placement="top" title="{{$p->description}}">
                                <img src="{{route('images',['file_name'=>$p->image])}}" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">{{$p->item_name}}</h5>
                                    <p class="card-text">
                                        <span class="badge badge-secondary">{{$p->price}}MMK</span>
                                    </p>
                                    <p class="card-text">
                                        <small><i class="fas fa-tag"></i>{{$p->category->cat_name}}</small>
                                        &ensp;
                                        <small><i class="fas fa-user-tag"></i>{{$p->user->name}}</small>
                                        &ensp;
                                        <small><i class="fas fa-calender-day"></i>{{date("D(d) m/Y",strtotime($p->created_at))}}</small>
                                    </p>
                                    <a href="{{route('add.to.card',['id'=>$p->id])}}" class="btn btn-outline-primary btn-block"><i class="fas fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
                {{$posts->links()}}
            </div>
        </div>
    </div>
    <div class="card bg-secondary mt-5">
     <div class="card-body">
         <p class="text-center text-white-50">&copy; 2019 Developed By Min Htaw Lon</p>
         <div class="dropdown-divider"></div>
         @foreach($cats as $c)
             <a href="{{route('posts.by.category',['cat_id'=>$c->id])}}" class="text-white text-center">{{$c->cat_name}}</>
             @endforeach
     </div>
    </div>
    @stop
