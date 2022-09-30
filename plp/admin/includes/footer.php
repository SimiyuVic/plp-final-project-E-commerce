<footer class="footer pt-5">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-12">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">Services</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">About</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </main>


    <script src="assets/js/jquery-3.6.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script src="assets/js/smooth-scrollbar.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="assets/js/custom.js"></script>

    

    <!---Alertify js--->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script >

      <?php
            if(isset($_SESSION['message']))
        { 
      ?>
            alertify.set('notifier','position', 'top-right');
            alertify.success('<?= $_SESSION['message']; ?>');
      <?php 
         unset($_SESSION['message']);
       }
     ?>
    </script>
  </body>

</html>
