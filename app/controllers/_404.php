<?php

class _404 extends Controller
{
    function index()
    {
        $data['title'] = "404";

        $this->view('pages/404', $data);
    }
}
