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
    .btn-show {
        background-color: #28a745; /* Green */
    }
    .btn-show:hover {
        background-color: #218838; /* Darker green */
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
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /Page Header -->

    <?php
        $conn = Database::connect("localhost", "root", "", "drophut");
        $sql = Database::select("*", "orders");
        $result = mysqli_query($conn, $sql);
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Orders Table -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders List</h3>
              </div>
              <div class="card-body">
              <?php require_once "inc/success.php"; ?>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>User ID</th>
                      <th>Total Amount</th>
                      <th>Payment Method</th>
                      <th>Address</th>
                      <th>Second Address</th>
                      <th>Name</th>
                      <th>Company Name</th>
                      <th>Country</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Order Notes</th>
                      <th>Order Date</th>
                      <th>Status</th>
                      <th>Tracking Number</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                      <td><?= $row["order_id"]; ?></td>
                      <td><?= $row["user_id"]; ?></td>
                      <td>$<?= $row["total_amount"]; ?></td>
                      <td><?= $row["payment_method"]; ?></td>
                      <td><?= $row["address"]; ?></td>
                      <td><?= $row["address_op"]; ?></td>
                      <td><?= $row["first_name"]; ?></td>
                      <td><?= $row["last_name"]; ?></td>
                      <td><?= $row["company_name"]; ?></td>
                      <td><?= $row["country"]; ?></td>
                      <td><?= $row["city"]; ?></td>
                      <td><?= $row["state"]; ?></td>
                      <td><?= $row["phone"]; ?></td>
                      <td><?= $row["email"]; ?></td>
                      <td><?= $row["order_notes"]; ?></td>
                      <td><?= $row["order_date"]; ?></td>
                      <td><?= $row["status"]; ?></td>
                      <td><?= $row["tracking_number"]; ?></td>
                      <td>
                        <a href="show-order.php?id=<?= $row["order_id"]; ?>" class="btn btn-show">Show</a>
                        <a href="edit-order.php?id=<?= $row["order_id"]; ?>" class="btn btn-edit">Edit</a>
                        <a href="handlers/handle-delete-order.php?id=<?= $row["order_id"] ?>" class="btn btn-delete">Delete</a>
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
