<?php namespace App\Controllers;

use App\Models\BlogModel;
class Pages extends BaseController
{
    public function index()
    {
        $model = new BlogModel();
        $data['news'] = $model->getPosts();


        echo view('templates/header', $data);
        echo view('pages/home');
        echo view('templates/footer');
    }
    function showme($page = 'home'){
       // echo 'This page is: '. $page;
        if (! is_file(APPPATH. '/Views/pages/' .$page. '.php'))
        {
            //whoops, we dont have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        echo view('templates/header');
        echo view('pages/'. $page);
        echo view('templates/footer');
    }
}

