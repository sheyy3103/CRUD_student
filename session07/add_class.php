<?php
include 'header.php';
?>
<div class="container">
    <p class="h1 text-success text-uppercase text-center">add a new class</p>
    <?php
    include 'conect.php';
    if (isset($_POST['name'], $_POST['status'])) {
        if ($_POST['name'] != null && $_POST['status'] != null) {
            $name = $_POST['name'];
            $status = $_POST['status'];
            $sql = "INSERT INTO class VALUE(null,'$name',$status)";
            $conn->query($sql);
            header("location:class.php");
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
            <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter name...">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="exampleSelectStatus">Status</label>
                <select class="form-control" name="status" id="exampleSelectStatus">
                    <option value="" selected>--&nbsp;Select&nbsp;--</option>
                    <option value="1">Studying</option>
                    <option value="2">Graduated</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
include 'footer.php';
?>