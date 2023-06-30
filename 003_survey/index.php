<?php
include_once 'src/survey.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./src/style.css">
  <title>PHP - SURVEY</title>
</head>

<body>

  <?php
    //$db = new DB();
    //$db->connect();

    $survey = new Survey();
    $showResults = false;

    if ($_POST) {
      if (isset($_POST['langs'])) {
        $showResults= true;
        $survey->setOptionSelected($_POST['langs']);
        $survey->vote();
      }
    }
    //echo "Total votes: " . $survey->getTotalVotes();
  ?>

  <div class="main__form">

    <form action="#" method="post">

      <h2>¿What is your favourite programming language?</h2>

      <?php
      
        if($showResults){
          $languages= $survey->showResults();

          echo "<p>Your vote: ". $survey->getOptionSelected() ."</p>";

          echo "<h3>Total votes: ". $survey->getTotalVotes(). "</h2>";
          //You need to call getTotalVotes() first to obtain totalVotes, so you can
          //calculate the percentage with getPercentage() using that totalVotes value

          foreach($languages as $language){
            //echo $language->choice. ": ". $language->votes. "<br>"; //(PDO::FETCH_OBJ)
            //$percentage= $survey->getPercentage($language->votes); //To get each % (PDO::FETCH_OBJ)
            $percentage= $survey->getPercentage($language["votes"]); //To get each %
            include 'src/views/results.php';
          }

          ?>
          <div class="return"><button>Return</button></div>
          <?php
          
        }else{
          include 'src/views/vote.php';
        }

      ?>

    </form>

  </div>

</body>

</html>