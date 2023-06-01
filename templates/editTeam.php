<!DOCTYPE html>
<html>
<head>
 <title>Edit Data Team</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">LIST MEMBER</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../team.php">Team</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 
 <form method="post" action="../team.php">
 
 <br><br><div class="card p-5">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Edit Data Team </h1>
 </div><br>
 <input type="text" name="id_edit" value="<?php echo $_GET['id_team']; ?>" class="form-control" hidden> <br>

 <label> Nama Team: </label>
 <input type="text" name="nama_team" value="<?php echo $_GET['nama_team']; ?>" class="form-control"> <br>

 <label> Pelatih Team: </label>
 <input type="text" name="pelatih_team" value="<?php echo $_GET['pelatih_team']; ?>" class="form-control"> <br>

 <button type="submit" name="edit" class="btn btn-primary mt-3">Edit</button><br>

 </div>
 </form>
 </div>
</body>
</html>