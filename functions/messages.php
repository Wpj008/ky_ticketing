<?php 
require_once "data.php";

function createMessage($message, $ticket_id, $user_id){

    try{

        $queryMessage = getPDO()->prepare("INSERT INTO messages(ticket_id, user_id, content_message) VALUES(:ticket_id, :user_id, :message)");

     $queryMessage->bindParam(":ticket_id", $ticket_id);
     $queryMessage->bindParam(":user_id", $user_id);
     $queryMessage->bindParam(":message", $message);

     $queryMessage->execute();

     echo "<p style='color:green;'> Message envoyé </p>";
     exit;

     }catch(PDOException $e){

     echo "<p style='color:red;'> Erreur lors de l'envoie du message : </p>" . $e->getMessage();
     exit;
 }

}


function selectMessage($ticket_id){

$querySelectMessage = getPDO()->prepare("SELECT * FROM messages INNER JOIN users ON users.id_user = messages.user_id INNER JOIN tickets ON tickets.id_ticket = messages.ticket_id WHERE messages.ticket_id = $ticket_id ORDER BY messages.created_at_message ASC");

$querySelectMessage->execute();

$results = $querySelectMessage->fetchAll();

return $results;

}





















?>