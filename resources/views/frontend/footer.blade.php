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
                           <li><a href="{{ url(FRONTENDURL.'profile/pageview') }}">Profile</a></li>
                           <li><a href="{{ url(FRONTENDURL.'whoweare/pageview') }}">Who We Are</a></li>
                           <li><a href="{{ url(FRONTENDURL.'visionmission/pageview') }}">Vision & Mission</a></li>
                           <li><a href="{{ url(FRONTENDURL.'directormessage/pageview') }}">Director Message</a></li>
                           <li><a href="{{ url(FRONTENDURL.'whyus/pageview') }}">Why Us</a></li>
                           <li><a href="{{ url(FRONTENDURL.'ourclients') }}">Our Clients</a></li>
                           <li><a href="{{ url(FRONTENDURL.'downloads') }}">Downloads</a></li>
                       </ul>
                   </div>
               </div>

               <div class="col-lg-3 col-md-4">
                   <div class="single-footer">
                       <h3 class="title">INSTALLATION</h3>

                       <ul>
                           <li><a href="{{ url(FRONTENDURL.'installation/products/wallcladding') }}">Wall Cladding</a></li>
                           <li><a href="{{ url(FRONTENDURL.'installation/products/floorcladding')}}">Floor Cladding</a></li>
                           <li><a href="{{ url(FRONTENDURL.'installation/products/constructionbyspecification')}}">Construction By Specification</a></li>

                       </ul>
                   </div>
               </div>

               <div class="col-lg-3 col-md-4">
                   <div class="single-footer">
                       <h3 class="title">PROJECTS</h3>

                       <ul>

                           <li><a href="{{ url(FRONTENDURL.'design/pageview') }}">Design</a></li>
                           <li><a href="{{ url(FRONTENDURL.'develop/pageview') }}">Develop</a></li>
                           <li><a href="{{ url(FRONTENDURL.'deliver/pageview') }}">Deliver</a></li>
                           <li><a href="{{ url(FRONTENDURL.'maintain/pageview') }}">Maintain</a></li>
                       </ul>
                   </div>
               </div>

               <div class="col-lg-3 col-md-4">
                   <div class="single-footer">
                       <h3 class="title">PRODUCTS</h3>
                       <ul>
                           <li><a href="{{url(FRONTENDURL.'bioclad/products/antimicrobialwallcladding')}}">Antimicrobial Wall Cladding</a></li>
                           <li><a href="{{url(FRONTENDURL.'bioclad/products/wallprotection')}}">Wall Protection</a></li>
                           <li><a href="{{url(FRONTENDURL.'bioclad/products/safetyflooring')}}">Safety Flooring</a></li>
                           <li><a href="{{url(FRONTENDURL.'bioclad/products/doorsets')}}">Doorsets</a></li>
                           <li><a href="{{url(FRONTENDURL.'bioclad/products/hygenicwallcladding')}}">Hygienic Wall Cladding</a></li>
                           <li><a href="{{url(FRONTENDURL.'bioclad/products/ips')}}">IPS</a></li>
                           <li><a href="{{url(FRONTENDURL.'printclad/products/photoclad')}}">PhotoClad</a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>

       <div class="copyright-area">
           <div class="container">
               <div class="row">
                   <div class="col-lg-8 col-md-8">
                       <p>{{date('Y')}} Copyrights &copy; All Rights Reserved Gohealthe &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-
                           <a href="{{url(FRONTENDURL.'privacypolicy/pageview')}}">Privacy Policy</a> - <a href="{{url(FRONTENDURL.'termsconditions/pageview')}}">Terms & Conditions</a> - <a href="{{ url(FRONTENDURL.'faq/pageview') }}">FAQ</a> - <a href="#">Sitemap</a>
                       </p>
                   </div>
               </div>
           </div>
       </div>

       <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-791fea70-559f-4912-8fa1-48546bbf15e3"></div>
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

           jQuery('#responsive').change(function() {
               $('#responsive_wrapper').width(jQuery(this).val());
               $(window).trigger('resize');
           });

       });
   </script>