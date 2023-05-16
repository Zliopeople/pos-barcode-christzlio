<?php
include_once("../../config/database.php");

session_start();

if ($_SESSION['username'] == "") {
  header('location:../index.php');
}

$queryid = $_GET["id"];

include_once("../inc/header.php");

if(isset($_POST['update'])){
$category = $_POST['kategori'];

$sql = "UPDATE tb_category SET nm_cat='$category' WHERE id='$queryid'";
$result = $pdo->query($sql);

if($result) {
  echo "<script> alert('Data Berhasil Diperbarui')</script>";
}else {
  echo "<script> alert('Data Tidak Dapat Diperbarui')</script>";
}
}    



?>

<?php
include_once("../inc/admin_sidebar.php");
?>

<div class="content-wrapper">
    <?php
    $sql = "SELECT * FROM tb_category WHERE id='$queryid'";
    $stmt = $pdo->query($sql);
    while($rows = $stmt->fetch()){
        $data_nama = $rows["nm_cat"];
    }
?>
<!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Ubah Kategori</h3>
            </div>
            <!-- /.card-header -->
            <form  method="POST" action="">
            <div class="card-body">
              <div class="form-group">
                <label for="name">Nama Kategori</label>
                <!-- <input style="width: 100%;" type="text" name="form=control input-bg"> -->
                <input type="text" class="form-control" id="katInput" name="kategori" value="<?= $data_nama?>">
              </div>
            </div>
            <!-- /.card-body -->
            <div>
              <div class="card-footer">
                <button  type="submit" name="update" class="btn btn-primary">Perbarui</button>
                <a href="index.php" class="btn btn-info">Kembali</a>
              </div>
            </div>
           <!--card footer -->
           </form>
          </div>
        </div>
      </div>

  </section>
</div>
  
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
  integrity="sha512-PRp/TKOB/Br7kfh9BnC5d29pYW+t5F5hZWvkwWLtFXOr8tIS4LhYQfwGFv9lWZQ8c09lBJPqo3/hvNUA5z8liA==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />

</script>

<?php
include_once("../inc/footer.php");
?>