<?php

namespace ToucanTech\Http\Controllers;

use ToucanTech\Http\Requests\UserCreateRequest;
use ToucanTech\Http\Requests\UserUpdateRequest;
use ToucanTech\Repositories\UserRepository;
use ToucanTech\Repositories\RoleRepository;
use ToucanTech\Repositories\PhotoRepository;
use ToucanTech\Repositories\SchoolRepository;
use Illuminate\Support\Facades\Session;
use ToucanTech\FileUtil\FileUtil;


class UserController extends Controller {

    
    const DIR_UPLOAD = 'images/upload/';

    private $userRepository;
    private $roleRepository;
    private $schoolRepository;
    private $photoRepository;
    
    private $users;
    private $roles;
    private $schools;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository,
            SchoolRepository $schoolRepository, PhotoRepository $photoRepository) {

        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->schoolRepository = $schoolRepository;
        $this->photoRepository = $photoRepository;
    
        $this->initCollections();         
    }

    private function initCollections(){
        $this->roles =  $this->roleRepository->getAll()->pluck('name','id');
         $this->schools = $this->schoolRepository->getAll()->pluck('name','id');
         $this->users =  $this->userRepository->getAllWithPagination(self::PAGINATION);
    }
    

    public function index() {
        return view("admin.user.index",["users"=> $this->users,'schools'=>$this->schools,'roles'=>$this->roles]);
    }

    public function create() {
        return view("admin.user.create", ['schools'=>$this->schools,'roles'=>$this->roles]);
    }

    public function store(UserCreateRequest $request) {
        //check if email is already exist
        $isValidEmail = count($this->userRepository->getByEmail($request['email'])) > 0 ? false : true;
        if ($isValidEmail) {
            $password = bcrypt($request['password']);
            $request["password"] = $password;

            $user = $this->userRepository->create($request->all());
            if ($file = $request->file('photo')) {
                $name =$name = FileUtil::move($file,self::DIR_UPLOAD);
                $attribute["file_name"] = $name;
                $attribute["user_id"] = $user->id;
                $this->photoRepository->create($attribute);
            }
            Session::flash('success', trans('message.create_user'));
        } else {
            Session::flash('error', trans('message.invalid_email'));
        }
        return redirect()->back();
    }

    public function show($id) {
        //$user = $this->userRepository->getById($id);
        return redirect()->back();
    }

    public function edit($id) {
        $user = $this->userRepository->getById($id);
        return view("admin.user.edit",["user"=> $user,'schools'=>$this->schools,'roles'=>$this->roles]);
    }

    public function update(UserUpdateRequest $request, $id) {
         $email =$this->userRepository->getById($id)->email;
        if($email !=  $request['email']){
             $isValidEmail = count($this->userRepository->getByEmail($request['email'])) > 0 ? false : true;
            if (!$isValidEmail) {
                Session::flash('error', trans('message.invalid_email'));
                return $this->index();
            }
        }
        
        $user = $this->userRepository->getById($id);
        $this->userRepository->update($user->id, $request->all());
        
        if ($file = $request->file('photo')) {
            $name = FileUtil::move($file,self::DIR_UPLOAD);
            $attribute ["file_name"] = $name;
            if (count($user->photo) > 0) {
                FileUtil::delete(self::DIR_UPLOAD.$user->photo->file);
                $this->photoRepository->update($user->photo->id, $attribute);
            } else {
                $attribute["user_id"] = $user->id;
                $this->photoRepository->create($attribute);
            }
        }

        Session::flash('success', trans('message.update_user'));
        return redirect('admin/user');
    }

    public function destroy($id) {
        $this->userRepository->delete($id);
        Session::flash('success', trans('message.delete_user'));
        return redirect('admin/user');
    }

    
    public function user($school_id){
        $this->users = $this->schoolRepository->getById($school_id)->users()->paginate(self::PAGINATION);
        return view("admin.user.index",["users"=> $this->users,'schools'=>$this->schools,'roles'=>$this->roles]);
    }

}
