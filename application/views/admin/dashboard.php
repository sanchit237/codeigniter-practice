<?php include("header.php"); ?>

<div class="container" style="margin-top:20px;">
<h1>Welcome to dashboard</h1>

<?php if($update=$this->session->flashdata('update')):?>
<div class="row">
<div class="col-lg-6">
<div class="alert alert-success">
<?php echo $update; ?>     
    
</div>    
</div>    
</div>
<?php endif; ?>







<?php if($delete=$this->session->flashdata('delete')):?>
<div class="row">
<div class="col-lg-6">
<div class="alert alert-success">
<?php echo $delete; ?>     
    
</div>    
</div>    
</div>
<?php endif; ?>

<?php if($success=$this->session->flashdata('success')):?>
<div class="row">
<div class="col-lg-6">
<div class="alert alert-success">
<?php echo $success; ?>     
    
</div>    
</div>    
</div>
<?php endif; ?>
<div class="row">
<a href="add" class="btn btn-primary">add article</a>
</div>

<table class="table">
<thead>
    <tr>
        <th>Article</th>
        <th>body</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
  <?php if(count($articles)): ?>
   <?php foreach ($articles as $article): ?>
    <tr>

        <td><?php echo $article->article_title; ?></td>
        <td><?php echo $article->article_body; ?></td>
        <td><?=  anchor("admin/edituser/{$article->id}",'Edit',['class'=>'btn btn-secondary']);  ?></td>
        <td>
        
        <?= 
        form_open('admin/del'),
        form_hidden('id',$article->id),    
        form_submit(['name'=>'submit','value'=>'delete','class'=>'btn btn-secondary']),
        form_close();    
        
        
        ?>
        
        </td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
    <tr>
        <td colspan="3">No data available</td>
    </tr>
    <?php endif; ?>
    
</tbody>       
   
</table>

<?php echo $this->pagination->create_links(); ?>
 </div>

</div>




<?php include("footer.php"); ?>