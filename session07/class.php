<?php
include 'header.php';
?>
<?php
include 'conect.php';
$sql = "SELECT id, name, CASE WHEN status = 1 THEN 'Studying' WHEN status = 2 THEN 'Graduated' END AS status FROM class";
$class = $conn -> query($sql);
?>
<div class="container">
    <p class="text-center text-danger text-uppercase h1">Classes</p>
    <div class="py-3 text-center">
        <a href="add_class.php" class="btn btn-outline-success">Add a new class</a>
    </div>
    <table class="table table-striped ">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($class as $key => $value) {
            ?>
            <tr>
                <td scope="row"><?php echo $value['id']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['status']; ?></td>
                <td>
                    <a class="btn btn-outline-primary" href="edit_class.php?id=<?php echo $value['id'];?>">Edit</a>
                    <a class="btn btn-outline-danger" href="delete_class.php?id=<?php echo $value['id'];?>">Delete</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include 'footer.php';
?>