<?php

namespace ToucanTech\Http\Controllers;

use ToucanTech\Repositories\RoleRepository;
use Illuminate\Support\Facades\Session;
use ToucanTech\Http\Requests\RoleRequest;

class RoleController extends Controller {

    private $roleRepository;

    public function __construct(RoleRepository $roleRepository) {
        $this->roleRepository = $roleRepository;
    }

    public function index() {
        $roles = $this->roleRepository->getAllWithPagination(self::PAGINATION);
        return view("admin.role.index", compact("roles"));
    }

    public function create() {
        return view("admin.role.create");
    }

    public function store(RoleRequest $request) {
        $isValidRoleName = count($this->roleRepository->getByName($request['name'])) > 0 ? false : true;
        if ($isValidRoleName) {
            $this->roleRepository->create($request->all());
            Session::flash('success', trans('message.create_role'));
        } else {
            Session::flash('error', trans('message.invalid_role'));
        }

        return redirect()->back();
    }

    public function show($id) {
        $role = $this->roleRepository->getById($id);
        return view("admin.role.edit", compact("role"));
    }

    public function edit($id) {
        $role = $this->roleRepository->getById($id);
        return view("admin.role.edit", compact("role"));
    }

    public function update(RoleRequest $request, $id) {
        $roleName =$this->roleRepository->getById($id)->name;
        if($roleName !=  $request['name']){
            $isValidRoleName = count($this->roleRepository->getByName($request['name'])) > 0 ? false : true;
            if (!$isValidRoleName) {
                Session::flash('error', trans('message.invalid_role'));
                return $this->index();
            }
        }
        $this->roleRepository->update($id, $request->all());
        Session::flash('success', trans('message.update_role'));
        return $this->index();
    }

    public function destroy($id) {
        $role = $this->roleRepository->getById($id);
        if (count($role->users) == 0) {
            $this->roleRepository->delete($id);
            Session::flash('success', 'Role Deleted Successfuly');
        } else {
            Session::flash('error', trans('message.errorOnDelete'));
        }
        return $this->index();
    }

}
