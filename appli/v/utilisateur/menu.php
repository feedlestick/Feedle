<?php
$series = $this->series;
foreach ($series as $serie) {
    echo '<li><a href="#" onclick="serie(',$serie->id,')" >',$serie->libelle,'</a></li>';
}
