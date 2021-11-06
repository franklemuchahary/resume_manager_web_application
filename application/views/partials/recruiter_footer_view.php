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
      <script src="<?php echo base_url();?>js/recruiter/jQuery-2.1.4.min.js"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="<?php echo base_url();?>js/recruiter/bootstrap.min.js"></script>
      
      
      <!-- FastClick -->
      <script src="<?php echo base_url();?>js/recruiter/fastclick.min.js"></script>
      <script>
        var AdminLTEOptions = {
         //Enable Fast Click. Fastclick.js creates a more
          //native touch experience with touch devices. 
          enableFastclick: true,
        };      
      </script>
      <!-- Fast click script ends-->


      <!-- Summernote script starts-->
      <?php if($this->uri->segment(2)==""||$this->uri->segment(2)=="index"): ?>
      <script src="<?php echo base_url();?>js/recruiter/summernote.js"></script>
      <script>
        $(document).ready(function() {
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
      <?php endif; ?>
      <!-- summernote script ends -->

      <!-- Select2 script starts-->
      <script src="<?php echo base_url();?>js/recruiter/select2.full.min.js"></script>
      
      <script>
        $(function () {
          //Initialize Select2 Elements
          $(".select2").select2();       
        });
      </script>
      <!-- select2 script ends-->

      <!-- App -->
      <script src="<?php echo base_url();?>js/recruiter/app.js"></script>

      <!-- Date time picker script starts-->
      <?php if($this->uri->segment(2)=="company_info_view"||$this->uri->segment(2)=="update_company_info"): ?>
      <script type="text/javascript" src="<?php echo base_url("js/datepicker/jquery.simple-dtpicker.js")?>"></script>
      
      <script type="text/javascript">
        $('#date_foo').appendDtpicker({
        });
      </script>
      <?php endif;?>
      <!-- date time picker script ends -->


  </body>
  </html>
