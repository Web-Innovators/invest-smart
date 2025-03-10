 <!-- Start Footer Area -->
 <footer class="footer1">
     <div class="footer-area">
         <div class="container">
             <div class="row">
                 <div class="col-md-5 col-sm-5 col-xs-12">
                     <div class="footer-content logo-footer">
                         <div class="footer-head">
                             <div class="footer-logo">
                                 <a class="footer-black-logo" href="#"><img
                                         src="{{ url('user-assets/img/logo/logo.png') }}" alt=""></a>
                             </div>
                             <p>
                                 Are you looking for professional advice for your new business. Are you looking for
                                 professional advice for your new business. Are you looking for professional advice
                                 for your new business.
                             </p>
                             <div class="subs-feilds">
                                 <div class="suscribe-input">
                                     <input type="email" class="email form-control width-80" id="sus_email"
                                         placeholder="Type Email">
                                     <button type="submit" id="sus_submit" class="add-btn">Subscribe</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- end single footer -->
                 <div class="col-md-4 col-sm-3 col-xs-12">
                     <div class="footer-content">
                         <div class="footer-head">
                             <h4>Services Link</h4>
                             <ul class="footer-list">
                                 <li><a href="{{ route('about.get') }}">About us</a></li>
                                 <li><a href="{{ route('packages.get') }}">Packages </a></li>
                                 <li><a href="{{ route('contact.get') }}">Contact us </a></li>
                                 <li><a href="javascript:void(0);">Privacy</a></li>
                                 <li><a href="javascript:void(0);">Terms & Condition</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <!-- end single footer -->
                 <div class="col-md-3 col-sm-4 col-xs-12">
                     <div class="footer-content last-content">
                         <div class="footer-head">
                             <h4>Information</h4>
                             <div class="footer-contacts">
                                 <p><span>Tel :</span> +(000) 000-0000</p>
                                 <p><span>Email :</span> info@Invest Smart4.com</p>
                                 <p><span>Location :</span> House- 65/4, London</p>
                             </div>
                             <div class="footer-icons">
                                 <ul>
                                     <li>
                                         <a href="#">
                                             <i class="fa fa-facebook"></i>
                                         </a>
                                     </li>
                                     <li>
                                         <a href="#">
                                             <i class="fa fa-twitter"></i>
                                         </a>
                                     </li>
                                     <li>
                                         <a href="#">
                                             <i class="fa fa-google"></i>
                                         </a>
                                     </li>
                                     <li>
                                         <a href="#">
                                             <i class="fa fa-pinterest"></i>
                                         </a>
                                     </li>
                                     <li>
                                         <a href="#">
                                             <i class="fa fa-instagram"></i>
                                         </a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div>
         <h1>{{ __('welcome') }}</h1>
         <p>{{ __('about_us') }}</p>
         <a href="#">{{ __('contact') }}</a>
     </div>

     <div class="footer-area-bottom">
         <div class="container">
             <div class="row">
                 <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="copyright">
                         <p>
                             Copyright © 2020
                             <a href="#">Invest Smart</a> All Rights Reserved
                         </p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <!-- End Footer area -->

 <!-- all js here -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
     $(document).ready(function() {
         $(".buyPackage").click(function() {
             let packagePrice = $(this).data("price");
             let packageName = $(this).data("package");
             let packageId = $(this).data("id");

             $("#pkg_id").val(packageId);
             $("#pkg_shares").val(packageName);
             $("#pkg_amount").val(packagePrice);

             $("#buyPkg").modal("show");
         });

         $(".withDrawShare").click(function() {
             $("#withDrawReq").modal("show");
         });
     });
 </script>

 <!-- Pkg Modal -->
 <div class="modal fade" id="buyPkg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content"
             style="height: 400px; background: linear-gradient(45deg, black, #c51414e0); color: white;">
             <div class="modal-header">
                 <h5 class="modal-title" style="color: white" id="staticBackdropLabel">Payment Details</h5>
             </div>
             <div class="modal-body">
                 <form method="POST" action="{{ route('payment.pkg-post') }}" class="signupForm"
                     enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="pkg_id" id="pkg_id" class="form-control">
                     <div class="form-group mb-3">
                         <label for="pkg_shares">Package Shares</label>
                         <input type="text" name="pkg_shares" id="pkg_shares" class="form-control"
                             placeholder="Ppackage name..." required data-error="Please enter your package name"
                             readonly style="color: black;">
                     </div>
                     <div class="form-group mb-3">
                         <label for="pkg_amount">Amount</label>
                         <input type="number" name="pkg_amount" id="pkg_amount" class="form-control"
                             placeholder="Total amount..." required data-error="Please enter your paid_amount" readonly
                             style="color: black;">
                     </div>
                     <div class="form-group mb-3">
                         <label for="payment_ss">Payment SS <span style="color: yellow;">*</span></label>
                         <input type="file" name="payment_ss" id="payment_ss" class="form-control"
                             placeholder="Paid Screenshot" required data-error="Please enter your payment.."
                             style="color: black;">
                     </div>
                     <hr>
                     <div class="col-md-12 col-sm-12 col-xs-12">
                         <button type="submit" id="submit" class="login-btn">Submit</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>

 <!-- Pkg Modal -->
 <div class="modal fade" id="withDrawReq" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content"
             style="height: 260px; background: linear-gradient(45deg, black, #3e3b3be0); color: white;">
             <div class="modal-header">
                 <h5 class="modal-title" style="color: white" id="staticBackdropLabel">Withdraw Shares</h5>
             </div>
             <div class="modal-body">
                 <form method="POST" action="{{ route('share.withdraw.request') }}" class="signupForm"
                     enctype="multipart/form-data">
                     @csrf
                     <div class="form-group mb-3">
                         <label for="share_withdrawl_requested">Shares</label>
                         <input type="text" name="share_withdrawl_requested" id="share_withdrawl_requested"
                             class="form-control" placeholder="Withdraw shares..." required
                             data-error="Please enter your shares" style="color: black;">
                     </div>
                     <hr>
                     <div class="col-md-12 col-sm-12 col-xs-12">
                         <button type="submit" id="submit" class="login-btn">Submit</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>



 <!-- jquery latest version -->
 <script src="{{ url('user-assets') }}/js/vendor/jquery-1.12.4.min.js"></script>
 <!-- bootstrap js -->
 <script src="{{ url('user-assets') }}/js/bootstrap.min.js"></script>
 <!-- owl.carousel js -->
 <script src="{{ url('user-assets') }}/js/owl.carousel.min.js"></script>
 <!-- stellar js -->
 <script src="{{ url('user-assets') }}/js/jquery.stellar.min.js"></script>
 <!-- magnific js -->
 <script src="{{ url('user-assets') }}/js/magnific.min.js"></script>
 <!-- wow js -->
 <script src="{{ url('user-assets') }}/js/wow.min.js"></script>
 <!-- meanmenu js -->
 <script src="{{ url('user-assets') }}/js/jquery.meanmenu.js"></script>
 <!-- Form validator js -->
 <script src="{{ url('user-assets') }}/js/form-validator.min.js"></script>
 <!-- plugins js -->
 <script src="{{ url('user-assets') }}/js/plugins.js"></script>
 <!-- main js -->
 <script src="{{ url('user-assets') }}/js/main.js"></script>




 <script>
     // Gallery image hover
     $(".img-wrapper").hover(
         function() {
             $(this).find(".img-overlay").animate({
                 opacity: 1
             }, 600);
         },
         function() {
             $(this).find(".img-overlay").animate({
                 opacity: 0
             }, 600);
         }
     );

     // Lightbox
     var $overlay = $('<div id="overlay"></div>');
     var $image = $("<img>");
     var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left"></i></div>');
     var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right"></i></div>');
     var $exitButton = $('<div id="exitButton"><i class="fa fa-times"></i></div>');

     // Add overlay
     $overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
     $("#gallery").append($overlay);

     // Hide overlay on default
     $overlay.hide();

     // When an image is clicked
     $(".img-overlay").click(function(event) {
         // Prevents default behavior
         event.preventDefault();
         // Adds href attribute to variable
         var imageLocation = $(this).prev().attr("href");
         // Add the image src to $image
         $image.attr("src", imageLocation);
         // Fade in the overlay
         $overlay.fadeIn("slow");
     });

     // When the overlay is clicked
     $overlay.click(function() {
         // Fade out the overlay
         $(this).fadeOut("slow");
     });

     // When next button is clicked
     $nextButton.click(function(event) {
         // Hide the current image
         $("#overlay img").hide();
         // Overlay image location
         var $currentImgSrc = $("#overlay img").attr("src");
         // Image with matching location of the overlay image
         var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
         // Finds the next image
         var $nextImg = $($currentImg.closest(".image").next().find("img"));
         // All of the images in the gallery
         var $images = $("#image-gallery img");
         // If there is a next image
         if ($nextImg.length > 0) {
             // Fade in the next image
             $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
         } else {
             // Otherwise fade in the first image
             $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);
         }
         // Prevents overlay from being hidden
         event.stopPropagation();
     });

     // When previous button is clicked
     $prevButton.click(function(event) {
         // Hide the current image
         $("#overlay img").hide();
         // Overlay image location
         var $currentImgSrc = $("#overlay img").attr("src");
         // Image with matching location of the overlay image
         var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
         // Finds the next image
         var $nextImg = $($currentImg.closest(".image").prev().find("img"));
         // Fade in the next image
         $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
         // Prevents overlay from being hidden
         event.stopPropagation();
     });

     // When the exit button is clicked
     $exitButton.click(function() {
         // Fade out the overlay
         $("#overlay").fadeOut("slow");
     });
 </script>






 </body>

 <!-- Mirrored from rockstheme.com/rocks/Invest Smart-live/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Mar 2020 08:27:42 GMT -->

 </html>
