<?php
include 'header.php';
?>
<?php
include 'conect.php';
$sql = "SELECT s.id,s.name,c.name AS class_name, s.phone,s.address,s.image FROM student s INNER JOIN class c ON c.id = s.class_id";
$student = $conn -> query($sql);
?>
<div class="container">
    <p class="text-center text-danger text-uppercase h1">Students</p>
    <div class="py-3 text-center">
        <a href="add_student.php" class="btn btn-outline-success">Add a new student</a>
    </div>
    <table class="table table-striped ">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Class name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($student as $key => $value) {
            ?>
            <tr>
                <td scope="row"><?php echo $value['id']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['class_name']; ?></td>
                <td><?php echo $value['phone']; ?></td>
                <td><?php echo $value['address']; ?></td>
                <td><img src="<?php echo $value['image']; ?>" alt="..." width="auto" height="75px"></td>
                <td>
                    <a class="btn btn-outline-primary" href="edit_student.php?id=<?php echo $value['id'];?>">Edit</a>
                    <a class="btn btn-outline-danger" href="delete_student.php?id=<?php echo $value['id'];?>">Delete</a>
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