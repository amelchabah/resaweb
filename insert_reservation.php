<?php
/*inserer les infos privees dans la bdd + mail aux client ET gestionnaire*/

include("connexion.php");
$nom_destination = $_POST["nom_destination"];
$nb_voyageurs = $_POST["nb_voyageurs"];
$date_depart = $_POST["date_depart"];
$date_retour = $_POST["date_retour"];
$lieu_depart = $_POST["lieu_depart"];
$client_nom = $_POST["client_nom"];
$client_prenom = $_POST["client_prenom"];
$client_mail = $_POST["client_mail"];
$client_tel = $_POST["client_tel"];
$prix = $_POST["prix"];
$prix_total = intval($nb_voyageurs) * intval($prix);

/*inserer ces donnees dans la bdd...*/
$requete = "INSERT INTO reservation (nom_destination,nb_voyageurs,date_depart,date_retour,lieu_depart,client_nom,client_prenom,client_mail,client_tel,prix_total) VALUES ('$nom_destination','$nb_voyageurs','$date_depart','$date_retour','$lieu_depart','$client_nom','$client_prenom','$client_mail','$client_tel','$prix_total')";
$db->query($requete);



/*ecriture du mail pour le client, en html (pour mail stylisé, plus lisible et formaté)*/

$mailTo = "$client_mail";
$subject = "Your booking was successfully confirmed!";
$from = 'amel.chabah@edu.univ-eiffel.fr';

// type de contenu (HTML)

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();



// $headers = "From: amel.chabah@edu.univ-eiffel.fr/r/n";
// $headers .= "Content-type: text/html";

// message HTML
$message = '<div style="font-family:noto sans, sans-serif"><h3>Thanks ' . $client_prenom . ' !</h3><h4>Your booking for <span style="color:#4040bf">' . $nom_destination . '</span>, from <span style="color:#4040bf">' . $lieu_depart . '</span>, ' . date('M d, Y', strtotime($date_depart)) . ' to '  . date('M d, Y', strtotime($date_retour)) . ' for ' . $nb_voyageurs . ' passenger(s) has been confirmed.</h4><h4>Total price : $ ' . number_format($prix_total, 0, ".", ",") . '</h4><h6><i>Your phone number : ' . $client_tel . ' </i></h6><hr><p>If you need to modify any information above, please leave a mail to : <b>amel.chabah@edu.univ-eiffel.fr</b>. We will reply as soon as possible.</p><h4>See you in space!</h4></div>';

mail($mailTo, $subject, $message, $headers);
header("Location: thankyou.html");
?>

<?php
/*ecriture du mail pour le gestionnaire, en html*/

$headers = "Content-type: text/html; charset=utf-8\n";
$subject = "New booking!";
$mailTo = "amel.chabah@edu.univ-eiffel.fr";
$message = '<div style="font-family:noto sans, sans-serif"><h4>' . $client_prenom . ' ' . $client_nom . ' booked a trip for <b>' . $nom_destination . '</b> :</h4><p>From <b>' . $lieu_depart . '</b>, ' . $date_depart . ' to ' . $date_retour . ' for ' . $nb_voyageurs . ' passenger(s).</p>
<ul><li><b>Total price</b> : $ ' . number_format($prix_total, 0, ".", ",") . '</li><li><b>Mail</b> : ' . $client_mail . '</li><li><b>Phone number</b> : ' . $client_tel . '</li></ul></div>';

mail($mailTo, $subject, $message, $headers);
header("Location: thankyou.html");

?>
