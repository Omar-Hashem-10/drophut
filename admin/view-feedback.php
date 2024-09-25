<?php require_once "inc/main.php"; ?>

<style>

    .container {
        width: 80%;
        margin: 0 auto;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        font-family: Arial, sans-serif;
    }

    .table-feedback {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    .table-feedback th, .table-feedback td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    .table-feedback th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }

    .table-feedback tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table-feedback tr:hover {
        background-color: #e9ecef;
    }

    .feedback-img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }

    @media (max-width: 768px) {
        .container {
            width: 100%;
            padding: 0 10px;
        }

        .table-feedback th, .table-feedback td {
            font-size: 14px;
            padding: 6px;
        }

        h2 {
            font-size: 24px;
        }
    }
</style>

<?php
    $conn = Database::connect("localhost", "root", "", "drophut");
    $sql = Database::select("*", "feedback");
    $result = mysqli_query($conn, $sql);
?>

<div class="container mt-4">
    <h2>Feedback List</h2>
    <?php require_once "inc/success.php"; ?>
    <table class="table-feedback">
        <thead>
            <tr>
                <th>#</th>
                <th>Feedback</th>
                <th>User ID</th>
                <th>User Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row["feedback_text"]; ?></td>
                <td><?= $row["user_id"]; ?></td>
                <td><?= $row["user_title"]; ?></td>
                <td>
                    <a href="handlers/handle-delete-feedback.php?id=<?= $row["feedback_id"]; ?>" class="btn btn-delete">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php require_once "inc/footer.php"; ?>
