<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo (!empty($title) ? $title : "Bedrijfsuitje"); ?></title>
    <link rel="stylesheet" 
     href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/index.php">Personeelsdag 30 Juni 2021</a>
      <?php 
        session_start();
        if(isset($_SESSION['username'])){
          echo "<a href='/admin.php'>Administratiepaneel</a>";
        } else {
          echo '<a href="/login.php">Admin Login</a>';
        }
      ?>
    </div>
  </nav>
 <body>

