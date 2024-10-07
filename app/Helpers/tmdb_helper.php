<?php

if (!function_exists('get_tmdb_movies')) {
    function get_tmdb_movies($type = 'popular', $page = 1)
    {
        $apiKey = '247a53b2c562a91054f961f40c3bd6c4';
        $url = "https://api.themoviedb.org/3/movie/{$type}?api_key={$apiKey}&language=en-US&page={$page}";

        $client = \Config\Services::curlrequest();
        $response = $client->get($url);
        return json_decode($response->getBody(), true);
    }
}
