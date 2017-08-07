<?php

namespace ToucanTech\Repositories;

/**
 * Description of RoleRepository
 *
 * @author Paul Valdez
 */
use ToucanTech\Model\Role;

class RoleRepository implements RepositoryInterface {

    private $model;

    public function __construct(Role $role) {
        $this->model = $role;
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

    public function update($id, array $attributes) {
        $user = $this->getById($id);
        return $user->update($attributes);
    }

    public function create(array $attributes) {
        $this->model = new Role();
        return $this->model->create($attributes);
    }

    public function delete($id) {
        $user = $this->getById($id);
        return $user->delete();
    }

    public function getByIds(array $ids) {
        return $this->model->findMany($ids);
    }

    public function getByName($name) {
        $this->model = Role::where('name','=',$name)->get()->first();
        return $this->model;
    }

}
