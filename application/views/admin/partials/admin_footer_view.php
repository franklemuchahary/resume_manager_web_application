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
      <script src="<?php echo base_url();?>js/admin/jQuery-2.1.4.min.js"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="<?php echo base_url();?>js/admin/bootstrap.min.js"></script>

      <script src="<?php echo base_url();?>js/select2.full.min.js"></script>

      <script>
        $(function () {
          //Initialize Select2 Elements
          $(".select2").select2();       
        });
      </script>

      
      
      <!-- SUMMERNOTE SCRIPT STARTS HERE-->
      <?php if($this->uri->segment(3)=="admin_add_notif"):?>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.7.1/summernote.js"></script>
      
      <script>
        $(document).ready(function(){
          $('#summernote').summernote({
            toolbar: [
              // [groupName, [list of button]]
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['fontsize', ['fontsize ']],
              ['fontname', ['fontname']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['fullscreen', ['fullscreen']],
              ['picture', ['picture']],
              ['link', ['link']]
            ],
            maximumImageFileSize: 1048576,
            height: 300,                 
            minHeight: null,             
            maxHeight: null,             
            focus: true,
            placeholder: 'Write here...',
            hint: {
              words: ['engineer', 'mechanical' , 'post' ,'electrical' , 'Kumar' , 'psct' ,'student' , 'Gupta' , 'app' ,'recruiter' , 'Singh' , 'selection' , 'test' , 'follow' ,'time' , 'tomorrow' , 'report' , 'please' ,'Yadav' , 'biotechnology' , 'deadline' , 'create' , 'interview' ,'interest' , 'pm'],
              match: /\b(\w{1,})$/,
              search: function (keyword, callback) {
                callback($.grep(this.words, function (item) {
                  return item.indexOf(keyword) === 0;
                }));
              }
            }

          });
        });
      </script>
      <?php endif;?>
      <!-- SUMMERNOTE SCRIPT ENDS HERE-->
      
      <!-- App JS-->
      <script src="<?php echo base_url();?>js/admin/app.js"></script>

      
      <!-- MAGNIFIC POPUP SCRIPT STARTS HERE-->
      <?php if($this->uri->segment(3)==""||$this->uri->segment(3)=="index"):?>
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
      <?php endif;?>
      <!-- MAGNIFIC POPUP SCRIPT ENDS HERE -->


      <!-- ADMIN MAIN AJAX SCRIPTS -->
      <?php if($this->uri->segment(3)=="admin_search_recruiter" || $this->uri->segment(3)=="admin_search_students" || $this->uri->segment(3)=="admin_get_all_applications"): ?>
      <script src="<?php echo base_url();?>js/ajax_search/admin_ajax/all_admin_ajax_functions.js"></script>
      <?php endif;?>
      <!-- ADMIN MAIN AJAX SCRIPTS END HERE-->


    </body>
    </html>
