<?php

beforeEach(function () {
   \Pest\Laravel\withoutVite();
});

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
