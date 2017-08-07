<?php
namespace ToucanTech\Repositories;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author daguine
 */
interface RepositoryInterface {
    public function getAll();
    public function getAllWithPagination($pagination);
    public function getById($id);
     public function getByIds(Array $ids);
    public function create(Array $attributes);
    public function update($id, Array $attributes);
    public function delete($id);
}
