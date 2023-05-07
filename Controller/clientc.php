<?php
include 'C:\xampp\htdocs\First_SUII\projet\config.php';
include 'C:\xampp\htdocs\First_SUII\projet\View\tojrab03\entite\client.php';

class clientc
{
function ajouter_client ($client)
{
$sql="insert into user (nom,prenom,telephone,adresse,email,login,mdp,type,code) VALUES(:nom,:prenom,:telephone,:adresse,:email,:login,:mdp,:type,:code) ";
$db=config::getConnexion();
$mdp = $client->getMdp();
$mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
try
{
    $req = $db->prepare($sql);

    $login = $client->getlogin();

    $nom = $client->getnom();
    $prenom = $client->getprenom();
    $telephone = $client->getTelephone();
    $email = $client->getemail();
    $adresse = $client->getadresse();
    $type=$client->getType();
    $code=$client->getCode();
    
    $req->bindValue(':login',$login);
    $req->bindValue(':type',$type);
    $req->bindValue(':mdp', $mdp_hash);
    $req->bindValue(':nom', $nom);
    $req->bindValue(':prenom', $prenom);
    $req->bindValue(':telephone', $telephone); 
    $req->bindValue(':email', $email);
    $req->bindValue(':adresse', $adresse);

    $req->bindValue(':code',$code);
    $req->execute();
    //echo "<script>alert('added ');</script>";


}
catch (Exception $e) {
    echo 'Erreur:' . $e->getMessage();
 //echo "<script>alert('Email is already used ');</script>";

}
}

function ajouterClientimg($email,$image)
{
    $sql="UPDATE user SET image=:image WHERE email=:email";
    $db = config::getConnexion();
    try
        {
        $req=$db->prepare($sql);
        $req->bindValue(':email',$email);
        $req->bindValue(':image',$image);
        $req->execute();
        }
    catch (Exception $e)
        {
            echo 'Erreur: '.$e->getMessage();
        }
    }

function deleteClient($id)
    {
        $sql = "DELETE FROM user WHERE idclient = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

function modifier_client($client, $idclient)
{
    $sql = "UPDATE user SET nom=:nom_client,prenom=:prenom_client,telephone=:telephone_cl,adresse=:adresse_cl,email=:email,mdp=:mdp_cl WHERE idclient=:idclient";

    $db = config::getConnexion();
    try {
        $req = $db->prepare($sql);

      
    $mdp = $client->getMdp();
     $nom = $client->getnom();
     $prenom = $client->getprenom();
     $telephone = $client->getTelephone();
     $email = $client->getemail();
     $adresse = $client->getadresse();

        $req->bindValue(':idclient',$idclient);
        $req->bindValue(':mdp_cl', $mdp);
        $req->bindValue(':nom_client', $nom);
        $req->bindValue(':prenom_client', $prenom);
        $req->bindValue(':telephone_cl', $telephone); 
        $req->bindValue(':email', $email);
        $req->bindValue(':adresse_cl', $adresse);
    
    

        $req->execute();
    } catch (Exception $e) {
        echo " Erreur ! " . $e->getMessage();
    }
}

function afficher_client($client)
    {
        //echo "Id: " . $client->getId() . "<br>";
        echo "Nom: " . $client->getnom() . "<br>";
        echo "Prenom: " . $client->getprenom() . "<br>";
        echo "Telephone: " . $client->getTelephone() . "<br>";
        echo "Adresse: " . $client->getadresse() . "<br>";
        echo "Email: " . $client->getemail() . "<br>";
        echo "Login: " . $client->getlogin() . "<br>";
        echo "Mot de passe: " . $client->getmdp() . "<br>";
        echo "type: " . $client->getType() . "<br>";
    }


    function showclient()
    {

        $sql = "select * from user";
        $db = config::getConnexion();
        try 
        {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e)
        {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function modifier_mdp($client,$login,$mdp)
    {
        $query = "UPDATE user set mdp=:mdp where login=:login";
        $db=config::getConnexion();
        try
        {
            $req=$db->prepare($query);
            $login = $client->getlogin();
            $mdp = $client->getmdp();
            $req->bindValue(':mdp',$mdp);
            $req->bindValue('login',$login);
            $req->execute();
        }
        catch(Exception $e)
        {
            die('Erreur'.$e->getMessage());
        }
    }

   
function getAllUsers() {
    $con = config::getConnexion();
    $requete = 'SELECT * from user';
    $rows = $con->query($requete);
    return $rows;
}

function updateUser($id,$nom,$prenom,$type,$telephone,$adresse,$email,$login,$mdp,$image,$code)
 {

    $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
    try {
        $con = config::getConnexion();
        $sql = "UPDATE user set nom= '$nom',prenom='$prenom',  telephone='$telephone',adresse='$adresse', email='$email',login='$login',mdp='$mdp_hash',type='$type',image='$image', code=''$code'' WHERE idclient='$id'";
    
        $stmt = $con->query($sql);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}




   
}
    


//$client1= new client("balsem","zakraoui","med",16,"edqdqsd","@lioo","hhju","211"); 
//$client3= new client("Wiem","zakraoui","patient",50546498,"siliana","@esprit.tn","login10","ll"); 
$c=new clientc ;

//$c->createUser($client3);
//$c->deleteClient(165);
//$c->updateUser(179,"alison","and",4654654,"LA","@email","211jft","eb163727917cbba1eea2","doctor");



















?>