<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sd3/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title><?=$title ?? '' ?></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="topnav">
            <a href="/sd3/">Home</a>
            <a href="/sd3/list">List of Books</a>
            
            <?php if(!empty($_SESSION['username']) && $_SESSION['role']==='admin'):?>
            <a href="/sd3/add">Add Book</a>   
            <a href="/sd3/authorList">List of Author</a>
            <a href="/sd3/categoryList">Category List</a>
            <?php endif?>
            <?php if(!empty($_SESSION['username'])):?>
            <a href="/sd3/orders">Orders</a>
            <a href="/sd3/logout">Logout</a>
            <?php else:?>
            <a href="/sd3/login">Login</a>
            <?php endif?>
            </div>
        </div>
    <?php echo $output?>
    </div>
    <script src="/sd3/app.js"></script>
</body>
</html>