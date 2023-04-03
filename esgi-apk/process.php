<?php
if (isset($_POST["ok"])) {
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['somme']) 
    && isset($_POST['filiere'], $_POST['mois'], $_POST['anne'], $_POST['numInscription'])) {

        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $numInsc=$_POST['numInscription'];
        $somme=$_POST['somme'];
        $filiere=$_POST['filiere'];
        $mois=$_POST['mois'];
        $anne=$_POST['anne'];
        $paymentDateTime = date("d/m/y H:i:s");
        $paymentAddress = ' Avenue Mohamed VI N 24-Errachidia.Tel: 05 35 57 13 83 ';

        require("config/connexion.php");

        // Prepare a SELECT query to retrieve the last index from the recu table
        $stmt = $db->prepare('SELECT MAX(idRecu) FROM recu');

        // Execute the query
        $stmt->execute();

        // Fetch the result
        $last_index = $stmt->fetchColumn();


        // Check if the last_index is null
        if ($last_index === null) {
        // Set the last_index to zero if it is null
          $last_index = 0;
        }

        // Increment the index by 1

        $index = $last_index + 1;

        // Add leading zeros to make the index 5 characters long
        $index = str_pad($index, 5, '0', STR_PAD_LEFT);

        echo $index;
        echo $numInsc;

 
        // $insert = "INSERT INTO recu VALUES ('$index' , '$somme' , '$mois', '$date', $numInsc)";
        // $db->exec($insert);
        
        // Prepare your SQL statement with placeholders for the values
$statement = $db->prepare("INSERT INTO recu (idRecu, lasomme, mois, anne , numInscription) VALUES (:idRecu, :lasomme, :mois, :anne, :numInscription)");

// Bind the values for the placeholders
$statement->bindParam(':idRecu', $index);
$statement->bindParam(':lasomme', $somme);
$statement->bindParam(':mois', $mois);
$statement->bindParam(':anne', $anne);
$statement->bindParam(':numInscription', $numInsc);

// Execute the statement to insert the new row
$statement->execute();
echo" row added successfully ";


  require_once __DIR__ . '/vendor/autoload.php'; // Include mPDF library
  // Set page properties

  $html = '<img src="./assets/esgi-3.png" width="200"/><br>';
  $html .= '<center><h4 style="text-align: center;">Recu N : '. $index .'</h4><center>';
  $html .= '<div align="right">' . $paymentDateTime . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><br>';
  $html .= 'De Mr/Melle : ' . $prenom . ' '. $nom . '<br>';
  $html .= 'Numero d\'inscription : '. $numInsc . '<br>';
  $html .= 'La somme de : ' . $somme . ' <B>MAD</B><br>';
  $html .= 'Filiere : ' . $filiere . '<br>';
  $html .= 'Mois : ' . $mois . '<br>';
  $html .= 'La date : ' . $anne. '<br>';
  $html .= 'Adresse : ' . $paymentAddress . '<br>';

// Define the signature text
$signature = 'Signature';

// Add the signature text to the HTML form
$html .= '<div align="right">' . $signature . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>';

$mpdf = new \Mpdf\Mpdf();


$mpdf->WriteHTML($html);
$mpdf->Output('form-data.pdf', 'D');
        
    }
}
?>