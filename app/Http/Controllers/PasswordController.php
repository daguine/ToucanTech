<?php

namespace ToucanTech\Http\Controllers;


USE ToucanTech\Http\Requests\PasswordRequest;
use ToucanTech\Repositories\UserRepository;
use Illuminate\Support\Facades\Session;


class PasswordController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

     public function edit($id) {
        $user = $this->userRepository->getById($id);
        return view("admin.user.password_profile", compact('user'));
    }


    public function update(PasswordRequest $request, $id) {        
      $password = bcrypt($request['password']);
      $request["password"] = $password;    
      $this->userRepository->updatePassword($id, $request->all());
       
      Session::flash('success', 'Password Updated Successfuly');
      return redirect('admin');
    }



}
