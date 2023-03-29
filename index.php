<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>How How good are you?</title>
  <link rel="stylesheet" href="app.css">
</head>

<body>
  <?php
  $prodi = ["SI" => "Sistem Informasi", "TI" => "Teknik Informatika", "ILKOM" => "Ilmu Komputer", "TE" => "Teknik Elektro"];
  $skills = ['Html' => 30, 'CSS' => 30, 'Javascript' => 30, 'RWD Bootstrap' => 30, 'Python' => 30];
  function getSkor($skill)
  {
    global $skills;
    $skor = 0;
    if ($skill != 0) {
      foreach ($skill as $key => $item) {
        $skor += $skills[$item];
      }
      return $skor;
    }
    return 0;
  }
  function getCategory($skor)
  {
    if ($skor >= 100 && $skor <= 150) {
      return "Sangat Baik";
    } elseif ($skor >= 60 && $skor < 100) {
      return "Baik";
    } elseif ($skor >= 40 && $skor < 60) {
      return "Cukup";
    } elseif ($skor > 0 && $skor < 40) {
      return "Kurang";
    } elseif ($skor == 0) {
      return "Tidak memadai";
    } else {
      return "Tidak diketahui";
    }
  }
  ?>
  <div class="container">
    <div class="card">
      <h2>Masukan Data Diri</h2>
      <hr>
      <form action="" method="post">
        <table>
          <tr>
            <td><label for="nim">NIM</label></td>
            <td><input type="text" id="nim" name="nim" required></td>
          </tr>
          <tr>
            <td><label for="nama">Nama</label></td>
            <td><input type="text" id="nama" name="nama" required></td>
          </tr>
          <tr>
            <td><label for="email">Email</label></td>
            <td><input type="mail" id="email" name="email" required></td>
          </tr>
          <tr>
            <td><label>Jenis Kelamin</label></td>
            <td id="gender">
              <input type="radio" checked name="gender" value="Laki-Laki" id="pria"><label for="pria">Laki-Laki</label>
              <input type="radio" name="gender" value="Perempuan" id="wanita"><label for="wanita">Perempuan</label>
            </td>
          </tr>
          <tr>
            <td><label for="study">Program Study</label></td>
            <td>
              <select name="study" id="study" required>
                <?php foreach ($prodi as $key => $item) { ?>
                  <option value="<?= $item ?>"><?= $item ?></option>
                <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="skill">Skill</label></td>
            <td>
              <?php foreach ($skills as $key => $skill) { ?>
                <input type="checkbox" name="skill[]" id="<?= strtolower($key) ?>" value="<?= $key ?>"><label for="<?= strtolower($key) ?>"><?= $key ?></label>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td colspan="2"><button type="submit" name="btn">Check</button></td>
          </tr>
        </table>
      </form>
    </div>
    <?php
    if (isset($_POST['btn'])) {
      $nim = htmlspecialchars($_POST['nim']);
      $email = htmlspecialchars($_POST['email']);
      $nama = htmlspecialchars($_POST['nama']);
      $gender = htmlspecialchars($_POST['gender']);
      $study = htmlspecialchars($_POST['study']);
      $skill = isset($_POST['skill']) ? $_POST['skill'] : 0;
      $skor = getSkor($skill);
      $ket = getCategory($skor);
    ?>
      <div class="card">
        <h2>Hasil Perhitungan</h2>
        <hr>
        <table>
          <tr>
            <td>NIM</td>
            <td>:<?= $nim ?></td>
          </tr>
          <tr>
            <td>Nama</td>
            <td>:<?= $nama ?></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:<?= $gender ?></td>
          </tr>
          <tr>
            <td>Program Studi</td>
            <td>:<?= $study ?></td>
          </tr>
          <tr>
            <td>Skill</td>
            <td>:
              <?php
              if ($skill != 0) {
                foreach ($skill as $key => $item) {
                  echo $item;
                  if ($key != count($skill) - 1) {
                    echo ", ";
                  }
                }
              } else {
                echo "Tidak ada yang dipilih!";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>Skor Skill</td>
            <td>:<?= $skor ?></td>
          </tr>
          <tr>
            <td>Kategori Skill</td>
            <td>:<?= $ket ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:<?= $email ?></td>
          </tr>
        </table>
      </div>
    <?php
    }
    ?>

  </div>

</body>

</html>