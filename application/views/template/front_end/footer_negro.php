
<!--Footer-->
<footer id="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="span5 cp">
                &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
            </div>
            <!--/Copyright-->

            <div class="span6">
                <ul class="social pull-right">
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-google-plus"></i></a></li>
                    <li><a href="#"><i class="icon-youtube"></i></a></li>
                    <li><a href="#"><i class="icon-tumblr"></i></a></li>
                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    <li><a href="#"><i class="icon-rss"></i></a></li>
                    <li><a href="#"><i class="icon-github-alt"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>
                </ul>
            </div>

            <div class="span1">
                <a id="gototop" class="gototop pull-right" href="#"><i class="icon-angle-up"></i></a>
            </div>
            <!--/Goto Top-->
        </div>
    </div>
</footer>
<!--/Footer-->

<?php
$this->load->view('template/front_end/login');
?>

<script src="<?= base_url();?>assets/js/vendor/jquery-1.9.1.min.js"></script>-->
<script src="<?= base_url();?>assets/js/vendor/bootstrap.min.js"></script>
<script src="<?= base_url();?>assets/js/main.js"></script>
<!-- Required javascript files for Slider -->
<script src="<?= base_url();?>assets/js/jquery.ba-cond.min.js"></script>
<script src="<?= base_url();?>assets/js/jquery.slitslider.js"></script>
<!-- /Required javascript files for Slider -->
<?=$this->load->view('template/back_end/slider');?>

<!-- /SL Slider -->





</body>
</html>