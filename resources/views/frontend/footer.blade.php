   <!-- Start Footer Area -->
   <footer class="footer-area bg" style="background-color:#f6f6f6;">
       <div class="container">
           <div class="row">

               <div class="col-lg-12 col-md-12">
                   <div class="border"></div>
               </div>

               <div class="col-lg-3 col-md-4">
                   <div class="single-footer">
                       <h3 class="title">ABOUT US</h3>
                       <ul>
                           <li><a href="profile.html">Profile</a></li>
                           <li><a href="whoweare.html">Who We Are</a></li>
                           <li><a href="visionandmission.html">Vision & Mission</a></li>
                           <li><a href="directormessage.html">Director Message</a></li>
                           <li><a href="whyus.html">Why Us</a></li>
                           <li><a href="ourclients.html">Our Clients</a></li>
                           <li><a href="downloads.html">Downloads</a></li>
                       </ul>
                   </div>
               </div>

               <div class="col-lg-3 col-md-4">
                   <div class="single-footer">
                       <h3 class="title">INSTALLATION</h3>

                       <ul>
                           <li><a href="wallcladding.html">Wall Cladding</a></li>
                           <li><a href="floorcladding.html">Floor Cladding</a></li>
                           <li><a href="constructionbyspecification.html">Construction By Specification</a></li>
                       </ul>
                   </div>
               </div>

               <div class="col-lg-3 col-md-4">
                   <div class="single-footer">
                       <h3 class="title">PROJECTS</h3>

                       <ul>

                           <li><a href="design.html">Design</a></li>
                           <li><a href="develop.html">Develop</a></li>
                           <li><a href="deliver.html">Deliver</a></li>
                           <li><a href="maintain.html">Maintain</a></li>
                       </ul>
                   </div>
               </div>

               <div class="col-lg-3 col-md-4">
                   <div class="single-footer">
                       <h3 class="title">PRODUCTS</h3>
                       <ul>
                           <li><a href="#">Antimicrobial Wall Cladding</a></li>
                           <li><a href="#">Wall Protection</a></li>
                           <li><a href="#">Safety Flooring</a></li>
                           <li><a href="#">Doorsets</a></li>
                           <li><a href="#">Hygienic Wall Cladding</a></li>
                           <li><a href="#">IPS</a></li>
                           <li><a href="#">PhotoClad</a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>

       <div class="copyright-area">
           <div class="container">
               <div class="row">
                   <div class="col-lg-8 col-md-8">
                       <p>{{date('Y')}} Copyrights &copy; All Rights Reserved Gohealthe &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- <a href="#">Privacy Policy</a> - <a href="#">Terms & Conditions</a> - <a href="#">FAQ</a> - <a href="#">Sitemap</a></p>
                   </div>
               </div>
           </div>
       </div>
   </footer>
   <!-- End Footer Area -->

   <div class="go-top"><i class="fa fa-angle-up"></i></div>

   <!-- jQuery Min JS -->
   <script src="{{ URL::asset('frontend/assets/js/jquery-min.js') }}"></script>
   <!-- Prpper JS -->
   <script src="{{ URL::asset('frontend/assets/js/popper.min.js') }}"></script>
   <!-- Bootstrap Min JS -->
   <script src="{{ URL::asset('frontend/assets/js/bootstrap.min.js') }}"></script>
   <!-- Owl Carousel Min Js -->
   <script src="{{ URL::asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
   <!-- WOW Min Js -->
   <script src="{{ URL::asset('frontend/assets/js/wow.min.js') }}"></script>
   <!-- Waypoints Min Js -->
   <script src="{{ URL::asset('frontend/assets/js/waypoints.min.js') }}"></script>
   <!-- Counterup Min Js -->
   <script src="{{ URL::asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
   <!-- Jquery Magnific Popup Min Js -->
   <script src="{{ URL::asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
   <!-- Jquery Mixitup Min Js -->
   <script src="{{ URL::asset('frontend/assets/js/jquery.mixitup.min.js') }}"></script>
   <!-- Classy Nav Min Js -->
   <script src="{{ URL::asset('frontend/assets/js/classy-nav.min.js') }}"></script>
   <!-- Main JS -->
   <script src="{{ URL::asset('frontend/assets/js/main.js') }}"></script>


   <script src="{{ URL::asset('frontend/assets/js/skdslider.min.js') }}"></script>
   <link href="{{ URL::asset('frontend/assets/css/skdslider.css') }}" rel="stylesheet">
   <script type="text/javascript">
       jQuery(document).ready(function() {
           jQuery('#demo1').skdslider({
               delay: 5000,
               animationSpeed: 2000,
               showNextPrev: true,
               showPlayButton: true,
               autoSlide: true,
               animationType: 'fading'
           });
           jQuery('#demo2').skdslider({
               delay: 5000,
               animationSpeed: 1000,
               showNextPrev: true,
               showPlayButton: false,
               autoSlide: true,
               animationType: 'sliding'
           });
           jQuery('#demo3').skdslider({
               delay: 5000,
               animationSpeed: 2000,
               showNextPrev: true,
               showPlayButton: true,
               autoSlide: true,
               animationType: 'fading'
           });

           jQuery('#responsive').change(function() {
               $('#responsive_wrapper').width(jQuery(this).val());
               $(window).trigger('resize');
           });

       });
   </script>