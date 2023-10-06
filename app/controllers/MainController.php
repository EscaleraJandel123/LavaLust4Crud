<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class MainController extends Controller {
    
    public function home(){
        $this->call->model('Main_model');
        $data['employee'] = $this->Main_model->getInfo();
        $this->call->view('home',$data);
    }
    
    public function add(){
        $fullName = $this->io->post('fullName');
        $address = $this->io->post('address');
        $contact = $this->io->post('contact');
        $bind = array(
            "fullName" => $fullName,
            "address" => $address,
            "contact" => $contact,
        );
        $this->db->table('employee')->insert($bind);
        redirect('/home');
    }
    public function delete($id)
    {
        if(isset($id)){
            $this->db->table('employee')->where("id", $id)->delete();
            redirect('/home');
        }
        else{
            $_SESSION['delete'] = "FAILED";
            redirect('/home');
        }
        
    }
    public function edit($id)
    {
        $this->call->model('Main_model');
        $data['employee'] = $this->Main_model->getInfo();
        $data['edit'] = $this->Main_model->searchInfo($id);
        $this->call->view('home', $data);
    }
    public function submitedit($id)
    {
        if(isset($id))
        {
            $fullName = $this->io->post('fullName');
            $address = $this->io->post('address');
            $contact = $this->io->post('contact');
        $data = [
            "fullName" => $fullName,
            "address" => $address,
            "contact" => $contact,
        ];
        $this->db->table('employee')->where("id", $id)->update($data);
        redirect('/home');    
        }
        
    }
}
?>
