        <?php
        $continent = $_SESSION['continent'];
        if (!empty($_POST['category'])){
            $category = $_POST['category'];
        }else{
             $category = "Sports";
        }
        ?>
        <div class="continentInfos">
            <p class="title">Most popular cities in <?php echo($continent)?> by category <?php echo(strtolower($category))?></p>
<div class="row">
        <form class="col s12" action="#" method="post">
        <div class="row">
            <div class="input-field col s6">
                <select id="main" name="category">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="Driving">Driving</option>
                    <option value="Sports">Sports</option>
                    <option value="Music">Music</option>
                    <option value="Party">Party</option>
                    <option value="Markets">Markets</option>
                    <option value="Events">Events</option>
                    <option value="Shopping">Shopping</option>
                    <option value="Nature">Nature</option>
                    <option value="Sophistication">Sophistication</option>
                    <option value="Water">Water</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Relaxation">Relaxation</option>
                    <option value="Surfing">Surfing</option>
                    <option value="Animals">Animals</option>
                    <option value="Skydiving">Skydiving</option>
                    <option value="Kayaking">Kayaking</option>
                    <option value="Food&Drink">Food and Drink</option>
                    <option value="Nightlife">Nightlife</option>
                    <option value="Fun">Fun</option>
                    <option value="Biking">Biking</option>
                    <option value="Outlook">Outlook</option>
                    <option value="Art">Art</option>
                    <option value="Wintersports">Wintersports</option>
                    <option value="Hiking">Hiking</option>
                    <option value="Outlook">Outlook</option>
                    <option value="Culture">Culture</option>
                    <option value="Tours">Tours</option>
                    <option value="Diving">Diving</option>
                    <option value="Sightseeing">Sightseeing</option>
                </select>
                <label>Filter Top Cities for </label>
            </div>
            <div class="input-field col s6">
               <input type="submit" class="waves-effect waves-light btn" id ="filterButton" value="filter">
            </div>
            </div>
            </form>     
            </div>
            <?php 

            $array = loadCSV("data/".$continent.".csv");
            $index = getIndexOfAttraction($category,$array);
            $array = getSortedArray($index, $array);

            for($i = 0; $i<count($array); $i++) {
                $city = $array[$i];
                ?>
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="../images/<?php echo(strtolower($continent))?>/<?php echo($city["name"])?>.jpg">
                        <span class="caption"><?php echo($i+1)?></span>
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?php echo($city["name"])?>
                            <i class="right">rank <?php echo(round($city["rank"],2))?></i>
                        </span>
                        <p><a href="../cities/<?php echo($city["name"])?>">More Infos</a></p>
                    </div>
                </div>
                    
                <?php
            }
            ?>
        <div class="continentBreak"> </div>
        <?php


        
        $path = "images\\betweenness\\".$continent.".png";
        $dir = __DIR__;
        $dir = explode("views", $dir);
        if (file_exists($dir[0].$path)){
          ?>
             <div>
            
            <h4>Betweenness</h4>
      <div class="col s12 m12"><img class="padding" src="./../images/betweenness/<?php echo $continent ?>.png" ></div>                
        </div> 
          <?php

        }



        $path = "images\\".$continent."\\".$continent.".png";
        $dir = __DIR__;
        $dir = explode("views", $dir);
        if (file_exists($dir[0].$path)){
          ?>
             <div>
      <div class="col s12 m12"><img class="padding" src="../images/<?php echo $continent ?>/<?php echo $continent ?>.png" ></div>                
        </div> 
        <?php
        }
      ?>
           
        </div>
       
        
        <?php

        function getIndexOfAttraction($key,$data){
            $result = -1;
            for($i = 0; $i<count($data[3]); $i++) {
                if($data[0][$i] == $key) {
                    $result = $i;
                }
            }
            return $result;
        }

        function getSortedArray($index, $data) {
            $cities;
            $rank;
            for($i = 1; $i<count($data); $i++) {
                $cities[$i]=$data[$i][0];
                $rank[$i]=$data[$i][$index];
            }
            array_multisort($rank,SORT_DESC, $cities);
            $result;
            for($i = 0; $i<count($cities); $i++) {
                $result[$i]["name"]=$cities[$i];
                $result[$i]["rank"]=$rank[$i];
            }
            return $result;
        }
        ?>
