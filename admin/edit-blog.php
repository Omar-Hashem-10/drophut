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
            <h1 class="m-0">Edit Blog</h1>
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

    <?php
        $blog_id = Request::getGet("id");
        $conn = Database::connect("localhost", "root", "", "drophut");
        $sql = Database::select("*", "blogs", "id", $blog_id);
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            Session::set("title", $row["title"]);
            Session::set("author", $row["author"]);
            Session::set("excerpt", $row["excerpt"]);
            Session::set("quote", $row["quote"]);
            Session::set("content", $row["content"]);
            Session::set("image", $row["image"]);
            Session::set("major", $row["major"]);
        }
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Add Blog Form -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Blog</h3>
              </div>
              <div class="card-body">
                <!-- Blog Form -->
                <form action="handlers/handle-update-blog.php?id=<?= $blog_id; ?>" method="POST">
                  <div class="form-group">
                    <label for="title">Blog Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= Session::get('title'); ?>">
                    <?php errors("title"); ?>
                  </div>

                  <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" name="author" value="<?= Session::get('author'); ?>">
                    <?php errors("author"); ?>
                  </div>

                    <div class="form-group">
                        <label for="quote">Excerpt</label>
                        <textarea class="form-control" id="excerpt" name="excerpt" rows="6"><?= Session::get('excerpt'); ?></textarea>
                        <?php errors("excerpt"); ?>
                    </div>


                  <div class="form-group">
                    <label for="quote">Quote</label>
                    <textarea class="form-control" id="quote" name="quote" rows="6"><?= Session::get('quote'); ?>"</textarea>
                    <?php errors("quote"); ?>
                  </div>

                    <div class="form-group">
                        <label for="content">Content Confirm:</label>
                        <textarea id="content" class="form-control" name="content" rows="6" ><?= Session::get('content'); ?></textarea>
                        <?php errors("content"); ?>
                    </div>


                  <div class="form-group">
                    <label for="image">Image Confirm: </label>
                        <input type="text" value="<?= Session::get('image'); ?>" disabled>
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


                  <button type="submit" class="btn-submit">Edit Blog</button>
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
