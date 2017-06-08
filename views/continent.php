        <?php
        $continent = $_GET['continent'];
        $category = $_GET['category'];
        ?>
        <div class="continentInfos">
            <p class="title">Most popular Cities in North America</p>
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="images/newyork1.PNG">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">New York<i class="material-icons right">more_vert</i></span>
                    <p><a href="cities/newyork">More Infos</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">New York<i class="material-icons right">close</i></span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="images/sanfrancisco1.PNG">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">San Francisco<i class="material-icons right">more_vert</i></span>
                    <p><a href="#">More Infos</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">New York<i class="material-icons right">close</i></span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="images/miami1.PNG">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Miami<i class="material-icons right">more_vert</i></span>
                    <p><a href="#">More Infos</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">New York<i class="material-icons right">close</i></span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                </div>
            </div>
            <div style="color:white"><?php 

            echo($continent);
            echo($category);
            echo("</br>");
            echo("data/".$continent.".csv");
            echo("</br>");
            $array = loadCSV("data/".$continent.".csv");
            $index = getIndexOf("Nature",$array);
            $array = getSortedArray($index, $array);
            
            echo("-</br>");
            foreach($array as &$city) {
                echo($city["name"]."&emsp;&emsp;&emsp;&emsp;&emsp;".$city["rank"]);
                echo("</br>");
            }
            ?></div>
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
