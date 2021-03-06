<?php
ob_start();
?>
<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=jenis_laundry-create?">Home</a></li>
  <li class="disabled">Data Jenis Laundry</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field kode -->
<div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="kode" class="text-right middle">Kode</label>
</div>
<div class="small-6 cell">
<?php
  $db = new Database();
  $db->selectMax('jenis_laundry','id');
  $res = $db->getResult();
  $kode = $res[0]['max'] < 1 ? $res[0]['max']+1  : $res[0]['max']+1;
  $value = 'JL000'.$kode;
  echo "<input type='text' name='kode' value='$value' placeholder='kode' readonly>";
?>
</div>
</div>
  <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nama" placeholder="Nama" required>
    </div>
  </div>
  <!-- Aksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle"></label>
    </div>
    <div class="small-6 cell">
		<div class="small button-group">
  <button class="button" type="submit" name="submit">Simpan</button>
  <button class="button" type="reset">Reset</button>
  <a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
    </div>
  </div>
</form>
<?php 

// check action submit
if(isset($_POST['submit'])){
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  
  $db=new Database();
  $db->insert('jenis_laundry',array('kode'=>$kode, 'nama'=>$nama));
  $res=$db->getResult();
  // redirect to list
  header('Location: /laundry2/index.php?module=jenis_laundry');
}
?>