<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/source_code/handler/includeHandler.php")
?>

<form method="get">  
        <div class="container">   
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="username" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <button type="submit">Login</button>   
        </div>   
        
</form>   
<?php
    if (isset($_GET['username']) && isset($_GET['password'])) {
        $loginHandler->login($_GET['username'],$_GET['password']);
    }

    $loginHandler -> checkSessionLoginPage();
    
?>