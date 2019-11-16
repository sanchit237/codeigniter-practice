<?php 

class Loginmodel extends CI_Model{
    
    
    public function isvalidate($username,$password){
        
       $q=$this->db->where(['username'=>$username,'password'=>$password])
                   ->get('users');
        
              if($q->num_rows()){
                  return $q->row()->id;
              }
            else {
                
                return false;
            }
        
        
    }
    
    public function articlelist($limit,$offset){
        
        $id = $this->session->userdata('id');
        $q = $this->db->select()
                      ->from('articles')
                      ->where(['user_id'=>$id])
                      ->limit($limit,$offset)
                      ->get();
                     return $q->result();
       }
    
     public function num_rows(){
        
        $id = $this->session->userdata('id');
        $q = $this->db->select()
                      ->from('articles')
                      ->where(['user_id'=>$id])
                      ->get();
                     return $q->num_rows();
       }
    
    public function add_article($array){
        
        return $this->db->insert('articles',$array);
        
    }
    
    public function add_user($array){
        
        return $this->db->insert('users',$array);
        
    }
    
    public function del_article($id){
        
        return $this->db->delete('articles',['id'=>$id]);
        
    }
    
    public function find_article($articleid){
        
        $query=$this->db->select(['article_title','article_body','id'])
                 ->where('id',$articleid)
                 ->get('articles');
                return $query->row();        
    }
    
    
    public function update_article($articleid,$array){
        
    return $this->db->where('id',$articleid)
                 ->update('articles',$array);
    }
}


?>