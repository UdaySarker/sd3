<div class="row">
	<div class="showItem">
		<img src="<?=$book['bookThumb']?> " width="200px" height="200px" style="margin-bottom: 5px">
		<h3><?=$book['bookTitle']?></h3>
		<span style="color: red">By</span>
		<h4 style="color: green"><?=$book['authorName']?></h4>
		<h5 style="text-decoration: underline;">Book Description</h5>
		<p><?=$book['bookDesc']?></p>
		<ul style="list-style-type: none; margin: 0;padding: 0;">
			<li><a href="/sd3/list">Back</a></li>
			<li><a href="">Add To Cart</a></li>
		</ul>
	</div>

</div>