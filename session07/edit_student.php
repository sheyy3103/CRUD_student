<?php
include 'header.php';
?>
<div class="container">
    <p class="h1 text-success text-uppercase text-center">add a new class</p>
    <?php
    include 'conect.php';
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'];
        $sql = "SELECT * FROM student WHERE id='$id'";
        $result = $conn->query($sql);
        $student = mysqli_fetch_assoc($result);
    }
    $sql_class = "SELECT id, name, CASE WHEN status = 1 THEN 'Studying' WHEN status = 2 THEN 'Graduated' END AS status FROM class";
    $class = $conn->query($sql_class);
    if (isset($_POST['name'], $_POST['phone'], $_POST['address'], $_POST['image'], $_POST['class_id'])) {
        if ($_POST['name'] != null && $_POST['phone'] != null && $_POST['address'] != null && $_POST['image'] != null && $_POST['class_id'] != null) {
            $id = $_GET['id'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $image = $_POST['image'];
            $class_id = $_POST['class_id'];
            $sql = "UPDATE student SET name = '$name', phone = '$phone', address = '$address', image = '$image', class_id = $class_id WHERE id = '$id'";
            $conn->query($sql);
            header("location:student.php");
        } else { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Please do not leave any fields blank</strong>
            </div>
    <?php }
    }
    ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter name..." value="<?php if (isset($student['name'])) {echo $student['name'];} ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputName">Phone</label>
            <input type="text" name="phone" class="form-control" id="exampleInputName" placeholder="Enter phone..." value="<?php if (isset($student['phone'])) {echo $student['phone'];} ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputName">Address</label>
            <input type="text" name="address" class="form-control" id="exampleInputName" placeholder="Enter address..." value="<?php if (isset($student['address'])) {echo $student['address'];} ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputName">Image</label>
            <input type="text" name="image" class="form-control" id="exampleInputName" placeholder="Enter image link..." value="<?php if (isset($student['image'])) {echo $student['image'];} ?>">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="exampleSelectClass">Class</label>
                <select class="form-control" name="class_id" id="exampleSelectClass">
                    <option value="">--&nbsp;Select&nbsp;--</option>
                    <?php foreach ($class as $key => $value) { ?>
                        <option value="<?php echo $value['id']; ?>" <?php if (isset($student['class_id']) && $student['class_id'] == $value['id']) {echo "selected";} ?> ><?php echo $value['name']; ?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
include 'footer.php';
?>