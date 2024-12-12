<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\StudentModel;
use App\Models\Classes;

class StudentController extends BaseController
{
	public function index(){
		$student = new StudentModel();
		$student->select('students.*,classes.name')->join('classes','classes.id = students.student_class');
		$data['students'] = $student->orderBy('id DESC')->paginate();
		$data['pager'] = $student->pager;
		$data['page_title'] = "All Students List";

		echo view('student/header',$data);
		echo view('student/index',$data);
		echo view('student/footer');
	}	


	public function create(){
		$classes = new Classes();
		$data['classes'] = $classes->findAll();

		$data['page_title'] = "Create New Student";
		
		echo view('student/header',$data);
		echo view('student/create',$data);
		echo view('student/footer');
	}


	public function store(){

		if($this->request->getPost('create')){
			
			$validation =  \Config\Services::validation();

			$validation->setRules([
	    		'name' => 'required|string',
	    		'class' => 'required',
	    		'age' => 'required|numeric',
	    		'gender' => 'required'
			]);
			if(!$validation->withRequest($this->request)->run()) {
				$errors = array(
				'error' => $validation->getErrors()
				);
				$session = \Config\Services::session($config);
				$session->setFlashdata($errors);
				return redirect()->back();
			} else {
				
				$student = new StudentModel();
				$data = [
					'student_name' => $this->request->getPost('name'),
					'student_class' => $this->request->getPost('class'),
					'student_age' => $this->request->getPost('age'),
					'student_gender' => $this->request->getPost('gender')
				];
				$insert = $student->insert($data);

				if($insert){
					$session = \Config\Services::session($config);
					$session->setFlashdata('success','Record Added Successfully.');
					return redirect('/');
				}
			}
		}
	}

	public function edit($id){
		$classes = new Classes();
		$data['classes'] = $classes->findAll();
		$student = new StudentModel();
		$data['student'] = $student->where('id',$id)->first();

		$data['page_title'] = "Edit Student";
		
		echo view('student/header',$data);
		echo view('student/edit',$data);
		echo view('student/footer');
	}


	public function update(){
		if($this->request->getPost('update')){
			$validation =  \Config\Services::validation();

			$validation->setRules([
	    		'name' => 'required|string',
	    		'class' => 'required',
	    		'age' => 'required|numeric',
	    		'gender' => 'required'
			]);

			if(!$validation->withRequest($this->request)->run()) {
				$errors = array(
				'error' => $validation->getErrors()
				);
				$session = \Config\Services::session($config);
				$session->setFlashdata($errors);
				return redirect()->back();
			} else {
				$student = new StudentModel();
				$id = $this->request->getPost('id');
				$data = [
					'student_name' => $this->request->getPost('name'),
					'student_class' => $this->request->getPost('class'),
					'student_age' => $this->request->getPost('age'),
					'student_gender' => $this->request->getPost('gender'),
				];
				$update = $student->update($id,$data);
				if($update){
					$session = \Config\Services::session($config);
					$session->setFlashdata('success','Record Updated Successfully.');
					return redirect('/');
				}
			}
		}
	}public function delete($id){
		$student = new StudentModel();

		$delete = $student->delete($id);
		if($delete){
			$session = \Config\Services::session($config);
			$session->setFlashdata('success','Record Deleted Successfully.');
			return redirect('/');
		}
	}
}
