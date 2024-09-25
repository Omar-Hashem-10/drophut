<?php require_once "inc/main.php"; ?>


<style>
    /* Card and table styling */
    .card {
        margin: 20px auto; /* مركز الكارد */
        border: 1px solid #dee2e6;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 80%; /* ضبط عرض الكارد */
        max-width: 800px; /* ضبط الحد الأقصى للعرض */
    }
    .card-header {
        background-color: #007bff; /* لون خلفية الكارد */
        color: #fff; /* لون النص */
        padding: 15px;
        border-top-left-radius: 5px; /* زوايا دائرية */
        border-top-right-radius: 5px; /* زوايا دائرية */
    }
    .card-title {
        font-size: 1.5rem;
        margin: 0;
    }
    .table {
        width: 100%; /* عرض الجدول 100% */
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
    .product_thumb img {
        width: 50px; /* عرض الصورة */
        height: auto; /* الحفاظ على نسبة العرض إلى الارتفاع */
        border-radius: 5px; /* زوايا دائرية للصورة */
    }
    .alert {
        margin-bottom: 20px; /* هوامش أسفل التنبيه */
    }
</style>

<?php
$order_id = Request::getGet("id");  
$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::selectJoin(
    ["order_items.*", "products.title", "products.price_after_discount", "products.price_before_discount", "products.image"], 
    "order_items", 
    "products", 
    "order_items.product_id = products.product_id", 
    "order_items.order_id", 
    $order_id
);

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
            <h3 class="card-title">Products List</h3>
          </div>
          <div class="card-body">
          <?php require_once "inc/success.php"; ?>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Product Name</th>
                  <th>QTY</th>
                  <th>Price</th>   
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= htmlspecialchars($row["title"]); ?></td>
                    <td><?= htmlspecialchars($row["quantity"]); ?></td>
                    <td>
                      <?php if (!empty($row["price_after_discount"])): ?>
                        $<?= number_format($row["quantity"] * $row["price_after_discount"], 2); ?>
                      <?php else: ?>
                        $<?= number_format($row["quantity"] * $row["price_before_discount"], 2); ?>
                      <?php endif; ?>
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
