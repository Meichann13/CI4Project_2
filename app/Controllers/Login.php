<?php

namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $model->where('email', $email)->first();
        $user = $model->where('password', $password)->first();
     

        // Validasi username dan password statis
        if ($email === $user['email'] && $password === $user['password']) {
            // Simpan data ke session
            $sessionData = [
                'username'   => $user['username'],
                'email'      => $user['email'],
                'isLoggedIn' => true,
            ];
            $session->set($sessionData);

            // Simpan username ke cookies (kedaluwarsa 1 hari)
            setcookie('user_email', $user['email'], time() + (86400 * 30), "/"); // 1 hari

            return redirect()->to('/home');
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        // Hapus cookies
        setcookie('email', '', time() - 120, "/");

        return redirect()->to('/');
    }
}