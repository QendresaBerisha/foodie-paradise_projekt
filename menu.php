
<?php include('partials/header.php'); ?>
 

 <body>    
         <div class="Menu">
             <img  class="foto" src="image/food1.jpg"min-width=100%>
             <div class="cc-flex-container">
                 <br><br><p class="cc-flex-item">Foodie Paradise ofron ushqim cilësor me meny<br> 
                     të përgatitur nga mjeshtrit e kuzhinës e skarës<br> 
                     për të kënaqur shijen dhe plotësuar dëshirat e myshterinjve;<br>
                     ambient modern e relaksues për të respektuar secilin person;<br> 
                     si dhe shërbim të nivelit superior për ta befasuar secilën herë atë.<br></p>
             </div>
 
         </div>
         </div>
     </header>
     <div class="section-one">
         <h1 class="h1-m">Menuja e ditës</h1>
     </div>
     <div class="slideshow-bg">
         <!-- Slideshow container -->
         <div class="slideshow-con">
 
             <!-- Full-width images with number and caption text -->
             <div class="mySlides fade">
                 <div class="numbertext">1/3</div>
                 <img src="image/sallata.jpg" style="width:100%">
                 <div class="text">Sallata:               
                 <br> TRE LLOJE SALLATASH</div>
             </div>
             <div class="mySlides fade">
                 <div class="numbertext">2/3</div>
                 <img src="image/friedchicken.jpg" style="width:100%">
                 <div class="text">Pjata Kryesore: 
                     <br>PULË FSHATI</div>
             </div>
 
             <div class="mySlides fade">
                 <div class="numbertext">3/3</div>
                 <img src="image/tortemeqokollate.jpg" style="width:100%">
                 <div class="text">Deserti:
                 <br>ËMBËLSIRË ME ÇOKOLLATË</div>
             </div>
             <!-- Next and previous buttons -->
             <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
             <a class="next" onclick="plusSlides(1)">&#10095;</a>
         </div>
         <br>
 
         <!-- The dots/circles -->
         <div style="text-align:center">
             <span class="dot" onclick="currentSlide(1)"></span>
             <span class="dot" onclick="currentSlide(2)"></span>
             <span class="dot" onclick="currentSlide(3)"></span>
         </div>
     </div>
         
     <main>
 
     <section class="food-menu">
         <div class="container1">
             <h1 class="h1-menu">Menuja Kryesore</h2>
 
             <?php 
             $sql2 = "SELECT * FROM ushqimi WHERE  featured='Po' ";
 
             $res2 = mysqli_query($conn, $sql2);
 
             $count2 = mysqli_num_rows($res2);
 
             if($count2>0)
             {
                 while($row=mysqli_fetch_assoc($res2))
                 {
                     //Get all the values
                     $id = $row['id'];
                     $titulli = $row['titulli'];
                     $cmimi = $row['cmimi'];
                     $pershkrimi = $row['pershkrimi'];
                     $image_name = $row['image_name'];
                     ?>
 
                     <div class="food-menu-box">
                         <div class="food-menu-img">
                             <?php 
                                 //Check whether image available or not
                                 if($image_name=="")
                                 {
                                     //Image not Available
                                     echo "<div class='error'>Fotografia nuk eshte ne dispozicion!</div>";
                                 }
                                 else
                                 {
                                     //Image Available
                                     ?>
                                     <img src="<?php echo SITEURL; ?>image/food/<?php echo $image_name; ?>"width="200px" height="200px" alt="Image not available" class="img-responsive img-curve">
                                     <?php
                                 }
                             ?>
                             
                         </div>
                       <
                         <div class="food-menu-desc">
                             <h4><?php echo $titulli; ?></h4>
                             <p class="food-price"><?php echo $cmimi; ?>€</p>
                             <p class="food-detail">
                                 <?php echo $pershkrimi; ?>
                             </p>
                             <br>
 
                             <a href="<?php echo SITEURL; ?>order.php?ushqimi_id=<?php echo $id; ?>" class="btn btn-primary">Porosit tani</a>
                         </div>
                         
                     </div>
 
                     <?php
                 }
             }
             else
             {
                 //Food Not Available 
                 echo "<div class='error'>Ushqimi nuk eshte i disponueshem!</div>";
             }
             
             ?>
             <div class="clearfix"></div>
 
             
 
         </div>
         
         </main>
         </section>
         <script>
     var slideIndex = 1;
     showSlides(slideIndex);
 
     // Next/previous controls
     function plusSlides(n) {
         showSlides(slideIndex += n);
     }
 
     // Thumbnail image controls
     function currentSlide(n) {
         showSlides(slideIndex = n);
     }
 
     function showSlides(n) {
         var i;
         var slides = document.getElementsByClassName("mySlides");
         var dots = document.getElementsByClassName("dot");
         if (n > slides.length) { slideIndex = 1 }
         if (n < 1) { slideIndex = slides.length }
         for (i = 0; i < slides.length; i++) {
             slides[i].style.display = "none";
         }
         for (i = 0; i < dots.length; i++) {
             dots[i].className = dots[i].className.replace(" active", "");
         }
         slides[slideIndex - 1].style.display = "block";
         dots[slideIndex - 1].className += " active";
     }
 </script>
 
     
     </body>
     
 </html>
 <br><br>
 <?php include('partials/footer.php'); ?> 