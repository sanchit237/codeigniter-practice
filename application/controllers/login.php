<?php 

class Login extends MY_controller{
    
    
    public function __construct(){
        
        parent::__construct();
        if($this->session->userdata('id')){
         return redirect('admin/welcome');
        }
    }
    
    public function index(){
    
    
    $this->form_validation->set_rules('username','Username','required|alpha|min_length[3]');
    $this->form_validation->set_rules('password','Password','required|min_length[3]');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
    
    if($this->form_validation->run()){
        
      $username = $this->input->post('username');
      $password = $this->input->post('password');
        
      $login_id=$this->loginmodel->isvalidate($username,$password);
      if($login_id){
          
          $this->session->set_userdata('id',$login_id);
          return redirect('admin/welcome');
      }      
        
        else{
            
            $this->session->set_flashdata('loginf','invalid credentials');
            return redirect('login');
        }
    }
    else{
        
        $this->load->view('admin/login');
    }
}
      public function sendemail(){
         
    $this->form_validation->set_rules('username','Username','required|alpha|min_length[3]');
    $this->form_validation->set_rules('password','Password','required|min_length[3]');
    $this->form_validation->set_rules('firstname','Firstname','required|alpha|min_length[3]');
    $this->form_validation->set_rules('lastname','Lastname','required|min_length[3]');
    $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');    
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        
    if($this->form_validation->run()){
        
        $post=$this->input->post();
        if($this->loginmodel->add_user($post)){
            
            $this->session->set_flashdata('added','user added successfully');
            return redirect('login/register');
            
        }
        
//        $this->email->from(set_value('email'),set_value('firstname'));
//        $this->email->to("sanchitnemlekar8@gmail.com");
//        $this->email->subject("Registration greeting");
//        $this->email->message("thank you for the registartion");
//        $this->email->set_newline("\r\n");
//        $this->email->send(); 
//        
//        if(!$this->email->send()){
//            
//            show_error($this->email->print_debugger()); 
//        }
//        else{
//            
//            echo "your email has been sent";
//        }
    } 
    else{
        
        $this->load->view('admin/signup');
    }
    }
     public function register(){
        
        $this->load->view('admin/signup');
    }
    
    
    
}




?>