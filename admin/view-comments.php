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
    .btn-show {
        background-color: #007bff; /* Blue */
    }
    .btn-show:hover {
        background-color: #0056b3; /* Darker blue */
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
              <li class="breadcrumb-item active">Blogs</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /Page Header -->

    <?php
        $conn = Database::connect("localhost", "root", "", "drophut");
        $sql = Database::select("*", "blogs");
        $result = mysqli_query($conn, $sql);
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Blogs Table -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Blogs Summary</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Excerpt</th>
                      <th>Major</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php while($row_blogs = mysqli_fetch_assoc($result)): ?>
                    <tr>
                      <td><?= $row_blogs["id"]; ?></td>
                      <td><?= $row_blogs["title"]; ?></td>
                      <td><?= $row_blogs["author"]; ?></td>
                      <td><?= $row_blogs["excerpt"]; ?></td>
                      <td><?= $row_blogs["major"]; ?></td>
                      <td>
                        <a href="show-comment.php?id=<?= $row_blogs["id"]; ?>" class="btn btn-show">Show</a>
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
