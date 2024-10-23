<?php
require_once('../database/Db.php');

function getDb(){
    return Db();
}


function inscription(){
    $messages = [];
    $valid = false;

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $passwordConfirm = htmlspecialchars($_POST["passwordConfirm"]);

    if(
        !empty($pseudo) &&
        !empty($email) &&
        !empty($password) &&
        !empty($passwordConfirm) 
    ){
        $pseudoLength = strlen($pseudo);

        if($pseudoLength <= 12){
            $emailExist = getDb()->prepare("SELECT * FROM users WHERE email = ?" );
            $emailExist->execute([$email]);
            $emailValid = $emailExist->rowCount();

            if($emailValid === 0) {

                if(isset($_FILES['image']) && $_FILES['image']['error'] === 0){
                    if($password === $passwordConfirm){
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $valid = true;
                        }else{
                            $messages [] = "votre email n'est pas valid";
                        }

                    }else {
                        $messages[] = 'vérifier votre password';
                        
                    }
                    
                }else {
                    $messages[] = 'vérifier votre fichier';
                }
            }else {
                $messages[] = 'Cette email est deja utilisé';
            }
        } else {
            $messages [] = "votre pseudo est trop long";

        }
    }else {
        $messages [] = "veiller remplir tous les champs";
    }

    if($valid=== true){
        
        //information sur l'image
        $infoImage = pathinfo($_FILES['image']['name']);
        //prendre l'extension = jpg ou png...
        $extension = $infoImage['extension'];  
        //nom de l'image aleatoire 
        $image = rand() .'.'. $extension; 
            //416645.jpg

        move_uploaded_file($_FILES['image']["tmp_name"], '../upload/'. $image);

        //insertion dans la base
        $request = getDb()->prepare('INSERT INTO users(pseudo, email, password, profile, role) VALUES(:pseudo, :email, :password, :profile, "user")');
        $request-> execute([
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => sha1($password),
            'profile' => $image
        ]);

            unset($_POST['pseudo']);
            unset($_POST['email']);
            unset($_POST['passsword']);
            session_start();

            header('Location:profile.php');
    }

    return $messages;
}

function connexion() {
     $email = htmlspecialchars($_POST['email']);
     $password = sha1($_POST['password']);

     if(!empty($_POST['email']) && !empty($_POST['password'])){
        $request = getDb()->prepare("SELECT * FROM users WHERE email=?  AND password=?");
        $request->execute([ $email,$password]);

        $valid = $request->rowCount();
        if($valid !== 0) {
            $userConnect = $request->fetch();
            // var_dump($userConnect);
            session_start();

            $_SESSION['id'] = $userConnect['id'];
            $_SESSION['pseudo'] = $userConnect['pseudo'];
            $_SESSION['email'] = $userConnect['email'];
            $_SESSION['password'] = $userConnect['password'];
            $_SESSION['profile'] = $userConnect['profile'];
            $_SESSION['role'] = $userConnect['role'];
            $_SESSION['auth'] = true;

            header('Location:accuil.php');
        }else{
            $messages[] = "Vérifier votre mot de pass";
        }

     }else {
        $messages[] = 'Veiller remplir tous les champs';
    }

    return $messages;
}


function commenter(){
    $messages = [];
    $commentaire = htmlspecialchars($_POST["commentaire"]);
    $id_user = intval($_SESSION['id']);

    if(!empty($_POST['commentaire'])){


        
        $request = getDb()->prepare("INSERT INTO avis(commentaires,id_user) VALUES(:commentaires, :id_user)");

        $request->execute([
            "commentaires" => $commentaire,
            "id_user" => $id_user

        ]);

        $messages [] = 'votre avis a été posté';
    }else{
        $messages [] = 'veiller entre votre avis';
    }
    return $messages;
}

function showCommentaires(){
    // $request = getDb()->query("SELECT
    //   * FROM avis ORDER BY id DESC");
    $request = getDb()->prepare("SELECT
        a.id,
        a.id_user,
        a.commentaires,
        a.createdAt,
        u.profile,
        u.pseudo
    FROM avis AS a 
    INNER JOIN users AS u ON a.id_user = u.id 
    WHERE a.id_user=u.id 
    ORDER BY a.id DESC");
    $request->execute();
    return $request->fetchAll();
}

function select_voyage() {
    $id = intval($_GET["id"]);

    $sql = "SELECT * FROM voyages WHERE id=?";
    $request = getDb()->prepare($sql);
    $request->execute([$id]);

    return $request->fetch();
}

function showGuides() {
    $request = getDb()->query("SELECT * FROM guides ORDER BY id DESC");
    $request->execute();
    return $request->fetchAll();
}
function place(){
    
}



function reservation(){

    $nom =  htmlspecialchars($_POST['nom']);
    $email =  htmlspecialchars($_POST['reservation_email']);
    $contact =  strval(htmlspecialchars($_POST['contact']));
    $lieu =  htmlspecialchars($_POST['lieu']);
    $montant =  strval(htmlspecialchars($_POST['prix']));
    // $montant = strval(htmlspecialchars($_POST['Db_price']));
    $nbrPersonne = strval(htmlspecialchars($_POST['inputNumber']));
    $id_voyage =  strval($_GET['id']);
    $id_user = strval($_SESSION['id']);

    $reservation = false;
    

   
   


    $message =  [];

    if(
        !empty($email) &&
        !empty($nom) &&
        !empty($contact) 
        
    ){
        // echo($nom);
        // echo($email);
        // echo($contact);
        echo($nbrPersonne);
        echo($montant);
        // echo($id_voyage);
        // echo($id_user);




        $request = getDb()->prepare("INSERT INTO reservations(nom,email,contact,lieu,nombrePersonne,montant,id_user,id_voyage) VALUES(:nom, :email,:contact, :lieu, :nombrePeronne, :montant, :id_user, :id_voyage)" );
 



        $request->bindValue(':nom', $nom);
        $request->bindValue(':email', $email);
        $request->bindValue(':contact', $contact);
        $request->bindValue(':lieu', $lieu);
        $request->bindValue(':nombrePeronne', $nbrPersonne, PDO::PARAM_INT);
        $request->bindValue(':montant', $montant);
        $request->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $request->bindValue(':id_voyage', $id_voyage, PDO::PARAM_INT);

        // $request->debugDumpParams();



        $request->execute();

        
        echo($message);
        $reservation = true;







        


    }else{
        $message [] = 'veiller remplir tous les formulaires';

    }

    if($reservation === true){
        $request = getDb()->prepare("SELECT * FROM voyages WHERE id = ?");
        $request->execute([$id_voyage]);
       
        $voyage = $request->fetch();
        var_dump($voyage);
        $nbr = $voyage['nombrePlace'];
        $new_nbrPlace = $nbr - $nbrPersonne;
        $sql = getDb()->prepare("UPDATE voyages SET nombrePlace= ? WHERE id = ?");
        $sql->execute([$new_nbrPlace,$id_voyage]);

        var_dump($voyage);

        // header('Location: ../PayPal-JavaScript-FullStack-Standard-Checkout-Sample-main/client/checkout.php');
        header('Location: voyages.php');
        $message [] = 'votre réservation a été effectuer';
    }

    return $message;

}


