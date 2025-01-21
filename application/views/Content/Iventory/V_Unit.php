<?php $this->load->view('Link/Head')?>
<?php $this->load->view('Link/Navbar')?>
<?php $this->load->view('Link/Sidebar')?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php $this->load->view('Link/Header')?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-dark">
                            <h3 class="card-title">
                            </h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <div class="input-group-append">
                                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalstore">
                                        <i class="fas fa-users">User Register</i>
                                      </button>
                                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#">
                                        <i class="fas fa-plus">Add New Unit</i>
                                      </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" style="max-height: 700px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search Unit">
                            <table class="table table-sm table-head-fixed ">
                                <thead>
                                    <th>No</th>
                                    <th>Number Unit</th>
                                    <th>Buy Date</th>
                                    <th>Status</th>
                                    <th>Unit Name</th>
                                    <th>Unit Type</th>
                                    <th>Unit Brand</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="dataunit">
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('Link/Footer')?>
<?php $this->load->view('Link/Js')?>
<script type="text/javascript"></script>
</body>
</html>