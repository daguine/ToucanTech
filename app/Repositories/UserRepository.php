<?php

namespace ToucanTech\Repositories;

/**
 * Description of UserRepository
 *
 * @author Paul Valdez
 */
use ToucanTech\User;
use ToucanTech\Repositories\PhotoRepository;

class UserRepository implements RepositoryInterface {

    private $model;
    private $photoRepository;

    public function __construct(User $user, PhotoRepository $photoRepository) {
        $this->model = $user;
        $this->photoRepository = $photoRepository;
    }

    public function getAll() {
        return $this->model->all();
    }

    public function getAllWithPagination($number) {
        return $this->model->paginate($number);
    }

    public function getById($id) {
        return $this->model->findOrFail($id);
    }

    public function getByIds(Array $ids) {
        return $this->model->findMany($ids);
    }

    public function getByEmail($email) {
        $this->model = User::where('email', '=', $email)->first();
        return $this->model;
    }

    public function update($id, array $attributes) {
        $user = $this->getById($id);
        $user->roles()->sync($attributes['roles']);
        $user->schools()->sync($attributes['schools']);
        return $user->update($attributes);
    }

    public function updatePassword($id, array $attributes) {
        $this->model = $this->getById($id);
        $this->model->password = $attributes['password'];
        return $this->model->save();
    }

    public function create(array $attributes) {
        $this->model = new User();
        $this->model->name = $attributes['name'];
        $this->model->email = $attributes['email'];
        $this->model->password = $attributes['password'];
        $this->model->save();

        $role_ids = $attributes['roles'];
        $this->model->roles()->sync($role_ids);

        $school_ids = $attributes['schools'];
        $this->model->schools()->sync($school_ids);

        return $this->model;
    }
    
    public function getBySchool($school_id){
      
       return \ToucanTech\Model\SchoolUser::where('school_id', '=',$school_id)->get();
    }

    public function delete($id) {
        $user = $this->getById($id);
        return $user->delete();
    }

}
