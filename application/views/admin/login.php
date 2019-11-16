<?php include("header.php"); ?>


 <div class="container" style="margin-top:20px;">
     <h1>admin form </h1>
     <?php if( $error=$this->session->flashdata('loginf')): ?>
     
     <div class="row">
         <div class="col-lg-6">
         <div class="alert alert-danger">
         <?php echo $error; ?>     
             
         </div>     
             
         </div>
     </div>
     <?php endif; ?>
     
     
     
  <?php echo form_open('login/index'); ?>
   
   <div class="row">
   <div class="col-lg-6">
   <div class="form-group">
       
    <label for="username">Username</label>   
    <?php echo form_input(['type'=>'text','class'=>'form-control','name'=>'username','value'=>set_value('username')]);?>      
   </div>
       </div>
       <div class="col-lg-6" style="margin-top:40px">
        <?php echo form_error('username'); ?>   
           
       </div>
     </div>
     
     <div class="row">
     <div class="col-lg-6">
    <div class="form-group">
       
    <label for="username">Password</label>   
  <?php echo form_password(['type'=>'password','class'=>'form-control','name'=>'password','value'=>set_value('password')]);?>      
    </div>
    </div>
    
    <div class="col-lg-6" style="margin-top:40px">
        <?php echo form_error('password'); ?>
    </div>
     </div>
    <div class="form-group">
       
   <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'submit']);?>   <?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'reset']);?>     <?php echo anchor('login/register','sign-up?','class="link-class"'); ?>    
    </div>
    
    
   <?php echo form_close(); ?>  
    
    
    
    
 </div>


<?php include("footer.php"); ?>