
<h2>Welcome To BookStore App</h2>
<?php if(isset($_SESSION['username'])):?>
<p>Hi!!!</p>
<p style="color: green; font-weight:bold"><?=$_SESSION['username']?></p> 
<?php endif?>