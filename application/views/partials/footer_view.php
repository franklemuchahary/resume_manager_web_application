 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

 <!-- Main Footer -->
 <footer class="main-footer">
        <!-- To the right --
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="http://tnp.dtu.ac.in/">T&P Delhi Technological University</a></strong> 
      </footer>

      

      <!-- REQUIRED JS SCRIPTS -->

      <!-- jQuery 2.1.4 -->
      <script src="<?php echo base_url();?>js/jQuery-2.1.4.min.js"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

      <script>
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();   
        });
      </script>

     
      <!-- ajax script for search jobs-->
      <script src="<?php echo base_url();?>js/ajax_search/ajaxsearch_student_jobs.js"></script>


      <!-- FastClick starts-->
      <script src="<?php echo base_url();?>js/fastclick.min.js"></script>
       <script>
        var AdminLTEOptions = {
         //Enable Fast Click. Fastclick.js creates a more
          //native touch experience with touch devices. 
          enableFastclick: true,
        };      
      </script>
      <!-- fastclick script ends-->

     
      <!-- App -->
      <script src="<?php echo base_url();?>js/app.js"></script>

     
      <!-- Magnific Popup starts-->
      <?php if($this->uri->segment(2)==""||$this->uri->segment(2)=="index"): ?>
      <script src="<?php echo base_url('css/magnific/jquery.magnific-popup.min.js'); ?>"></script>
      <script type="text/javascript">
        $(document).ready(function() {

          $('.image-popup-vertical-fit').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
              verticalFit: true
            }
            
          });

        });

      </script>
      <?php endif; ?>
      <!-- Magnific popup ends-->


      <!-- Countdown timer script starts-->
      <?php if($this->uri->segment(2)=="recruiter_profile"): ?>

      <script type="text/javascript" src="<?php echo base_url('js/countdownjs/jquery.countdown.min.js')?>"></script>
      <!-- To make the countdown timer work with the application deadline-->
      <?php 
      if(isset($specific_recruiter) && !empty($specific_recruiter)):
        foreach($specific_recruiter as $row): 
      ?>
      <script type="text/javascript">
        $("#countdown-timer")
        .countdown("<?php echo date("Y/m/d H:i",strtotime($row["application_deadline"]));?>", function(event) {
          $(this).text(
            event.strftime('Application Deadline: %D Days %H:%M:%S Hours')
            );
        });
      </script>
      <?php endforeach; endif; endif;?>

      <!-- countdown timer script ends-->

    </body>
    </html>
