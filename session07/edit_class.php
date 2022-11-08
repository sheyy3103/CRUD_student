<?php
include 'header.php';
?>
<?php
include 'conect.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM class WHERE id='$id'";
    $result = $conn->query($sql);
    $class = mysqli_fetch_assoc($result);
}
?>
<div class="container">
    <p class="h1 text-primary text-center text-uppercase">edit class</p>
    <?php
    include 'conect.php';
    $id = $_GET['id'];
    if (isset($_POST['name'], $_POST['status'])) {
        if ($_POST['name'] != null && $_POST['status'] != null) {
            $name = $_POST['name'];
            $status = $_POST['status'];
            $sql = "UPDATE class SET name = '$name', status = $status WHERE id = '$id'";
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
            <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter name..." 
            value="<?php if (isset($class['name'])) {echo $class['name'];} ?>">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="exampleSelectStatus">Status</label>
                <select class="form-control" name="status" id="exampleSelectStatus">
                    <option value="">--&nbsp;Select&nbsp;--</option>
                    <option value="1" 
                    <?php if (isset($class['status'])) {echo ($class['status']) == 1 ? 'selected' : '';} ?>>Studying</option>
                    <option value="2"
                    <?php if (isset($class['status'])) {echo ($class['status']) == 2 ? 'selected' : '';} ?>>Graduated</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
include 'footer.php';
?>