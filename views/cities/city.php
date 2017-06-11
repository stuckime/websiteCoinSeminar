
    <div class="row">
    <?php 
      $city = $_SESSION['city'];
      $city = urldecode($city);
      $attractions = getCityAttractions($city);
    ?>
      <h2><?php echo $city ?></h2>
      
      <div class="border col s12 m12">
      <?php for($i = 0; $i<count($attractions); $i++) {
        $attraction = $attractions[$i];
        ?>
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="images/africa/algier.jpg">
            <span class="caption"><?php echo($i+1)?></span>
          </div>
          <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><?php echo($i+1)?>
            <i class="right"><?php echo($attraction["name"])?></i>
          </span>
        </div>
      </div>
      <?php
        }
      ?>
      <div>
      <div class="border col s12 m12"><img src="../images/wordcloud.png"></div>
      <div class="border col s12 m6"><img src="../images/dia1.png"></div>
      <div class="border col s12 m6">This div is 6-columans wide. Text text text Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </div>
    </div>

  <?php

function getCityAttractions($city) {
    $attractions;
    $attraction;
    $rank;
    $row = 0;
    $index = 0;
    $continent = getContinentOfCity($city);
    if (($handle = fopen("data/".$continent.".csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
          
            if($row == 0) {
              $attractions[0] = $data;
            } elseif ($data[0] == $city) {
              $attractions[1] = $data;
            }
            $row++;
        }
        fclose($handle);
    }
    for($i = 1; $i<count($attractions[0]); $i++) {
      if($attractions[1][$i] > 0){
                $attraction[$i]=$attractions[0][$i];
                $rank[$i]=$attractions[1][$i];
      }    
    }
    array_multisort($rank,SORT_DESC, $attraction);
    for($i = 0; $i<count($attraction); $i++) {
        $result[$i]["name"]=$attraction[$i];
        $result[$i]["rank"]=$rank[$i];
    }
    return $result;            
}
  ?>
