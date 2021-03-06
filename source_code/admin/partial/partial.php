<?php

function addHeader($name)
{
    echo <<<EOL
        <!DOCTYPE html>
        <html lang="vi">
        
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
            <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
            <link rel="shortcut icon" href="/images/PizaTop.ico" type="/image/x-icon"/>
        
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
                integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
                integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

            <link href="/css/admin.css" rel="stylesheet">
        
            <title>$name</title>
        </head>
        
        <body>
            <!-- Navbar -->
            <div class="container">
                <div class="container">
                    <header
                        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        
                        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="/food-menu.php" class="nav-link px-2 link-secondary">Trang ch???</a></li>
                            <li><a href="/admin/admin.php" class="nav-link px-2 link-dark">T??i kho???n</a></li>
                            <li><a href="/admin/user-management.php" class="nav-link px-2 link-dark">Qu???n l?? ng?????i d??ng</a></li>
                            <li><a href="/user-menu.php?order=" class="nav-link px-2 link-dark">Qu???n l?? ????n h??ng</a></li>
                        </ul>
        
                        <div class="col-md-3 text-end">
                            <a class="btn btn-dark" href="/logout.php">
                                ????ng xu???t
                            </a>
                        </div>
                    </header>
                </div>
            </div>
        
            <div class="container">
                <h1>
                    $name
                </h1>
            </div>
        EOL;
}
?>

<?php
function addFooter() {
    echo <<<EOL
        <div class="container">
            <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="/food-menu.php" class="nav-link px-2 link-secondary">Trang ch???</a></li>
                    <li class="nav-item"><a href="/admin/admin.php" class="nav-link px-2 link-dark">T??i kho???n</a></li>
                    <li class="nav-item"><a href="/admin/user-management.php" class="nav-link px-2 link-dark">Qu???n l?? kh??ch h??ng</a></li>
                    <li class="nav-item"><a href="/user-menu.php?order=" class="nav-link px-2 link-dark">Qu???n l?? ????n h??ng</a></li>
                </ul>
                <p class="text-center text-muted">Copyright ?? Owned By Pizza's 5P in 2022 </p>
            </footer>
        </div>

        </body>

        </html>
    EOL;
}
?>





    