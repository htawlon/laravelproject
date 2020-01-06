<div class="accordion d-none d-sm-block" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-user"></i> {{Auth::User()->name}} <i class="fas fa-caret-down"></i>
                </button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </div>

        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-tags"></i> Posts <i class="fas fa-caret-down"></i>
                </button>
            </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{route('posts.categories')}}"><i class="fas fa-clipboard-list"></i> Categories</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('posts.posts')}}"><i class="fas fa-tags"></i> Posts</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('posts.addpost')}}"><i class="fas fa-plus-square"></i>  AddPost</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('posts.orders')}}"><i class="fas fa-user-astronaut"></i> Orders</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <i class="fas fa-user-edit" style="color:crimson"></i> Assigning Role <i class="fas fa-caret-down"></i>
                </button>
            </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
               <ul class="list-group">
                   <li>
                       <a href="{{route('user')}}"><i class="fas fa-users"></i>Users</a>
                   </li>
               </ul>
            </div>
        </div>
    </div>
</div>
