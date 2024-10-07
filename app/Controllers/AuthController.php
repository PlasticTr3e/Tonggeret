<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginUser()
    {
        $userModel = new UserModel();
        $session = session();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'isLoggedIn' => true,
            ]);
            return redirect()->to('/movies/homepage');
        } else {
            $session->setFlashdata('error', 'Invalid login credentials.');
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerUser()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');

        $existingUser = ($userModel->where('email', $email)->first() ||  $userModel->where('username', $username)->first());
        if ($existingUser) {
            session()->setFlashdata('error', 'Email or username already exists. Please use another email.');
            return redirect()->back();
        }

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        if ($userModel->insert($data)) {
            return redirect()->to('/auth/login')->with('success', 'Registration successful! Please log in.');
        } else {
            session()->setFlashdata('error', 'Registration failed. Please try again.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
