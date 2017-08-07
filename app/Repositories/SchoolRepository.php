<?php
namespace ToucanTech\Repositories;
/**
 * Description of SchoolRepository
 *
 * @author Paul Valdez
 */

use ToucanTech\Model\School;

class SchoolRepository implements RepositoryInterface{
    private $model;

    public function __construct(School $school) {
        $this->model = $school;
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

    public function getByIds(Array $ids){
        return $this->model->findMany($ids);
    }
    
    public function update($id, array $attributes) {
        $user = $this->getById($id);
        return $user->update($attributes);
    }

    public function create(array $attributes) {
        $this->model = new School();
        return $this->model->create($attributes);
    }

    public function delete($id) {
        $user = $this->getById($id);
        return $user->delete();
    }
    
      public function getByName($name) {
        $this->model = School::where('name','=',$name)->get()->first();
        return $this->model;
    }
}
