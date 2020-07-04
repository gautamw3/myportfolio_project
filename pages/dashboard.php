<div class="d-flex" id="wrapper" style="margin-top: 103px;">
  <!-- Sidebar -->
  <div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading" style="padding-left: 70px;">Dashboard</div>
    <div class="profile-area">
      <img id="user-profile-img" src="<?php echo SITE_ROOT; ?>/user-profile/images/cover-1.jpg" class="list-group-item list-group-item-action bg-light" alt="<?php echo $_SESSION['FIRST_NAME']." ".$_SESSION['LAST_NAME']; ?>">
      <div class="middle">
        <div class="text" onclick="$('#updateProfilePicModal').modal();" style="cursor: pointer !important;">Edit</div>
      </div>
    </div>
    <div class="list-group list-group-flush">
      <a href="<?php echo SITE_ROOT; ?>/dashboard.php" class="list-group-item list-group-item-action bg-light">Profile</a>

      <a href="#articleSubmenu" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light dropdown-toggle">Articles</a>
      <ul class="collapse list-unstyled" id="articleSubmenu">
        <li>
            <a href="#">New Article <i class="fa fa-plus" aria-hidden="true"></i></a>
        </li>
         <div class="dropdown-divider"></div>
        <li>
            <a href="#">View Articles <i class="fa fa-eye" aria-hidden="true"></i></a>
        </li>
      </ul>

      <a href="#blogSubmenu" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light dropdown-toggle">Blogs</a>
      <ul class="collapse list-unstyled" id="blogSubmenu">
        <li>
            <a href="#">New Blog <i class="fa fa-plus" aria-hidden="true"></i></a>
        </li>
         <div class="dropdown-divider"></div>
        <li>
            <a href="#">View Blogs <i class="fa fa-eye" aria-hidden="true"></i></a>
        </li>
      </ul>
    </div>
  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper" style="margin-top: -16px;">
    <hr class="dashboard-hr">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <lable class="btn btn-primary" id="menu-toggle">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </label>
    </nav>

    <div class="container-fluid">
      <div class="row" id="dashboardLoader">
        <div class="col-md-12 text-center">
          <div class="d-flex justify-content-center">
            <div class="spinner-grow" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" id="dashboardContent" style="display: none;">
          <h3>Your profile details:</h3>
          <tr><td><i class="fa fa-user" aria-hidden="true"></i> <strong>Name:</strong> <?php echo $arrUserDetails['first_name']." ".$arrUserDetails['last_name']; ?></td></tr>
        </div>
      </div>
    </div>
    <hr class="dashboard-hr">
  </div>
  <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->


<!--=================== Update profile Picture Modal Starts ===================-->
<div class="modal" id="updateProfilePicModal" data-backdrop="static">
  <div class="modal-dialog modal-md">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title modalHeadingUpdateProfilePic">Upload Profile Picture</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row" id="validationAlertUpdateProfilePic" style="display: none">
            <div class="col-md-12">
              <div class="alert alert-danger alert-dismissable">
                  <strong>error!</strong> Wrong email or password
              </div>
            </div>
        </div>
          <form enctype="multipart/form-data">
            <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
              <div id="drag_upload_file">
                  <p>Drop file here</p>
                  <p>or</p>
                  <p><input type="button" value="Select File" onclick="file_explorer();"></p>
                  <input type="file" id="selectfile">
              </div>
          </div>
          </form>
      </div>
  </div>
  </div>
</div>
<!--=================== Update profile Picture Modal Ends ===================-->