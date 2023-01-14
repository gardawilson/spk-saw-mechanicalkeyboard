<!DOCTYPE html>
<html lang="en">
  <?php
require "layout/head.php";
require "include/conn.php";
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
          <h3>Bobot Kriteria</h3>
        </div>
        <div class="page-content">
          <section class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-header">
                  <h4 class="card-title">Tabel Bobot Kriteria</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <p class="card-text">Pengambil keputusan memberi bobot preferensi dari setiap kriteria dengan
                      masing-masing jenisnya (keuntungan/benefit atau biaya/cost):</p>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                    <caption>
    Tabel Kriteria C<sub>i</sub>
  </caption>
  <tr>
    <th>No</th>
    <th>Simbol</th>
    <th>Kriteria</th>
    <th>Bobot</th>
    <th colspan="2">Atribut</th>
  </tr>
  <?php
$sql = 'SELECT id_criteria,criteria,weight,attribute FROM saw_criterias';
$result = $db->query($sql);
$i = 0;

if(@$_SESSION['role'] == 0){
while ($row = $result->fetch_object()) {
    echo "<tr>
        <td class='right'>" . (++$i) . "</td>
        <td class='center'>C{$i}</td>
        <td>{$row->criteria}</td>
        <td>{$row->weight}</td>
        <td>{$row->attribute}</td>
        <td>
            <a href='bobot-edit.php?id={$row->id_criteria}' class='btn btn-info btn-sm'>Edit</a>
            </td>
      </tr>\n";
}}
else{
while ($row = $result->fetch_object()) {
    echo "<tr>
        <td class='right'>" . (++$i) . "</td>
        <td class='center'>C{$i}</td>
        <td>{$row->criteria}</td>
        <td>{$row->weight}</td>
        <td>{$row->attribute}</td>
        <td>
            <a href='bobot-edit-user.php?id={$row->id_criteria}' class='btn btn-info btn-sm'>Edit</a>
            </td>
      </tr>\n";
}
    
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