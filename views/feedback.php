<?php require_once "inc/main.php"; ?>

<style>
    .feedback-card {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }
    .feedback-card h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .alert {
        margin-top: 10px;
    }
</style>

<div class="container feedback-card">
    <h2>Feedback</h2>
    <form action="../handlers/submit_feedback.php" method="POST">
        <div class="form-group">
            <label for="feedback">Feedback:</label>
            <textarea class="form-control" id="feedback" name="feedback" rows="4"></textarea>
            <?php errors("feedback"); ?>
        </div>
        <div class="form-group">
            <label for="user_title">User Title:</label>
            <input type="text" class="form-control" id="user_title" name="user_title">
            <?php errors("user_title"); ?>
        </div>
        <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <?php errors("image"); ?>
                  </div>
        <?php Session::remove("errors"); ?>
        <button type="submit" class="btn btn-primary">Submit Feedback</button>
    </form>
</div>

<?php require_once ROOT_PATH . 'inc/footer.php'; ?>
