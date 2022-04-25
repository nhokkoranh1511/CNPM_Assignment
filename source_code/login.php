<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php")
?>

<form method="post">  
        <div class="container" >   
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="username" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <button type="submit">Login</button>   
        </div>   
        
</form>   
<?php
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $loginHandler->login($_POST['username'],$_POST['password']);
    }

    $loginHandler -> checkSessionLoginPage();
    
?>