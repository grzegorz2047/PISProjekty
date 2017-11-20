<?php

class WikipediaHelper {
     
    public static function getJson($params) {
		$service_url = 'https://pl.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles='.$params;
		$json = json_decode(file_get_contents($service_url));
		echo $json->{'query'};//[0]->{'extract'}
	}
}