<?php

class Observer
{
    public function update(Subject $subject)
    {
      echo $subject->getFavorites() . "<br>";
    }
}

?>
