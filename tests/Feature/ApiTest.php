<?php

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


it('can add plant', function () {

    $response = $this->post('/api/plant', ['name' => 'random test name', 'share' => true]);
    //Assert that the response has a 200 status code
    $response->assertStatus(200);
    //Check invalid input
    $response = $this->post('/api/plant', ['name' => null, 'share' => true]);
    //More check for correct api response
    $response->assertStatus(302);


});

it('can add enviroment', function () {

    $response = $this->post('/api/plant/1/environment', ['data' => [

    ]]);
    //Assert that the response has a 200 status code
    $response->assertStatus(200);



});
