<h2><?php echo $post['title']; ?></h2>
<div >
	<small>Posted on <?php echo $post['created_at']; ?> </small><br>
<?php echo $post['body']; ?>
</div>
<hr>
<h4>Comment Section</h4>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
  <fieldset>
    <legend>Leave Comment</legend>
    <div class="form-group row">
    </div>
    <div class="form-group">
      <label >User Name</label>
      <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter User Name">
    </div>
    <div class="form-group">
      <label >Email address</label>
      <input type="email" class="form-control" name='email' aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label >Place your comment here</label>
      <textarea  name="body" class="form-control" rows="3"></textarea>
    </div>
</fieldset>
<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
<button type="submit" class="btn btn-primary">Submit</button>
</form>
<h5>Previous Comments</h5>
<?php if($comments) : ?>
	<?php foreach($comments as $comment) : ?>

		<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  		<div class="toast-header">
  			<?php
  				if($comment['name'] === ''){
  					$get_name = explode('@', $comment['email'] );
  					$comment['name'] = $get_name[0];
  				}
  			 ?>
    		<strong class="mr-auto"><?php echo $comment['name']; ?></strong>
      		<span aria-hidden="true"><small><?php echo $comment['created_at']; ?></small></span>
    		</button>
  			</div>
  			<div class="toast-body">
    		<?php echo $comment['body']; ?>
  			</div>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>Be the first one to add a comment!</p>
<?php endif; ?>
<?php //echo $this->pagination->create_links();
	$pagination_data['links'] = $this->pagination->create_links(); 
    $this->load->view('posts/paginationview', $pagination_data);
 ?>
