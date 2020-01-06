@extends('layouts.app')

@section('title') all user @stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                @include('partials.menu')
            </div>
            <div class="col-sm-9">
              <table class="table table-borderless table-hover">
                  <tr class="bg-secondary text-white">
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Joint Date</th>
                      <th> Actions </th>
                  </tr>
                    @foreach( $users as $u)
                        <tr class="small">
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>
                                @if($u->hasAnyRole(['Admin','Member']))
                                    {{$u->roles->first()->name}}
                                    @else
                                    Role not assign.
                                    @endif

                            </td>
                            <td>{{$u->created_at->diffForHumans()}}</td>
                            <td>
                                <a data-toggle="modal" data-target="" href="#d{{$u->id}}" class="btn btn-outline-info btn-sm">
                                    <span data-toggle="tooltip" data-placement="top" title="Assign User Role">
                                        <i class="fas fa-user-cog"></i>
                                    </span>
                                </a>
                                <!-- Modal  _-->
                                <div id="d{{$u->id}}" class="modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <form method="post" action="{{route('user.all_user')}}">
                                                <input type="hidden" name="user_id" value="{{$u->id}}">
                                            <div class="modal-header">
                                                @csrf
                                                <h5 class="modal-title">Assign role for <b>"{{$u->name}}"</b></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="role">Selected Role</label>
                                                    <select name="role" id="role" class="custom-select">
                                                        @foreach($roles as $r)
                                                            <option>{{$r->name}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--end modal-->
                                <a href="{{route('user.edit',['id'=>$u->id])}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-user-edit"></i></a>

                                <a data-toggle="modal" data-target="#e{{$u->id}}" href="#" class="btn btn-outline-danger btn-sm"><i class="fas fa-user-times"></i></a>
                                <!-- delete Modal -->
                                <div id="e{{$u->id}}" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger"> Confirm Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center text-warning">
                                              <i class="fas fa-exclamation-triangle"></i>
                                                <p>Are youu sure? This user name<b>"{{$u->name}}"</b> will be delete permentely</p>
                                            </div>
                                            <div class="modal-footer">
                                               <a href="{{route('user.drop',['id'=>$u->id])}}">Agree</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal end-->
                            </td>
                        </tr>
                        @endforeach
              </table>
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





