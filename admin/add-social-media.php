<?php require_once "inc/main.php"; ?>
<section class="content">
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h2 class="mb-0">Add Social Media Link</h2>
      </div>
      <div class="card-body">
      <?php require_once "inc/success.php"; ?>
        <form action="handlers/handle-add-social-media.php" method="POST">
          <div class="form-group">
            <label for="linkName">Link Name</label>
            <input type="text" class="form-control" id="linkName" name="link_name" placeholder="Enter link name">
            <?php errors("linkName"); ?>
          </div>

          <div class="form-group">
            <label for="linkUrl">Link URL</label>
            <input type="url" class="form-control" id="linkUrl" name="link_url" placeholder="Enter link URL">
            <?php errors("linkUrl"); ?>
            <?php Session::remove("errors"); ?>
          </div>

          <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>
<?php require_once "inc/footer.php"; ?>
