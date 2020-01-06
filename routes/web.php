<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Routing\RouteGroup;

Route::get('/',[
    'uses'=>'WelcomeController@index',
    'as'=>'/'
]);
Route::get('/post_images/{file_name}',[
    'uses'=>'WelcomeController@getImage',
    'as' =>'images'
   ]);
Route::get('/category/id/{cat_id}/posts',[
    'uses'=>'WelcomeController@getPostsByCategory',
    'as'=>'posts.by.category'
]);
Route::get('/search/posts',[
    'uses'=>'WelcomeController@getSearchPosts',
    'as'=>'search.posts'
]);
Route::get('/addtocard/{id}',[
    'uses'=>'WelcomeController@addToCard',
    'as'=>'add.to.card'
]);
Route::get('/shoppingcart',[
    'uses'=>'WelcomeController@ShoppingCart',
    'as'=>'shopping_cart'

]);
Route::get('/shoppingcart/increase/{id}',[
    'uses'=>'WelcomeController@getIncrease',
    'as'=>'increase.cart'

]);
Route::get('/shoppingcart/decrease/{id}',[
    'uses'=>'WelcomeController@getDecreaseCart',
    'as'=>'decrease.cart'
]);
Auth::routes();

Route::group(['prefix'=>'user','middleware'=>'role:Admin'],function(){

    Route::get('/users',[
        'uses'=>'UserController@getUsers',
        'as'=>'user'

    ]);

    Route::post('/users/role',[
        'uses'=>'UserController@postAssignUserRole',
        'as'=>'user.all_user'

    ]);

    Route::get('/user/delete/{id}',[
        'uses'=>'UserController@getDropUser',
        'as'=>'user.drop'
        ]);

    Route::get('/users/edit/{id}',[
        'uses'=>'UserController@getEdit',
        'as'=>'user.edit'
    ]);
    Route::post('/users/edit/update',[
        'uses'=>'UserController@UpdateUser',
          'as'=>'user.update'

        ]);


});

Route::group(['prefix'=>'user','middleware'=>'auth'], function (){

    Route::get('/dashboard',[
        'uses'=>'HomeController@index',
        'as'=>'dashboard'
    ]);//->middleware('auth');

});

Route::post('/shoppingcart/checkout',[
    'uses'=>'WelcomeController@postCheckout',
    'as'=>'checkout'
]);

Route::group(['prefix'=>'posts','middleware'=>'role:Admin'], function (){
    Route::get('/order/filter_by_month',[
       'uses'=>'OrderController@getOrders',
       'as'=>'filter_by_month'
    ]);
    Route::get('/order/filter_by_date',[
        'uses'=>'OrderController@getOrders',
        'as'=>'filter_by_date'
    ]);

    Route::get('/posts/orders',[
        'uses'=>'OrderController@getOrders',
        'as'=>'posts.orders'
    ]);
    Route::get('/categories',[
        'uses'=>'PostController@getCategories',
        'as'=>'posts.categories'
    ]);
    Route::post('/new/category',[
        'uses'=>'PostController@postNewCategory',
        'as'=>'new.category'
    ]);
    Route::get('/delete/category/id/{id}',[
        'uses'=>'PostController@getDeleteCategory',
        'as'=>'delete.category'
    ]);
    Route::post('/update/category',[

        'uses'=>'PostController@postUpdateCategory',
        'as'=>'update.category'
    ]);
    Route::get('/all', [
        'uses'=>'PostController@getPosts',
            'as'=>'posts.posts'

        ]);
    Route::get('/addpost',[
        'uses'=>'PostController@addpost',
        'as'=>'posts.addpost'
    ]);
    Route::post('/add/post',[
        'uses'=>'PostController@postNewPost',
        'as'=>'post.add'
    ]);
    Route::get('/posts_image/{file_name}',[
        'uses'=>'PostController@getImage',
        'as'=>'posts.image'
    ]);
    Route::get('/delete/post/{id}',[
        'uses'=>'PostController@getDropPost',
        'as'=>'post.drop'
    ]);
    Route::get('/edit/post/{id}',[
        'uses'=>'PostController@editPost',
        'as'=>'post.edit'
    ]);
    Route::post('/edit/post/update',[
        'uses'=>'PostController@postUpdatePost',
        'as'=>'post.update'
    ]);
    Route::get('/searchPost',[
        'uses'=>'PostController@getSearchPost',
        'as'=>'posts.search'
    ]);
});

