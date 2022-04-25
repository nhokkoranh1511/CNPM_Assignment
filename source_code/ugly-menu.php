<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");
    $item_per_page = 5;
    
?>


<form method="get">
    <button name="category" type="submit" value = "all">all</button>   
    <button name="category" type="submit" value = "P">pizza</button>   
    <button name="category" type="submit" value = "S">nước</button>  
    <button name="P" type="submit" value = "D">kèm</button>  
</form>
<br>

<?php
    $foodlist;
    $page_ind; // đại loại là bằng 1 cách nào đó xác định được 
                // category (ví dụ ở dưới là t làm đại cái button có gán giá trị category)
                // để dùng get_food_list($category,$sortfield,$tăngdầnhayko), trả về array.


                // tương tự bằng 1 cách nào đó xác định được page_index, sau đó dùng
                //  paginatedArray($foodlist,$page_ind,$item_per_page) để lấy dc danh sách food để hiển thị cho trang
    if (isset($_GET['category'])) {
        if ($_GET['category']="all") {
            $foodlist = $foodHandler -> get_food_list ("all","price",true);
            // lấy food list là tất cả food, sắp xếp theo price và tăng dần = true.
        }
    }

    if (isset($_GET['category'])) {
        if ($_GET['category']="P") {
            $foodlist = $foodHandler -> get_food_list (0,"price",true);
            // lấy food có catagory_id = 0 , sắp xếp theo price và tăng dần = true.
        }

    } else {
        $foodlist = $foodHandler -> get_food_list (0,"price",true); // default link
    }

    if (isset($_GET['page'])) {
        $page_ind = $_GET['page'];
    } else {
        $page_ind = 0;
    }

    $paginatedFoodList = paginatedArray($foodlist,$page_ind,$item_per_page);

    foreach ($paginatedFoodList as $food) {
        echo "Tên món: ".$food['title'];
        echo "-----Giá: ".$food['price'];
        echo "<br>";
    }
    echo "<form>";
    $numberOfPage = number_of_page($foodlist,$item_per_page);
    for ($i = 0;$i< $numberOfPage;$i++) {
        echo "<button name=\"page\" type=\"submit\" value = \"$i\">$i</button>"; 
    }
    echo "</form>";
?>
 