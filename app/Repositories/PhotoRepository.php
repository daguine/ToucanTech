<?php

namespace ToucanTech\Repositories;

/**
 * Description of PhotoRepository
 *
 * @author Paul Valdez
 */
use ToucanTech\Model\Photo;

class PhotoRepository implements RepositoryInterface {

    private $model;

    public function __construct(Photo $photo) {
        $this->model = $photo;
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
        $this->model = $this->getById($id);
        $this->model->file = $attributes['file_name'];
        $this->model->update();
        return $this->model;
    }

    public function create(array $attributes) {
        
        $user_id = $attributes['user_id'];
        $this->model->file = $attributes['file_name'];
        $this->model->user_id = $user_id;
        $this->model->save();
        return $this->model;
    }

    public function delete($id) {
        $photo = $this->getById($id);
        return $photo->delete();
    }

    public function getByIds(Array $ids) {
        return $this->model->findMany($ids);
    }

}
