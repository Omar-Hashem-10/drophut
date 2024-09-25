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
    .form-group {
        margin-bottom: 15px;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
    }
    .btn-submit {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-submit:hover {
        background-color: #218838;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <?php
        $order_id = Request::getGet("id");
        $conn = Database::connect("localhost", "root", "", "drophut");
        $sql = Database::select("*", "orders", "order_id", $order_id);
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            Session::set("status", $row["status"]);
        }
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Edit Order Form -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Order</h3>
              </div>
              <div class="card-body">
              <?php require_once "inc/success.php"; ?>
                <form action="handlers/handle-update-order.php?id=<?= $order_id; ?>" method="POST">
                  <div class="form-group">
                    <label for="status">Product Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="pending" <?= (Session::get('status') == 'pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="processing" <?= (Session::get('status') == 'processing') ? 'selected' : ''; ?>>Processing</option>
                        <option value="shipped" <?= (Session::get('status') == 'shipped') ? 'selected' : ''; ?>>Shipped</option>
                        <option value="completed" <?= (Session::get('status') == 'completed') ? 'selected' : ''; ?>>Completed</option>
                    </select>
                    <?php errors("status"); ?>
                  </div>
                  <button type="submit" class="btn-submit">Edit Order</button>
                </form>
                <!-- /Edit Order Form -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<?php require_once "inc/footer.php"; ?>
