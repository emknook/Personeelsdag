<?php  
include 'includefiles/header.php'; 

$errors = [];
if(isset($_POST['submit'])) {
    session_start();
    require "includefiles/config.php";
    require "includefiles/common.php";
    if($_POST['username'] == '') {
        $errors['username'] = 'Gebruikersnaam is niet ingevuld';
    }
    if($_POST['password'] == '') {
        $errors['password'] = 'Wachtwoord is niet ingevuld';
    }
    if(count($errors) == 0){
        try {
            $connection = new PDO($dsn, $username, $pass, $options);
            
            $sql = "SELECT users.username, users.password FROM users WHERE username =  ?";
            $statement = $connection->prepare($sql);
            $statement->execute([$_POST['username']]);
            $result = $statement->fetchAll();
            $hash = $result[0]['password'];
                
            if(password_verify($_POST['password'], $hash)){
                $_SESSION['username'] = $result[0]['username'];
                header('Location: admin.php');
            }
            else {
                echo 'Wrong password';
            }


        } catch(PDOException $error) {
              echo $sql . "<br>" . $error->getMessage();
        }
    } else {
        echo ($errors['password']);
    }
}
?>
<div class="container">
    <div class="row justify-content-center">
        <form class="form-signin" method="post">
            <div class="form-group">
                <h1 class="h3 mb-3 font-weight-normal">Inloggen</h1>
                <label class="sr-only">Email address</label>
                <input type="text"  class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <input class="btn btn-primary" type="submit" value="Sign in" name="submit">
        </form>
    </div>
</div>
    
<?php include 'includefiles/footer.php'; ?> 