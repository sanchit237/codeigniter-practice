<?php include("header.php"); ?>


 <div class="container" style="margin-top:20px;">
     <h1> Add Articles </h1>
      
  <?php echo form_open_multipart('admin/validate'); ?>
  <?php echo form_hidden('user_id',$this->session->userdata('id')); ?>
   <div class="row">
   <div class="col-lg-6">
   <div class="form-group">
       
    <label for="article">Article title</label>   
    <?php echo form_input(['type'=>'text','class'=>'form-control','name'=>'article_title','value'=>set_value('article_title')]);?>      
   </div>
       </div>
       <div class="col-lg-6" style="margin-top:40px">
        <?php echo form_error('article_title'); ?>   
           
       </div>
     </div>
     
     <div class="row">
     <div class="col-lg-6">
    <div class="form-group">
       
    <label for="body">body</label>   
  <?php echo form_textarea(['type'=>'text','class'=>'form-control','name'=>'article_body','value'=>set_value('article_body')]);?>      
    </div>
    </div>
    
    <div class="col-lg-6" style="margin-top:40px">
        <?php echo form_error('article_body'); ?>
    </div>
     </div>
      <div class="row">
     <div class="col-lg-6">
    <div class="form-group">
       
    <label for="body">Image upload</label>   
    <?php echo form_upload(['name'=>'userfile']); ?>      
    </div>
    </div>
    
    <div class="col-lg-6" style="margin-top:40px;">
        <?php 
        if(isset($upload_error)){
            
            echo $upload_error;
        }
        
        
        ?>
    </div>
     </div>
     
    
       
   <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'submit']);?>   <?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'reset']);?>     
   <?php echo form_close(); ?>  
     
 </div>


<?php include("footer.php"); ?>