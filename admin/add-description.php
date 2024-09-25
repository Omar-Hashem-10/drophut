<?php require_once "inc/main.php"; ?>

<div class="container mt-5">
    <h2 class="text-center">Add Description</h2>

    <!-- بطاقة تحتوي على النموذج -->
    <div class="card">
        <div class="card-header">
            Enter Description
        </div>
        <div class="card-body">
            <?php require_once "inc/success.php"; ?>
            <form action="handlers/handle-add-description.php" method="POST">
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="4"></textarea>
                    <?php errors("description"); ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php require_once "inc/footer.php"; ?>
