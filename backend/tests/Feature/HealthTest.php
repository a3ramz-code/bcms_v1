<?php

test('health endpoint', function () {
    $response = $this->get('/up');
    $response->assertStatus(200);
});
