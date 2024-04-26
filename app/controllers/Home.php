<?php

// The controller class contains several methods for several tasks and we should select the one that we want
// Ex: to go to edit mode select edit method
//     to view data select index method
//     to delete data select delete method

class Home extends Controller
{
    public function index()
    {

        $data['title'] = 'Home';
        $this->view('pages/home.view', $data);
    }

}
