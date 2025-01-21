<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Login Office</title>
    <link rel="icon" href="<?php echo base_url()?>assets/Image/rg title.png" type="image/gif" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/mdb.min.css" />
  </head>
  <body>

    <!-- Start your project here-->
    <div style="background-image:url('<?php echo base_url()?>assets/Image/61769.jpg')">
      
      <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-4">
              <div class="card text-white" style="border-radius: 1rem; background-color: #343a40; color: #ff6219;">
                <div class="card-body p-5 text-center" style="color: #ff6219;">
                  <?php echo form_open('C_Login/newlogin'); ?>
                  <form>

                  <div class="mb-md-5 mt-md-4 pb-5">
                    <?php if ($this->session->flashdata('message')): ?>
                        <p><?php echo $this->session->flashdata('message'); ?></p>
                    <?php endif; ?>

                    <h2 class="fw-bold mb-2 text-uppercase" style="color: #C99A45;">Login</h2>
                    <p class="text-white-50 mb-5">Masukan Username and password anda!</p>

                    <div class="form-outline form-white mb-4">
                      <input type="text" placeholder="Email Or Username" name="username" id="username" class="form-control form-control-lg" />
                      <input type="hidden" class="form-control" name="id" id="id" readonly>
                      <label class="form-label text-white-50" for="typeEmailX" >Username</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                      <input type="password" placeholder="Password" name="password" id="password" class="form-control form-control-lg" />
                      <label class="form-label text-white-50" for="typePasswordX" >Password</label>
                    </div>
                     <p class="small mb-3 pb-lg-2"><a class="text-white-50" href="<?php echo base_url()?>index.php/C_Nologin">Info Tasksales</a></p>
                     <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="<?php echo base_url('')?>index.php/C_Register">Register New Account</a></p> -->

                    <button class="btn btn-outline-light text-white-50 btn-lg px-5" type="submit">Login</button>


                  </div>

                  </form>
                  <?php echo form_close(); ?>

                  <!-- <div>
                    <p class="mb-0" style="color: #C99A45;">Don't have an account?  <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
                    </p>
                  </div> -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/mdb.min.js"></script>
    <script src="<?php echo base_url()?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Custom scripts -->
    <script>
          $('#username').on('keyup',function(){
            var username=$(this).val();
              $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/C_Login/get_infouser')?>",
                dataType : "JSON",
                data : {username: username},
                cache:false,
                success: function(data){
                  $.each(data,function(id){
                    $('#id').val(data.id);                             
                  });
                               
                }
              });
              return false;
          });
    </script>
  </body>
</html>