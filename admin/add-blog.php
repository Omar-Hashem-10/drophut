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
            <h1 class="m-0">Add Blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Blogs</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Add Blog Form -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New Blog</h3>
              </div>
              <div class="card-body">
                <!-- Blog Form -->
                <?php require_once "inc/success.php"; ?>
                <form action="handlers/handle-add-blog.php" method="POST">
                  <div class="form-group">
                    <label for="title">Blog Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                    <?php errors("title"); ?>
                  </div>

                  <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" name="author">
                    <?php errors("author"); ?>
                  </div>

                  <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <textarea class="form-control" id="excerpt" name="excerpt" rows="3"></textarea>
                    <?php errors("excerpt"); ?>
                  </div>

                  <div class="form-group">
                    <label for="quote">Quote</label>
                    <textarea class="form-control" id="quote" name="quote" rows="3"></textarea>
                    <?php errors("quote"); ?>
                  </div>

                  <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="6"></textarea>
                    <?php errors("content"); ?>
                  </div>

                  <div class="form-group">
                    <label for="image">Blog Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <?php errors("image"); ?>
                  </div>

                  <div class="form-group">
                    <label for="major">Major</label>
                    <select class="form-control" id="major" name="major">
                        <option value="blogs" <?= Session::get('major') == 'blogs' ? 'selected' : ''; ?>>Blogs</option>
                        <option value="blog posts" <?= Session::get('major') == 'blog posts' ? 'selected' : ''; ?>>Blog Posts</option>
                    </select>
                    <?php errors("major"); ?>
                    <?php Session::remove("errors"); ?>
                  </div>


                  <button type="submit" class="btn-submit">Add Blog</button>
                </form>
                <!-- /Blog Form -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<?php require_once "inc/footer.php"; ?>
