
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="logo-footer">
                            <a href="index.html">
                                <img src="{{asset('images/logo.png')}}" />
                            </a>
                        </div>
                        <p class="footer-txt">Code School teaches web technologies in the comfort of your browser with video lessons, coding challenges, and screencasts. We strive to help you learn by doing.
                            <a href="#">Learn More</a>
                        </p>
                        <ul class="footer-social">
                            <li><a href="#"><img src="{{asset('images/f.png')}}"></a></li>
                            <li><a href="#"><img src="{{asset('images/t.png')}}"></a></li>
                            <li><a href="#"><img src="{{asset('images/g.png')}}"></a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="footer-links">
                            <li><a href="#">Courses</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Pricing</a></li>
                            <li><a href="#">Business</a></li>
                        </ul>
                        <ul class="footer-links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                        <ul class="footer-links">
                            <!-- <li><a href="#">Need Help?</a></li> -->
                            <li><a href="#">Contact Us</a></li><!-- 
                            <li><a href="#">Knowledge Base</a></li> -->
                            <li><a href="#">Register</a></li>
                            <li><a href="#">Login</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bot">
            <p>© 2018 My School All Rights Reserved.</p>
        </div>
    </footer>
    
<script type="text/javascript" src="{{asset('js/easyResponsiveTabs.js')}}"></script>
<script>
  $(document).ready(function(){
      $("#aboutTab").easyResponsiveTabs({
          type: 'vertical',         
          width: 'auto',
          fit: true,  
          closed: false,
          tabidentify: 'about-tab'
         
      });
     }); 
</script>

<script>
        $(document).ready(function() {
            $('#lightSlider').lightSlider({
                item: 2,
                loop: true,
            });
        });

    </script>
    
  <script src="{{asset('js/parsley.min.js')}}"></script>