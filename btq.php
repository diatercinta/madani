<?php
//index.php

$error = '';
$name = '';
$kelas = '';
$jurusan = '';
$soal1 = '';
$soal2 = '';
$soal3 = '';
$soal4 = '';
$soal5 = '';
$soal6 = '';
$soal7 = '';
$soal8 = '';
$soal9 = '';
$soal10 = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Nama tidak boleh kosong</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Hanya huruf dan spasi yang diperbolehkan</label></p>';
  }
 }
 if(empty($_POST["kelas"]))
 {
  $error .= '<p><label class="text-danger">Kelas tidak boleh kosong</label></p>';
 }
 else
 {
  $kelas = clean_text($_POST["kelas"]);
  }
 if(empty($_POST["jurusan"]))
 {
  $error .= '<p><label class="text-danger">Jurusan tidak boleh kosong</label></p>';
 }
 else
 {
  $jurusan = clean_text($_POST["jurusan"]);
 }
 if(empty($_POST["soal1"]))
 {
  $error .= '<p><label class="text-danger">Jawaban tidak boleh kosong</label></p>';
 }
 else
 {
  $soal1 = clean_text($_POST["soal1"]);
 }
  if(empty($_POST["soal2"]))
 {
  $error .= '<p><label class="text-danger">Jawaban tidak boleh kosong</label></p>';
 }
 else
 {
  $soal2 = clean_text($_POST["soal2"]);
 }
  if(empty($_POST["soal3"]))
 {
  $error .= '<p><label class="text-danger">Jawaban tidak boleh kosong</label></p>';
 }
 else
 {
  $soal3 = clean_text($_POST["soal3"]);
 }
 if(empty($_POST["soal4"]))
 {
  $error .= '<p><label class="text-danger">Jawaban tidak boleh kosong</label></p>';
 }
 else
 {
  $soal4 = clean_text($_POST["soal4"]);
 }
 if(empty($_POST["soal5"]))
 {
  $error .= '<p><label class="text-danger">Jawaban tidak boleh kosong</label></p>';
 }
 else
 {
  $soal5 = clean_text($_POST["soal5"]);
 }
 if(empty($_POST["soal6"]))
 {
  $error .= '<p><label class="text-danger">Jawaban tidak boleh kosong</label></p>';
 }
 else
 {
  $soal6 = clean_text($_POST["soal6"]);
 }
 if(empty($_POST["soal7"]))
 {
  $error .= '<p><label class="text-danger">Jawaban tidak boleh kosong</label></p>';
 }
 else
 {
  $soal7 = clean_text($_POST["soal7"]);
 }
 if(empty($_POST["soal8"]))
 {
  $error .= '<p><label class="text-danger">Jawaban tidak boleh kosong</label></p>';
 }
 else
 {
  $soal8 = clean_text($_POST["soal8"]);
 }
 if(empty($_POST["soal9"]))
 {
  $error .= '<p><label class="text-danger">Jawaban tidak boleh kosong</label></p>';
 }
 else
 {
  $soal9 = clean_text($_POST["soal9"]);
 }
 if(empty($_POST["soal10"]))
 {
  $error .= '<p><label class="text-danger">Jawaban tidak boleh kosong</label></p>';
 }
 else
 {
  $soal10 = clean_text($_POST["soal10"]);
 }

 if($error == '')
 {
  $file_open = fopen("BTQX.csv", "a");
  $no_rows = count(file("BTQX.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'kelas'  => $kelas,
   'jurusan' => $jurusan,
   'soal1' => $soal1,
   'soal2' => $soal2,
   'soal3' => $soal3,
   'soal4' => $soal4,
   'soal5' => $soal5,
   'soal6' => $soal6,
   'soal7' => $soal7,
   'soal8' => $soal8,
   'soal9' => $soal9,
   'soal10' => $soal10
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Selamat kamu telah menyelesaikan ujian</label>';
  $name = '';
  $kelas = '';
  $jurusan = '';
  $soal1 = '';
  $soal2 = '';
  $soal3 = '';
  $soal4 = '';
  $soal5 = '';
  $soal6 = '';
  $soal7 = '';
  $soal8 = '';
  $soal9 = '';
  $soal10 = '';
 }
}

?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
 <head>
  <title>Ujian SMK Madani</title>
  <script src="jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
  <center>
  <img src="smk.png" width="130"/>
  </center>
   <h2 align="center">Selamat Datang Peserta Ujian SMK Madani Makassar</h2>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
	<h4 align="center">Mata Pelajaran : Baca Tulis Al-Qur'an</h4>
     <h4 align="center">Berdo'a Sebelum Mengerjakan</h4>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Masukkan Nama</label>
      <input type="text" name="name" placeholder="Masukkan Nama Kamu" class="form-control" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group">
      <label>Masukkan Kelas</label>
	<input type="text" name="kelas" class="form-control" placeholder="X  XI  XII" value="<?php echo $kelas; ?>" />
     </div>
     <div class="form-group">
      <label>Masukkan Jurusan</label>
      <input type="text" name="jurusan" class="form-control" placeholder="Otomotif  Listrik  TKJ  AP" value="<?php echo $jurusan; ?>" />
     </div>
     <div class="form-group">
      <label>1. Apakah kepanjangan dari BTQ?</label>
      <textarea style="resize:none;height:150px;" name="soal1" class="form-control" placeholder="Masukkan Jawaban"><?php echo $soal1; ?></textarea>
     </div>
	 <div class="form-group">
      <label>2. Tuliskan nama dari huruf berikut <h1>ج ح خ ع غ</h1></label>
      <textarea style="resize:none;height:150px;" name="soal2" class="form-control" placeholder="Masukkan Jawaban"><?php echo $soal2; ?></textarea>
     </div>
	 <div class="form-group">
      <label>3. Tuliskan 3 Adab membaca Al-Qur'an!</label>
      <textarea style="resize:none;height:150px;" name="soal3" class="form-control" placeholder="Masukkan Jawaban"><?php echo $soal3; ?></textarea>
     </div>
	 <div class="form-group">
      <label>4. Tuliskan 3 nama tanda baca dalam Al-Qur'an!</label>
      <textarea style="resize:none;height:150px;" name="soal4" class="form-control" placeholder="Masukkan Jawaban"><?php echo $soal4; ?></textarea>
     </div>
	 <div class="form-group">
      <label>5. Tuliskan pengertian dari tanda waqaf di berikut <h1>- ﻕ</br>- ﺝ</br>- لا</h1></label>
      <textarea style="resize:none;height:150px;" name="soal5" class="form-control" placeholder="Masukkan Jawaban"><?php echo $soal5; ?></textarea>
     </div>
	 <div class="form-group">
	 <label>6. Tuliskan nama dari tanda baca pada gambar di bawah</br> <img src="/zyacbt/uploads/topik_13/63db5f9869c0e.png" width="130"/></label>
      <textarea style="resize:none;height:150px;" name="soal6" class="form-control" placeholder="Masukkan Jawaban"><?php echo $soal6; ?></textarea>
     </div>
	 <div class="form-group">
	 <label>7. Apakah arti dari nama surat Al-Fiil dan berapakah jumlah ayatnya?</label>
      <textarea style="resize:none;height:150px;" name="soal7" class="form-control" placeholder="Masukkan Jawaban"><?php echo $soal7; ?></textarea>
     </div>
	 <div class="form-group">
	 <label>8. Tuliskan arti dari nama surat An-Naas dan ada berapakah jumlah ayatnya?</label>
      <textarea style="resize:none;height:150px;" name="soal8" class="form-control" placeholder="Masukkan Jawaban"><?php echo $soal8; ?></textarea>
     </div>
	 <div class="form-group">
	 <label>9. Tuliskan 3 makhorijul huruf (tempat keluarnya huruf) yang kamu ketahui!</label>
      <textarea style="resize:none;height:150px;" name="soal9" class="form-control" placeholder="Masukkan Jawaban"><?php echo $soal9; ?></textarea>
     </div>
	 <div class="form-group">
	 <label>Dimanakah tempat keluarnya huruf berikut<h1>ب  م  و</h1></label>
      <textarea style="resize:none;height:150px;" name="soal10" class="form-control" placeholder="Masukkan Jawaban"><?php echo $soal10; ?></textarea>
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
   </div>
  </div>
 </body>
</html>
