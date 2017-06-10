        <?php
        $continent = $_GET['continent'];
        $category = $_GET['category'];
        ?>
        <div class="continentInfos">
            <p class="title">Most popular cities in <?php echo($continent)?> by category <?php echo(strtolower($category))?></p>

            <?php 

            $array = loadCSV("data/".$continent.".csv");
            $index = getIndexOf($category,$array);
            $array = getSortedArray($index, $array);

            for($i = 0; $i<count($array); $i++) {
                $city = $array[$i];
                ?>
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="images/<?php echo($continent)?>/<?php echo($city["name"])?>.jpg">
                        <span class="caption"><?php echo($i+1)?></span>
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?php echo($city["name"])?>
                            <i class="right">rank <?php echo(round($city["rank"],2))?></i>
                        </span>
                        <p><a href="cities/<?php echo($city["name"])?>">More Infos</a></p>
                    </div>
                </div>
                    
                <?php
            }
            ?>
            
        </div>
        <div class="continentBreak"> </div>

        <?php
        function loadCSV($file) {
            $result;
            $row = 0;
            if (($handle = fopen($file, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    $result[$row] = $data;
                    $row++;
                }
                fclose($handle);
            }
            return $result;            
    	}

        function getIndexOf($key,$data){
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
