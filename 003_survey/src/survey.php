<?php

  include_once 'db.php';

  class Survey extends DB{

    private $optionSelected;
    private $totalVotes;

    //To obtain the option selected by the user and = to $optionSelected
    public function setOptionSelected($option){
      $this->optionSelected= $option;
    }

    //To return the choice selected
    public function getOptionSelected(){
      return $this->optionSelected;
    }

    /*
    public function vote(){
      $sql= $this->pdo->query('SELECT * FROM languages');
      while($row= $sql->fetch()){
        echo $row->choice. "<br>";
      }
    }
    */

    public function vote(){
      $sql= 'UPDATE languages SET votes = votes + 1 WHERE choice = :choice';
      $query= $this->pdo->prepare($sql);
      $query->execute(['choice'=>$this->optionSelected]);
    }

    public function showResults(){
      $sql= 'SELECT * FROM languages';
      //$query= $this->pdo->query($sql);
      /*
      $results= $query->fetchAll();
      var_dump($results);   //To get all the data as an array
      */
      /*
      while($row= $query->fetch()){
        echo $row->choice. ": ". $row->votes. "<br>";
      }
      */
      //return $this->pdo->query($sql);
      $query= $this->pdo->query($sql);      
      return $query->fetchAll();
    }

    public function getTotalVotes(){
      $sql= 'SELECT SUM(votes) AS total_votes FROM languages';
      $query= $this->pdo->query($sql);
      
      //$this->totalVotes= $query->fetch(PDO::FETCH_OBJ)->total_votes;  //As an object
      //return $this->totalVotes;
      
      $this->totalVotes= $query->fetch()["total_votes"];
      return $this->totalVotes;
    }

    public function getPercentage($votes){
      return round($votes / $this->totalVotes *100, 0);
    }
    
  }

?>