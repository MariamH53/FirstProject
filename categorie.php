<?php
session_start();
include("config.php");
if (isset($_GET["nom_catégorie"])) {
  $nom = $_GET["nom_catégorie"];
  $sql = "INSERT INTO categorie(id_catégorie,nom_catégorie) VALUES (null,'$nom')";
  if (mysqli_query($con, $sql)) {
  } else {
    echo mysqli_error($con);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catégorie</title>
</head>

<body>

<?php

if (isset($_SESSION["email"])) {
  if ($_SESSION["rôle"] != "Admin") {
    echo 'you are not allowed';
  } else {
?>


  <form style=width:30%;margin:auto>

    <div class="form-group">
      <label for="exampleInputPassword1">Nom catégorie</label>
      <input type="text" name="nom_catégorie" class="form-control" id="exampleInputPassword1">
    </div>
    

        <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <br>
  <table class="table" style=width:30%;margin:auto>
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nom Catégorie</th>

      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "Select * from categorie order by nom_catégorie desc";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <tr>
          <th scope="row"><?php echo $row["id_catégorie"] ?></th>
          <td><?php echo $row["nom_catégorie"] ?></td>

        </tr>
      <?php } ?>
    </tbody>
  </table>

  <br>
  <?php  }
      } else {



        header("Location:login.php");
      }


          ?>
</body>

</html>