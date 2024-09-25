<?php require_once "inc/main.php"; ?>

<style>
    .card {
        margin: 20px 0;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        padding: 15px;
    }
    .card-title {
        font-size: 1.5rem;
        margin: 0;
    }
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
        padding: 10px;
        text-align: left;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }
    .table-striped tbody tr:hover {
        background-color: #f1f1f1;
    }
    .btn {
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        color: white;
        cursor: pointer;
        text-decoration: none;
    }
    .btn-edit {
        background-color: #007bff; /* Blue */
    }
    .btn-edit:hover {
        background-color: #0056b3; /* Darker blue */
    }
    .btn-delete {
        background-color: #dc3545; /* Red */
    }
    .btn-delete:hover {
        background-color: #c82333; /* Darker red */
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inde.php">Home</a></li>
              <li class="breadcrumb-item active">Customers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php
      $conn = Database::connect("localhost", "root", "", "drophut");
      $sql = Database::select("*", "users", "role", "User");
      $result = mysqli_query($conn, $sql);
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Customers Table -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customers List</h3>
              </div>
              <div class="card-body">
              <?php require_once "inc/success.php"; ?>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Phone Number</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                      <td><?= $row["user_id"]; ?></td>
                      <td><?= $row["username"]; ?></td>
                      <td><?= $row["email"]; ?></td>
                      <td><?= $row["password"]; ?></td>
                      <td><?= $row["phone_number"]; ?></td>
                      <td>
                        <a href="edit-customer.php?id=<?= $row["user_id"]; ?>" class="btn btn-edit">Edit</a>
                        <a href="handlers/handle-delete-customer.php?id=<?= $row["user_id"]; ?>" class="btn btn-delete">Delete</a>
                      </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<?php require_once "inc/footer.php"; ?>
