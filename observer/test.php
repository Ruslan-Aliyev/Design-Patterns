<?php
//https://sourcemaking.com/design_patterns/observer/php
  require_once("observer.php");
  require_once("subject.php");

  $gossipFan = new Observer();
  $gossiper = new Subject($gossipFan);

  $gossiper->updateFavorites();
  $gossiper->updateFavorites();

?>
