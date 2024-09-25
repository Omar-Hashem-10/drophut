<?php require_once "inc/main.php"; ?>

<style>
    /* Card and table styling */
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

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Page Header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /Page Header -->

    <?php
      // Connect to the database
      $conn = Database::connect("localhost", "root", "", "drophut");

      // Fetch data using selectJoin function
      $sql = Database::selectJoin("p.*, c.name AS category_name", "products p", "categories c", "c.category_id = p.category_id");

      // Execute the query
      $result = mysqli_query($conn, $sql);
    ?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Products Table -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Products Summary</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Major</th>
                  <th>Category Name</th>
                  <th>Actions</th> <!-- إضافة عمود للأزرار -->
                </tr>
              </thead>
              <tbody>
                <?php
                  // Connect to the database
                  $conn = Database::connect("localhost", "root", "", "drophut");

                  // Fetch data for the new table
                  $sql_summary = "SELECT p.product_id, p.title, p.major, c.name AS category_name 
                                  FROM products p 
                                  JOIN categories c ON c.category_id = p.category_id";
                  $result_summary = mysqli_query($conn, $sql_summary);
                  
                  while($row_summary = mysqli_fetch_assoc($result_summary)): ?>
                <tr>
                  <td><?= $row_summary["product_id"]; ?></td>
                  <td><?= $row_summary["title"]; ?></td>
                  <td><?= $row_summary["major"]; ?></td>
                  <td><?= $row_summary["category_name"]; ?></td>
                  <td>
                    <a href="show-review.php?id=<?= $row_summary["product_id"]; ?>" class="btn btn-info">Show</a>
                  </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Main content -->


<?php require_once "inc/footer.php"; ?>
