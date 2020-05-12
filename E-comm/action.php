<?php
include "dp.php";
if(isset($_POST["category"])) {
    $category_query = "SELECT * FROM categories";
    $run_query = mysqli_query($con,$category_query);
    echo "
        <div class='nav nav-pills nav-stacked'>
            <li class='active'><a href='#'><h4>Category</h4></a></li>
";
    if(mysqli_num_rows($run_query) > 0) {
        while($row = mysqli_fetch_array($run_query)) {
        $cid = $row["cat_id"];
        $cat_name = $row["cat_title"];
        echo  "
                  <li><a href='#'>$cat_name</a></li>  

        ";
      }
      echo "</div>";
   }
}
if(isset($_POST["brand"])) {
    $brand_query = "SELECT * FROM brands";
    $run_query = mysqli_query($con,$brand_query);
    echo "
        <div class='nav nav-pills nav-stacked'>
            <li class='active'><a href='#'><h4>Brands</h4></a></li>
    ";
    if (mysqli_num_rows($run_query) > 0) {
        while($row = mysqli_fetch_array($run_query)) {
        $bid = $row["brand_id"];
        $brand_name = $row["brand_title"];
        echo "
                <li><a href='#'>$brand_name</a></li>  
        ";
      }
      echo "</div>";
   }
}
 if (isset($_POST["getproduct"])) {
   $product_query = "SELECT * FROM Products ORDER BY RAND () LIMIT 0,8";
   $run_query = mysqli_query($con,$product_query);
   if(mysqli_num_rows($run_query) > 0) {
      while($row = mysqli_fetch_array($run_query)) {
          $pro_id     =$row['product_id'];
          $pro_cat    =$row['product_cat'];
          $pro_brand  =$row['product_brand'];
          $pro_title  =$row['product_title'];
          $pro_price  =$row['product_price'];
          $pro_image  =$row['product_image'];
          echo "
          <div class='col-md-4'>
            <div class='panel panel-info'>
              <div class='panel-heading'>$pro_title</div>
                <div class='panel-body'> 
                    <img src='Products/Apple Phone/$pro_image'style = 'style=width: 160px; height:200px;'/>
                    </div>
                     <div class='panel-heading'>$.$pro_price.00
                        <button pid='$pro_id' style='float:right;' class='btn btn-danger btn-xs'>AddToCart</button>
                      </div> 
                     </div>
                  </div>
         ";
      }
   }
}

if(isset ($_POST["get_seleted_Category"])){
  $cid = $_POST["cat_id"];
  $sql = "SELECT * FROM products WHERE product_cat = '$cid'"; 
  $run_query = mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($run_query)){
    $pro_id     =$row['product_id'];
    $pro_cat    =$row['product_cat'];
    $pro_brand  =$row['product_brand'];
    $pro_title  =$row['product_title'];
    $pro_price  =$row['product_price'];
    $pro_image  =$row['product_image'];
      echo "        
       <div class='col-md-4'>
          <div class='panel panel-info'>    
            <div class='panel-heading'>$pro_title</div>
              <div class='panel-body'> 
                <img src='Products/Apple Phone/$pro_image' style='style=width: 160px; height:200px;'/>
              </div>
              <div class='panel-heading'>$.$pro_price.00
                <button pid='$pro_id' style='float:right;' class='btn btn-danger btn-xs'>AddToCart</button>
            </div> 
          </div>
        </div>
         ";
      }
}
?> 