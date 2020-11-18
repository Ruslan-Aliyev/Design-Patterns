<?php

class Subject
{
    private $observer;

    function __construct(Observer $observer) 
    {
      $this->observer = $observer;
    }

    function notify() 
    {
      $this->observer->update($this);
    }

    function updateFavorites() 
    {
      $this->notify();
    }

    function getFavorites() 
    {
      return "Dummy Update Notice";
    }
}

?>
