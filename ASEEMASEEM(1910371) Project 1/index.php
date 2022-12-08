<!--Head-->
<?php 
require_once("config.php"); // inlclude config file 
include(INCLUDE_DIR.'head.php'); ?>
<!--end of Head-->
<!--page-->
<div id="page" class="site">
<br />
<!-- Slider-->
<div class="img-css-2">
  <div class="fadeOut owl-carousel owl-theme">
    <div class="item position-relative">
      <div class="banner-text">
        <h2> FAST FOOD</h2>
        <div class="clear"></div>
        <a href="#" class="shop-now">Shop Now</a> </div>
      <img  src="images/banner-1.jpg"> </div>
    <div class="item position-relative">
      <div class="banner-text">
        <h2> SPECIAL  FOOD </h2>
        <div class="clear"></div>
        <a href="#" class="shop-now">Shop Now</a> </div>
      <img  src="images/banner-2.jpg"> </div>
    <div class="item position-relative">
      <div class="banner-text">
        <h2> TODAY  SPECIAL </h2>
        <div class="clear"></div>
        <a href="#" class="shop-now">Shop Now</a> </div>
      <img  src="images/banner-3.jpg"> </div>
  </div>
</div>
<!-- end of Slider-->
<div class="page-spec">
  <!--About section-->
  <div class="container">
    <div class="about-css about-text">
      <h2 class="top-heading">About Company</h2>
      <p>
      <h3 class="normal-font">"<i>If food ever be an offering to the gods, let it first nourish a child's body, heart, and soul.</i>"</h3>
      </p>
      <p> With this sentiment and a steadfast commitment to our legacy of exquisite taste and purity. Foodie brings you sweets and savouries which are pure enough to be offered as the traditional prasad and delightful enough to be enjoyed as special treats for special occasions. </p>
    </div>
    <div class="about-image">
      <div class="img-css"> <img src="images/home-img.jpg" alt="" title=""></div>
    </div>
  </div>
  <!--About end of section-->
  <!--Product section-->
  <div class="container page-spec">
    <table class="table">
      <tr>
        <td><div class="product-box"><a href="https://www.google.com/" target="_blank"><img src="images/product-1.jpg" width="375"></a>
            <p> Pizza <br>
              $220.00 <span class="line-through">$250.00</span></p>
          </div></td>
        <td><div class="product-box"><a href="https://www.google.com/" target="_blank"><img src="images/product-2.jpg" width="375"></a>
            <p>Burger<br>
              $120.00 <span class="line-through">$260.00</span></p>
          </div></td>
        <td><div class="product-box"><a href="https://www.google.com/" target="_blank"><img src="images/product-3.jpg" width="375"></a>
            <p>Chinese <br>
              $230.00 <span class="line-through">$240.00</span></p>
          </div></td>
        <td><div class="product-box"><a href="https://www.google.com/" target="_blank"><img src="images/product-4.jpg" width="375"></a>
            <p>Fried Rice<br>
              $200.00 <span class="line-through">$270.00</span></p>
          </div></td>
        <td><div class="product-box"><a href="https://www.google.com/" target="_blank"><img src="images/product-5.jpg" width="375"></a>
            <p> Biryani <br>
              $210.00 <span class="line-through">$220.00</span></p>
          </div></td>
      </tr>
    </table>
  </div>
  <!-- end of Product section-->
</div>
<!--page-->
<!--footer-->
<?php include(INCLUDE_DIR.'footer.php');?>
<!--end of footer-->
