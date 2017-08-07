<?php

namespace ToucanTech\Http\Controllers;

use ToucanTech\Http\Requests\SchoolRequest;
use Illuminate\Support\Facades\Session;
use ToucanTech\Repositories\SchoolRepository;

class SchoolController extends Controller {

    private $schoolRepository;

    public function __construct(SchoolRepository $schoolRepository) {
        $this->schoolRepository = $schoolRepository;
    }

    public function index() {
        $schools = $this->schoolRepository->getAllWithPagination(self::PAGINATION);
        return view("admin.school.index", compact("schools"));
    }

    public function create() {
        return view("admin.school.create");
    }

    public function store(SchoolRequest $request) {
        $isValidRoleName = count($this->schoolRepository->getByName($request['name'])) > 0 ? false : true;
        if ($isValidRoleName) {
            $this->schoolRepository->create($request->all());
            Session::flash('success', trans('message.create_school'));
        }else{
            Session::flash('error', trans('message.invalid_school'));
        }
        return redirect()->back();
    }

    public function show($id) {
        $school = $this->schoolRepository->getById($id);
        return view("admin.school.edit", compact("school"));
    }

    public function edit($id) {
        $school = $this->schoolRepository->getById($id);
        return view("admin.school.edit", compact("school"));
    }

    public function update(SchoolRequest $request, $id) {
         $schoolName =$this->schoolRepository->getById($id)->name;
        if($schoolName !=  $request['name']){
            $isValidSchoolName = count($this->schoolRepository->getByName($request['name'])) > 0 ? false : true;
            if (!$isValidSchoolName) {
                Session::flash('error', trans('message.invalid_school'));
                return $this->index();
            }
        }
        $this->schoolRepository->update($id, $request->all());
        Session::flash('success', trans('message.update_school'));
        return $this->index();
    }

    public function destroy($id) {
        $school = $this->schoolRepository->getById($id);
        if (count($school->users) == 0) {
            $this->schoolRepository->delete($id);
            Session::flash('success', trans('message.delete_school'));
        } else {
            Session::flash('error', trans('message.errorOnDelete'));
        }
        return $this->index();
    }

}
