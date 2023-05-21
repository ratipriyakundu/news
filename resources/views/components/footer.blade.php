<a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="#">Jagran News</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="backend/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="backend/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="backend/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="backend/js/demo.js"></script>




<script src="backend/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="backend/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->

<!-- Bootstrap4 Duallistbox -->
<script src="backend/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src=".backend/moment/moment.min.js"></script>
<script src="backend/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="backend/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src=".backend/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="backend/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- BS-Stepper -->
<script src="backend/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="backend/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="backend/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="backend/js/demo.js"></script>
</body>
</html>
<!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>-->
  <script src="https://cdn.tiny.cloud/1/3mjm4flk7i1iqimq728qbqvddiy9k62c4czbkiewl3gvabkv/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
   tinymce.init({
     selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
     plugins: [
      'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
      'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
      'media', 'table', 'emoticons', 'template', 'help'
    ],
    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
      'forecolor backcolor emoticons | help',
    menu: {
      favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
    },
    menubar: 'favs file edit view insert format tools table help',
    content_css: 'css/content.css'
   });
</script>
<script>
  $('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})
</script>