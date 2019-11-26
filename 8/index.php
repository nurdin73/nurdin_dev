<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Buku</title>
  </head>
  <body>
    <div class="container mt-4">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">
        Tambah Buku
      </button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahcat">
        Tambah Kategori
      </button>

      <div class="container">
        <hr>
        
        <?php
        include_once 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM category");
        while ($cat = mysqli_fetch_array($query)) {
        ?>
        <h2 class="text-muted font-weight-bold"><?= $cat['name'] ?></h2>
        <div class="row">
          <?php
          include_once 'koneksi.php';
          $id = $cat['id'];
          $query1 = mysqli_query($conn, "SELECT * FROM books WHERE category_id='$id'");
          while ($buku = mysqli_fetch_array($query1)) {
          ?>
          <div class="col-sm-4">
            <div class="card">
              <img src="img/<?= $buku['image'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text"><a href="#" data-toggle="modal" data-target="#detail<?= $buku['id'] ?>" class="text-muted font-weight-bold text-decoration-none"><?= $buku['name'] ?></a> <span class="float-right">Stock : <?= $buku['stock'] ?></span></p>
                <?php
                if ($buku['stock'] == 0) : ?>
                  <a href="#" class="btn btn-primary btn-sm float-left disabled" disabled>Pinjam</a>
                <?php else : ?>
                  <a href="pinjam.php?id=<?= $buku['id'] ?>" class="btn btn-primary btn-sm float-left" onclick="return confirm('Apakah anda ingin meminjam buku ini?')">Pinjam</a>
                <?php endif; ?>
                <a href="kembalikan.php?id=<?= $buku['id'] ?>" class="btn btn-warning btn-sm float-right">Kembalikan</a>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
        <?php } ?>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah buku</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="tambah.php" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Buku</label>
                  <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama buku">
                </div>
                <div class="form-group">
                  <label for="stok">Stock</label>
                  <input type="number" class="form-control" name="stok" id="stok" aria-describedby="emailHelp" placeholder="Stock">
                </div>
                <div class="form-group">
                  <label for="desk">Deskripsi</label>
                  <input type="text" class="form-control" name="desk" id="desk" aria-describedby="emailHelp" placeholder="Deskripsi">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Kategori</label>
                  <select class="form-control" name="category" id="exampleFormControlSelect1">
                    <?php
                      include_once 'koneksi.php';
                      $cate = mysqli_query($conn, "SELECT * FROM category");
                      while ($ca = mysqli_fetch_array($cate)) {
                    ?>
                    <option value="<?= $ca['id'] ?>"><?= $ca['name'] ?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="img">Pilih cover</label>
                <input type="file" name="img" id="img" aria-describedby="emailHelp" placeholder="Stock">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
      <div class="modal fade" id="tambahcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah kategori</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="tambah-kategori.php" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Kategori</label>
                  <input type="text" class="form-control" name="kategori" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama kategori">
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
    include_once 'koneksi.php';
    $quer = mysqli_query($conn, "SELECT books.name,image,deskripsi,stock,category.name,books.id FROM books INNER JOIN category ON category.id=books.category_id");
    while ($b = mysqli_fetch_array($quer)) {
    ?>
    <div class="modal fade" id="detail<?= $b[5] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-5">
                  <img src="img/<?= $b[1] ?>" class="img-fluid img-thumbnail">
                </div>
                <div class="col-md-7">
                  <table class="table table-striped">
                    <tr>
                      <th scope="col">Nama Buku</th>
                      <td><?= $b[0] ?></td>
                    </tr>
                    <tr>
                      <th scope="col">Stock Buku</th>
                      <td><?= $b[3] ?></td>
                    </tr>
                    <tr>
                      <th scope="col">Deskripsi</th>
                      <td><?= $b[2] ?></td>
                    </tr>
                    <tr>
                      <th scope="col">Nama Buku</th>
                      <td><?= $b[4] ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>


    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>