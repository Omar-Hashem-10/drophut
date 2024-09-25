<?php require_once "inc/main.php"; ?>


<style>
    .form-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        background-color: #f8f9fa;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }
    .btn-submit {
        background-color: #007bff; /* Blue */
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-submit:hover {
        background-color: #0056b3; /* Darker blue */
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Employee</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="form-container">
          <form action="handlers/handle-add-employee.php?role=Employee" method="POST">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" id="username" name="username">
              <?php errors("username"); ?>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email">
              <?php errors("email"); ?>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" name="password">
              <?php errors("password"); ?>
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="text" id="phone" name="phone">
              <?php errors("phone"); ?>
            </div>
            <div class="form-group">
              <label for="job_title">Job Title</label>
              <input type="text" id="job_title" name="job_title">
              <?php errors("job_title"); ?>
            </div>
            <div class="form-group">
              <label for="image">Profile Picture</label>
              <input type="file" id="image" name="image">
            </div>
            <?php Session::remove("errors"); ?>
            <button type="submit" class="btn-submit">Add Employee</button>
          </form>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<?php require_once "inc/footer.php"; ?>
