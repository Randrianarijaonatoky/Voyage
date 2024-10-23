<?php 

require_once('../database/Db.php');
// echo "Today is " . date("Y/M/d");


function getDb() {
    return Db();
}


    //// tous les functions Voyages /////////

function addVoyage(){
    $messages = [];
    $content = htmlspecialchars($_POST['desc']);
    $lieu = htmlspecialchars($_POST['lieu']);
    $prix = htmlspecialchars($_POST['prix']);
    $nbrPlace = htmlspecialchars($_POST['nombre']);
    $dateDebut1 = htmlspecialchars($_POST['dateDebut']);
    $dateDebut = date('d F Y', strtotime($dateDebut1));
    $dateFin1 = htmlspecialchars($_POST['dateFin']);
    $dateFin = date('d F Y', strtotime($dateFin1));
    

    // $time = getDb()->query("SELECT createdAt FROM voyages ");
    // $time->execute();
    // echo($time);


    

    $valid = false;

    if(
        !empty($_POST['desc']) &&
        !empty($_POST['lieu']) &&
        !empty($_POST['dateDebut']) &&
        !empty($_POST['dateFin']) &&
        !empty($_POST['nombre']) &&
        !empty($_POST['prix']) 
    ){
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
            if($_FILES['image']['size'] <= 30000000){
                $valid = true;
            }else{

                $messages[] = ' votre fichier est très volumineux';
            }
        }else{

            $messages[] = 'vérifié votre fichier';
        }

    }else {
        $messages [] = 'Champs vide';
    }

    if($valid) {
        $infoImage = pathinfo($_FILES['image']['name']);
        $extension = $infoImage['extension'];
        $extensionArray = ['jpg', 'png', 'jeg', 'gif'];

        if(in_array($extension, $extensionArray)) {
            $image = rand() .'.'.$extension; //46269625.jpg

            move_uploaded_file($_FILES['image']['tmp_name'], '../upload/'. $image);

            $request = getDb()->prepare("INSERT INTO voyages(lieu, dateDebut,dateFin,nombrePlace, prix,content, image) VALUES(?, ?, ?,?, ?, ?, ?)");

            $request->execute([$lieu,$dateDebut,$dateFin,$nbrPlace,$prix,$content,$image]);
            // $request->execute([$lieu, $prix, $dateDebut, $dateFin, $content, $image]);
            // unset($_POST['description']);
            $message[] = 'Le voyage a été poster';

            header('Location: lesVoyages.php ');
        }
    }

    return $messages;




}

function list_voyage(){
   

    
    $request = getDb()->query("SELECT * FROM voyages   ORDER BY id DESC");
    $allVoyage = $request->fetchAll();
    return $allVoyage;
}

function nombre_voyages(){
    $request = getDb()->query("SELECT COUNT(*) AS totalVoyage FROM voyages ");
    return $request->fetch();
}


function delete_voyages(){
    $id = intval($_POST['id_voyage']);
    $request = getDb()->prepare('DELETE FROM voyages WHERE id=?');
    $request->execute([$id]);
    header("Location: lesVoyages.php");
}

// mise a jour voyage

function select_voyage() {
    $id = intval($_GET["id"]);

    $sql = "SELECT * FROM voyages WHERE id=?";
    $request = getDb()->prepare($sql);
    $request->execute([$id]);

    return $request->fetch();
}

//AI
// function update_voyage() {
//     if(isset($_POST['btn_update'])) {
//         $message = [];
//         $id = isset($_POST['id_update']) ? htmlspecialchars($_POST['id_update']) : null;
//         $new_content = isset($_POST["new_desc"]) ? htmlspecialchars($_POST["new_desc"]) : null;
//         $new_lieu = isset($_POST["new_lieu"]) ? htmlspecialchars($_POST["new_lieu"]) : null;
//         $new_prix = isset($_POST["new_prix"]) ? htmlspecialchars($_POST["new_prix"]) : null;
//         $new_dateDebut1 = isset($_POST["new_dateDebut"]) ? htmlspecialchars($_POST["new_dateDebut"]) : null;
//         $new_dateDebut = $new_dateDebut1 ? date('d F Y', strtotime($new_dateDebut1)) : null;
//         $new_dateFin1 = isset($_POST["new_dateFin"]) ? htmlspecialchars($_POST["new_dateFin"]) : null;
//         $new_dateFin = $new_dateFin1 ? date('d F Y', strtotime($new_dateFin1)) : null;

//         $request = getDb()->prepare("SELECT * FROM voyages WHERE id = ?");
//         $request->execute([$id]);
//         $imageDb = $request->fetch()['image'];

//         // Vérification si la clé 'new_image' existe dans $_FILES
//         if(isset($_FILES['new_image']) && !empty($_FILES['new_image']['name'])) {
//             // Informations sur l'image
//             $infoImage = pathinfo($_FILES['new_image']['name']);
//             // Prendre l'extension
//             $extension = $infoImage['extension'];
//             // Nom de l'image aléatoire 
//             $image = rand() . '.' . $extension;
//             move_uploaded_file($_FILES['new_image']['tmp_name'], '../upload/' . $image);
//             unlink('../upload/' . $imageDb);
//         } else {
//             // Utiliser l'image actuelle
//             $image = $imageDb;
//         }

//         $request = getDb()->prepare("UPDATE voyages SET lieu=?, prix=?, dateDebut=?, dateFin=?, content=?, image=? WHERE id=?");
//         $request->execute([$new_lieu, $new_prix, $new_dateDebut, $new_dateFin, $new_content, $image, $id]);

//         header("Location: lesVoyages.php");
//         exit(); // Assurez-vous qu'aucune sortie ne s'est produite avant cette redirection
//     }
// }

// function update_voyage(){
//     $message = [];
//     $id = htmlspecialchars($_POST['id_update']);
//     $new_content = htmlspecialchars($_POST["new_desc"]);
//     $new_lieu = htmlspecialchars($_POST["new_lieu"]);
//     $new_prix = htmlspecialchars($_POST["new_prix"]);
//     $new_dateDebut1 = htmlspecialchars($_POST["new_dateDebut"]);
//     $new_dateDebut = date('d F Y', strtotime($new_dateDebut1));
//     $new_dateFin1 = htmlspecialchars($_POST["new_dateFin"]);
//     $new_dateFin = date('d F Y', strtotime($new_dateFin1));

//     echo($id);

//     $request = getDb()->prepare("SELECT * FROM voyages WHERE id = ? ");
//     $request->execute([$id]);
//     $imageDb = $request->fetch()['image'];

//     //information sur l'image
//     $infoImage = pathinfo($_FILES['new_image']['name']);
//     // prendre l'extension
//     $extension = $infoImage['extension'];
//     // nom de l'image aleatoire 
//     $image = rand() .'.'. $extension;

//     if($_FILES["new_image"]["name"] === ''){
//         $request = getDb()->prepare("UPDATE voyages SET lieu=?, prix=?,  dateDebut=?, dateFin=?, content=?, image=? ");
//         $request->execute([$new_lieu, $new_prix,$new_dateDebut,$new_dateFin,$new_prix,$image]);
//     } else{
//         move_uploaded_file($_FILES['new_image']['tmp_name'], '../upload/' .$image);
//         $request = getDb()->prepare("UPDATE voyages SET lieu=?, prix=?,  dateDebut=?, dateFin=?, content=?, image=?");
//         $request->execute([$new_lieu, $new_prix,$new_dateDebut,$new_dateFin,$new_prix,$image]);

//         unlink('../upload/'. $imageDb);

//     }

//     header("Location: lesVoyages.php");

// }

function update_voyage() {
    
    $message = [];
    $id = isset($_POST['id_update']) ? htmlspecialchars($_POST['id_update']) : null;
    $new_content = isset($_POST["new_desc"]) ? htmlspecialchars($_POST["new_desc"]) : null;
    $new_lieu = isset($_POST["new_lieu"]) ? htmlspecialchars($_POST["new_lieu"]) : null;
    $new_prix = isset($_POST["new_prix"]) ? htmlspecialchars($_POST["new_prix"]) : null;
    $new_dateDebut1 = isset($_POST["new_dateDebut"]) ? htmlspecialchars($_POST["new_dateDebut"]) : null;
    $new_dateDebut = $new_dateDebut1 ? date('d F Y', strtotime($new_dateDebut1)) : null;
    $new_dateFin1 = isset($_POST["new_dateFin"]) ? htmlspecialchars($_POST["new_dateFin"]) : null;
    $new_dateFin = $new_dateFin1 ? date('d F Y', strtotime($new_dateFin1)) : null;

    if(!empty($_POST['new_desc'])){

        $request = getDb()->prepare("SELECT * FROM voyages WHERE id = ?");
        $request->execute([$id]);
        $sary =  $request->fetch();
        $imageDb = $sary['image'];


        // Vérification si la clé 'new_image' existe dans $_FILES
        if(isset($_FILES['new_image']) && !empty($_FILES['new_image']['name'])) {
            // Informations sur l'image
            $infoImage = pathinfo($_FILES['new_image']['name']);
            // Prendre l'extension
            $extension = $infoImage['extension'];
            // Nom de l'image aléatoire 
            $image = rand() . '.' . $extension;

            $request = getDb()->prepare("UPDATE voyages SET lieu=?, prix=?, dateDebut=?, dateFin=?, content=?, image=? WHERE id=?");
            $request->execute([$new_lieu, $new_prix, $new_dateDebut, $new_dateFin, $new_content, $imageDb, $id]);
        } else {
            $image = $imageDb;
            move_uploaded_file($_FILES['new_image']['tmp_name'], '../upload/' . $image);
            // Utiliser l'image actuelle
            $request = getDb()->prepare("UPDATE voyages SET lieu=?, prix=?, dateDebut=?, dateFin=?, content=?, image=? WHERE id=?");
            $request->execute([$new_lieu, $new_prix, $new_dateDebut, $new_dateFin, $new_content, $image, $id]);
            unlink('../upload/' . $image);
        }
    }




    // header("Location: lesVoyages.php");
    exit(); // Assurez-vous qu'aucune sortie ne s'est produite avant cette redirection
}



//// tous les functions utilisateurs /////////

function list_user(){
    $request = getDb()->query("SELECT * FROM users  WHERE role='user' ORDER BY id DESC ");
    $alluser = $request->fetchAll();
    return $alluser;
}

function nombre_users(){
    $request = getDb()->query("SELECT COUNT(*) AS totalUser FROM users WHERE     role='user' ");
    return $request->fetch();
}

function delete_users(){
    
    $id = intval($_POST['id_user']);

    $request = getDb()->prepare('DELETE FROM users WHERE id=?');
    $request->execute([$id]);
    header('Location: lesUtilisateur.php');
}

function nombre_admin(){
    $request = getDb()->query("SELECT COUNT(*) AS totalAdmin FROM users WHERE role='admin' ");
    return $request->fetch();
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

function delete_comments(){
    $id = intval($_POST['id_comments']);
    $request = getDb()->prepare('DELETE FROM avis WHERE id=?');
    $request->execute([$id]);
    header('Location: dashboard.php');
}


//recherche///
function recherche_voyage(){
    $query = htmlspecialchars($_POST['query']);
    $messages = [];
    $valid = true;





    $recherche = getDb()->prepare("SELECT * FROM voyages WHERE lieu LIKE :query ORDER BY id DESC");; //alaiko ny rehetra ao amni tableau post ka jereko raha ahitanaa qurey eo amni content
    $recherche->execute([
        "query" => '%' . $query . '%' //raha teny eo anolona na mis reny ao arihana
    ]);
        
    


    $data = $recherche->fetchAll();
    return $data;
}


// reservation

function showReservation(){
    $request = getDb()->prepare("SELECT
        r.id,
        r.id_user,
        r.id_voyage,
        r.nom,
        r.lieu,
        r.nombrePersonne,
        r.montant,
        r.email,
        r.contact, 
        u.profile,
        v.lieu
        
        FROM reservations AS r 
        INNER JOIN users AS u ON r.id_user = u.id 
        INNER JOIN voyages AS v ON r.lieu = v.lieu
        WHERE r.id_user=u.id 
        ORDER BY r.id DESC"
    );
    $request->execute();
    return $request->fetchAll();
}


function nbr_reservation(){
    $request = getDb()->query("SELECT COUNT(*) AS totalReservation FROM reservations ");
    return $request->fetch();
}

function montant_reservation(){
    $request = getDb()->query("SELECT COUNT() AS montant FROM resrvation(montant)");
    return $request->fetch();
}