<?php 

class Admin extends MY_controller{
    
    
    public function __construct(){
        
        
        parent::__construct();
        if(!$this->session->userdata('id')){
            return redirect('login');
        }
    }
    

    
    public function logout(){
        
        $this->session->unset_userdata('id');
        return redirect('login');
    }
    
    
    public function welcome(){
        
        $config=[
            
            'base_url' => base_url('admin/welcome'),
            'per_page' =>2,
            'total_rows' => $this->loginmodel->num_rows(),
            'full_tag_open' =>"<ul class='pagination'>",
            'full_tag_close' =>"</ul>",
            'next_tag_open' =>"<li>",
            'next_tag_close' =>"</li>",
            'prev_tag_open' =>"<li>",
            'prev_tag_close' =>"</li>",
            'num_tag_open' =>"<li>",
            'num_tag_close' =>"</li>",
            'cur_tag_open' =>"<li class='active'><a>",
            'cur_tag_close' =>"</a></li>",
        ];
        
        $this->pagination->initialize($config);
        
        
        $articles=$this->loginmodel->articlelist($config['per_page'],$this->uri->segment(3));
        $this->load->view('admin/dashboard',['articles'=>$articles]);
    }
    
    
   
  
    public function add(){
        
        $this->load->view('admin/add_article');
    }
    
    public function validate(){
        
        $config=[
                  'upload_path'=>'./uploads/',
                  'allowed_types'=>'gif|jpg|png',     
        ];
        
        $this->upload->initialize($config);
          
    if($this->form_validation->run('add_article_rules') && $this->upload->do_upload()) {
        
        $post=$this->input->post();
        $data=$this->upload->data();
        
        
        $image_path=base_url("uploads/".$data['raw_name'].$data['file_ext']);
        $post['image_path']=$image_path;
        if($this->loginmodel->add_article($post)){
            
            $this->session->set_flashdata('success','article inserted');
            return redirect('admin/welcome');
            
        }
    }
    else {
        
        $upload_error = $this->upload->display_errors();
        $this->load->view('admin/add_article',compact('upload_error'));
    } 
    }
    
    public function del(){
        
        
        $id=$this->input->post('id');
        if($this->loginmodel->del_article($id)){
            
            $this->session->set_flashdata('delete','article deleted');
            return redirect('admin/welcome');
        }
        
    }
    
    public function edituser($id){
        
        $article=$this->loginmodel->find_article($id);
        $this->load->view('admin/edit_article',['article'=>$article]);
    }
    
    public function updateuser($id){
        
        if($this->form_validation->run('add_article_rules')){
        
        $post=$this->input->post();
        if($this->loginmodel->update_article($id,$post)){
            
            $this->session->set_flashdata('update','article updated');
            return redirect('admin/welcome');
            
        }
    }
    else {
        //here $id is of updateuser//
        $this->edituser($id);
    } 
        
        
    }
} 

?>