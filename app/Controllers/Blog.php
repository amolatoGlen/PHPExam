<?php namespace App\Controllers;

use App\Models\BlogModel; // Make sure you have the appropriate namespace for your model
class Blog extends BaseController
{
    function post($slug){
        echo view('templates/header');
        echo view('blog/post');
        echo view('templates/footer');
    }

    function create(){
        helper('form');
        $model = new BlogModel();

        if (! $this->validate([
            'title' => 'required|min|_length[3]|max_length[255]',
            'body' => 'required'
        ])){
            echo view('templates/header');
            echo view('blog/create');
            echo view('templates/footer');
        }else{
            $model->save(
                [
                    'title'=> $this->request->getVar('title'),
                    'body'=> $this->request->getVar('body'),
                    'slug'=> url_title($this->request->getVar('title')),
                ]
            );

            return redirect()->to('/');
        }
}

}