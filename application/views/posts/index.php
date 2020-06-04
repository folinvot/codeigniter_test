<h2><?=$title ?></h2>
<p>MY POSTS</p>
<?php foreach ($posts as $post) : ?>
<h3><?php echo $post['title']; ?></h3>
<small>Posted on <?php echo $post['created_at']; ?> </small><br>
<?php echo $post['body']; ?><br>
<p><br><a type="button" class="btn btn-info" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read More</a></p>
	<?php endforeach;?>