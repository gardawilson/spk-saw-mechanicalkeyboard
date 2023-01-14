<!DOCTYPE html>
<html lang="en">
  <?php
require "layout/head.php";
require "include/conn.php";
require "W.php";
require "R.php";
?>

  <body>
    <div id="app">
          //pembatas akses sidebar
      <?php
        if(@$_SESSION['role'] == 0){
            require "layout/sidebar.php";
        }
        else{
            require "layout/sidebar_user.php";
        }
         ?>
      <div id="main">
        <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>
        <div class="page-heading">
          <h3>Nilai Preferensi (P)</h3>
        </div>
        <div class="page-content">
          <section class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-header">
                  <h4 class="card-title">Tabel Nilai Preferensi (P)</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <p class="card-text">
                    Nilai preferensi (P) merupakan penjumlahan dari perkalian matriks ternormalisasi R dengan vektor bobot W.</p>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                    <caption>
    Nilai Preferensi (P)
  </caption>
  <tr>
    <th>No</th>
    <th>Alternatif</th>
    <th>Hasil</th>
  </tr>
  <?php
                        

                        
$P = array();
$m = count($W);
$no = 0;
foreach ($R as $i => $r) {
    for ($j = 0; $j < $m; $j++) {
        $P[$i] = (isset($P[$i]) ? $P[$i] : 0) + $r[$j] * $W[$j];
    }

$sql = "UPDATE saw_alternatives SET value_p = '{$P[$i]}' WHERE id_alternative = '{$i}'";
$result = $db->query($sql); 

//    echo "<tr class='center'>
//            <td>" . (++$no) . "</td>
//
//            <td>{$P[$i]}</td>
//          </tr>";

}                              
?>
 
<?php
$sql = 'SELECT name,value_p FROM saw_alternatives ORDER BY value_p DESC';
$result = $db->query($sql); 
$i = 0;
while ($row = $result->fetch_object()) {
    echo "</tr>
            <td>" . (++$i) . "</td>
            <td>{$row->name}</td>
            <td>{$row->value_p}</td>
        </tr>";
}
$result->free();
?>
                        
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <?php require "layout/footer.php";?>
      </div>
    </div>
    <?php require "layout/js.php";?>
  </body>

</html>
