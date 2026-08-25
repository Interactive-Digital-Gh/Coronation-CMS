<?php

it('redirects guests from the dashboard to login', function () {
    $this->get('/')->assertRedirect(route('login'));
});
