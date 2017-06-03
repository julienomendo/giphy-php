<?php

namespace xeased\giphy\types;

use xeased\giphy\Client;

/**
 * This class provides several functions for communication with the giphy api for sticker.
 */
class Sticker
{
    private $apiKey;
    private $client;

    /**
     * Constructor
     * @param string $apiKey The api key for giphy
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client();
    }

    /**
     * Replicates the functionality and requirements of the classic Giphy search, but returns animated stickers rather than gifs. Example cat.
     * @param  string $q      Search query term or phrase
     * @param  array  $params Optional parameter (limit, offset, rating, lang, fmt)
     * @return mixed          The JSON decoded response
     */
    public function search($q, $params = [])
    {
        $params['q'] = urlencode($q);

        return $this->sendRequest('/v1/stickers/search', $params);
    }

    /**
     * Get the latest stickers trending on Giphy with this endpoint.
     * Hand curated by the Giphy editorial team and refreshed daily.
     * @param  array $params  Optional parameter (limit, offset, fmt, rating)
     * @return mixed          The JSON decoded response
     */
    public function trending($params = [])
    {
        return $this->sendRequest('/v1/stickers/trending', $params);
    }

    /**
     * Using the same alogirithm as the GIF translate endpoint, the sticker translate endpoint turns words into sticke
     * @param  string $s      Term or phrase to translate into a gif
     * @param  array  $params Optional parameter (rating, lang, fmt)
     * @return mixed          The JSON decoded response
     */
    public function translate($s, $params = [])
    {
        $params['s'] = urlencode($s);

        return $this->sendRequest('/v1/stickers/search', $params);
    }

    /**
     * Returns a spotaneously selected sticker from Giphy's sticker collection.
     * Optionally limit scope of result to a specific tag.
     * Like the GIF random endpoint, Punctuation will be stripped and ignored.
     * Use a hyphen for phrases.Example oops, birthday or thank-you. Search terms should be URL encoded.
     * @param  string $tag    Search query term or phrase
     * @param  array  $params Optional parameter (rating, fmt)
     * @return mixed          The JSON decoded response
     */
    public function roulette($tag = null, $params = [])
    {
        if($tag)
        {
            $params['tag'] = urlencode($tag);
        }

        return $this->sendRequest('/v1/stickers/random', $params);
    }

    /**
     * Sends the request using the xeased\giphy\Client class.
     * @param  string $endpoint The api endpoint
     * @param  array  $params   Request parameter
     * @return mixed            The JSON decoded response
     */
    private function sendRequest($endpoint, $params = [])
    {
        $params['api_key'] = $this->apiKey;

        return $this->client->call($endpoint, $params);
    }
}
