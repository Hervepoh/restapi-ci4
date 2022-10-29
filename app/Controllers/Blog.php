<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

// RESTfull ressource handling
// API Response Traits
class Blog extends ResourceController
{
    protected $modelName = 'App\Models\BlogModel';
    protected $format = 'json'; //'xml';

    public function index()
    {
        $posts = $this->model->findAll();
        return $this->respond($posts);
    }

    public function create()
    {
        helper(['form']);
        $rules = [
            'title' => 'required|min_length[6]',
            'description' => 'required',
            'featured_image' => 'uploaded[featured_image]|max_size[featured_image,1024]|is_image[featured_image]',
            //https://codeigniter.com/user_guide/libraries/validation.html?highlight=valide#form-validation-tutorial
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        } else {
            // Get the file
            // https://codeigniter.com/user_guide/installation/upgrade_file_upload.html?highlight=getfile#codeigniter-version-4-x
            $file =  $this->request->getFile('featured_image');
        
            if (!$file->isValid())
                return $this->fail($file->getErrorString());

            $file->move(WRITEPATH . 'uploads/'); //$file->move('./assets/uploads/');

            //$path = $file->store()
            //$data = ['upload_file_path' => $path];

            $data = [
                'post_title' => $this->request->getVar('title'),
                'post_description' => $this->request->getVar('description'),
                'post_featured_image' =>  WRITEPATH . 'uploads/'.$file->getName(),
            ];

            $post_id = $this->model->insert($data);
            $data['post_id'] =  $post_id;

            return $this->respondCreated($data);
        }
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);

        if (!$data)
            return $this->failNotFound('Item not found');

        return $this->respond($data);
    }

    public function update($id = null)
    {
        $data = $this->model->find($id);
        if (!$data)
            return $this->failNotFound('Item not found');
        
            helper(['form']);
        $rules = [
            'title' => 'required|min_length[6]',
            'description' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'post_id'          => $id,
                'post_title'       => $input['title'],
                'post_description' => $input['description']
            ];
            $this->model->save($data);

            return $this->respond($data);
        }
    }

    public function update_upload($id =null)
    {
        helper(['form','array']);

        $rules = [
            'title' => 'required|min_length[6]',
            'description' => 'required',
        ];
        
        // Check if the user what to change the featured_image
        $fileName = dot_array_search('featured_image.name', $_FILES);
        // https://codeigniter.com/user_guide/libraries/uploaded_files.html  
        //https://codeigniter.com/user_guide/installation/upgrade_file_upload.html?highlight=isvalid
        if ($fileName != ''){
            $img   = ['featured_image' => 'uploaded[featured_image]|max_size[featured_image,1024]|is_image[featured_image]'];
            $rules = array_merge($rules,$img);
        }

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        } else {
            //$input = $this->request->getRawInput();
            $data = [
                'post_id' => $id,
                'post_title' =>$this->request->getPost('title'),
                'post_description' =>$this->request->getPost('description')
            ];
            if ($fileName != ''){
                $file = $this->request->getFile('featured_image');
                if (!$file->isValid())
                    return $this->fail($file->getErrorString());

                if (! $file->hasMoved()) 
                    $filepath = WRITEPATH . 'uploads/' . $file->store();
                    $data['post_featured_image'] = $filepath;
                    
                    // use CodeIgniter\Files\File;
                    // $data['uploaded_flleinfo']   = new File($filepath);
                
            }
            $this->model->save($data);

            return $this->respond($data);
        }
    }

    public function delete($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            $this->model->delete($id);
            return $this->respondDeleted($data);
        } else {
            return $this->failNotFound('Item not found');
        }
    }


}
