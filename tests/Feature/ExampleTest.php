<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

//admin panel routes starts from here
$response = $this->get('admin');
$response = $this->post('check_user');
$response = $this->get('admin/logout');
$response = $this->get('admin/index');
$response = $this->get('/categories');
$response = $this->get('/sub_categories');
$response = $this->get('/products');
$response = $this->get('/users');
$response = $this->POST('admin/add_category');
//admin panel routes ends here

//website route starts
$response = $this->get('/googlelogin');
$response = $this->get('/auth/google/callback');
$response = $this->post('/check_users')->name('submit_login_form');
$response = $this->get('/logout');
$response = $this->view('/','index');

$response = $this->get('/product/{pid}');
$response = $this->get('products/{cid}/{sid}');
$response = $this->get('/products');
$response = $this->view('/cart','cart');

//website route ends
    $response = $this->view('buy','buy');
    $response = $this->view('buy/{pid}','checkout')->name('buy_now');
    /*
        Route::get('buy/{pid}', function ($pid) {
            return view('checkout', compact('pid'));
        })->name('buy_now');
    */    
    $response = $this->view('/checkout','checkout');
    $response = $this->get('/stripe');
    $response = $this->post('/stripe');
    $response = $this->resource('orders');
    $response = $this->view('order','order');

        $response->assertStatus(200);
    }
}
