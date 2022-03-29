<?php  
// se fichier gere la connexion au site web
 session_start();  
 try  
 {  
      $connect =new PDO('mysql:host=localhost;dbname=my_database;charset=utf8', 'root', 'root'); 
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label> Veuillez saisir tout les champs </label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM users WHERE username = :username AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'  =>  $_POST["username"],  
                          'password'  =>  $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["username"] = $_POST["username"];  
                     header("location:LireRecursDir.php");  
                }  
                else  
                {  
                     $message = '<label> Utilisateur introuvable </label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title> Bienvenue sur la page de connexion </title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <link rel="stylesheet" href="css.css">
      </head>  
      <body class="bodyCo">  
           <br/>  
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <form method="post">
                    <div id='divCo'>  
                    <h3 align="">Connectez-vous pour accéder au catalogue </h3><br />  
                     <label>Nom d'utilisateur</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Mot de passe</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Connexion" />  
            </div>
                </form>  
           </div>  
           <br/>  
      </body>  
 </html>  