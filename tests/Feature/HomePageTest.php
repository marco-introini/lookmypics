<?php

beforeEach(function (): void {
    \Pest\Laravel\withoutVite();
});

it('returns a successful response', function (): void {
    $response = $this->get('/');

    $response->assertStatus(200);
});
