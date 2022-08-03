<?php 

namespace App\Controllers;
use CodeIgniter\Controller;

class Home extends BaseController
{ 

    public function __construct(){ 
        $this->db = \Config\Database::connect();
        $this->Students_model = model('App\Models\Students_model');

    }//End

    //pages
    public function index()
    {   
        $pageData = $this->Students_model->getStudentRecords();   

        echo view('home', ['pageData' => $pageData]);
    }

    public function add()
    { 
        echo view('add');   
    }

    public function insertRecord(){
        $postData = $this->request->getVar();

        $pageData = $this->Students_model->insertRecord($postData);   
    }
    
    public function edit($id){ 

        $pageData = $this->Students_model->getEditRecord($id);   
  
        echo view('edit', ['pageData' => $pageData, 'id' => $id]);   
    }

    public function editRecord(){
        $postData = $this->request->getVar(); 
        $pageData = $this->Students_model->editRecord($postData);  
    }

    public function deleteRecord(){
        $postData = $this->request->getVar(); 
        $pageData = $this->Students_model->deleteRecord($postData);  
    }

    //functions
    // public function addStudent(){ 
        
    // }

    // public function editStudent(){ 
    // }

    // public function deleteStudent(){ 
        
    // }


}