<?php

namespace App\Controllers;

use App\Libraries\Oauth;
use App\Models\UserModel;
use \OAuth2\Request;
use CodeIgniter\API\ResponseTrait;

class User extends BaseController
{
    use ResponseTrait;

    public function login()
    {
        $oauth = new Oauth();
        $request = new Request();
        $respond = $oauth->server->handleTokenRequest($request->createFromGlobals());
        $code = $respond->getStatusCode();
        $body = $respond->getResponseBody();

        return $this->respond(json_decode($body), $code);
    }

    public function register()
    {
        helper(['form']);
        $data = [];

        if ($this->request->getMethod() != 'post')
            return $this->fail('Only post requests are allowed !!');
        
        $rules = [
            'firstname' => 'required|min_length[3]|max_length[20]',
            'lastname' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email|is_unique[users.email]|min_length[6]|max_length[50]',
            'password' => 'required|min_length[8]',
            'password_confirm' => 'matches[password]',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        } else {
            $data = [
                'firstname' => $this->request->getPost('firstname'),
                'lastname'=> $this->request->getPost('lastname'),
                'email'=> $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
            ];
            $model = new UserModel();
            $user_id = $model->insert($data);
            
            $data['message'] = 'Successfull registration';
            unset($data['password']);

            return $this->respondCreated($data);
        }

    }
}
