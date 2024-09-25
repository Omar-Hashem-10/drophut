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
            <h1 class="m-0">Add Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Add Product Form -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New Product</h3>
              </div>
              <div class="card-body">
                <!-- Product Form -->
                <?php require_once "inc/success.php"; ?>
                <form action="handlers/handle-add-product.php" method="POST">
                  <div class="form-group">
                    <label for="title">Product Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                    <?php errors("title"); ?>
                  </div>

                  <div class="form-group">
                    <label for="price_before_discount">Price Before Discount</label>
                    <input type="number" class="form-control" id="price_before_discount" name="price_before_discount">
                    <?php errors("price_before_discount"); ?>
                  </div>

                  <div class="form-group">
                    <label for="price_after_discount">Price After Discount</label>
                    <input type="number" class="form-control" id="price_after_discount" name="price_after_discount">
                    <?php errors("price_after_discount"); ?>
                  </div>

                  <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <?php errors("image"); ?>
                  </div>

                  <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category_id">
                      <?php
                        // Fetch categories from the database
                        $conn = Database::connect("localhost", "root", "", "drophut");
                        $categories_sql = "SELECT * FROM categories";
                        $categories_result = mysqli_query($conn, $categories_sql);
                        while($category = mysqli_fetch_assoc($categories_result)) {
                          echo "<option value='{$category['category_id']}'>{$category['name']}</option>";
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="major">Major</label>
                    <select class="form-control" id="major" name="major">
                        <option value="">Choose Major</option>
                        <option value="tranding products">Tranding Products</option>
                        <option value="other collections">Other Collections</option>
                    </select>
                  </div>



                  <div class="form-group">
                    <label for="delivery">Delivery Options</label>
                    <select class="form-control" id="delivery" name="delivery">
                        <option value="free">Free</option>
                        <option value="not free">No Free</option>
                    </select>
                    </div>

                  <div class="form-group">
                    <label for="coupon">Coupon</label>
                    <input type="text" class="form-control" id="coupon" name="coupon">
                  </div>

                  <div class="form-group">
                    <label for="coupon_value">Coupon Value</label>
                    <input type="number" class="form-control" id="coupon_value" name="coupon_value">
                  </div>

                  <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" class="form-control" id="color" name="color">
                    <?php errors("color"); ?>
                  </div>

                  <div class="form-group">
                  <div class="form-group">
                    <label for="stock">Stock</label>
                    <select class="form-control" id="stock" name="stock" required>
                        <option value="0">Out of Stock</option>
                        <option value="1">In Stock</option>
                    </select>
                    </div>

                </div>

                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    <?php errors("description"); ?>
                    <?php Session::remove("errors"); ?>
                  </div>
                  <button type="submit" class="btn-submit">Add Product</button>
                </form>
                <!-- /Product Form -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<?php require_once "inc/footer.php"; ?>
