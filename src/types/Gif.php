<?php

namespace xeased\giphy\types;

use xeased\giphy\Client;

/**
 * This class provides several functions for communication with the giphy api for gifs.
 */
class Gif
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
     * Returns meta data about a GIF, by GIF id.
     * In the below example, the GIF ID is "feqkVgjJpYtjy"
     * @param  string $id The id of the gif
     * @return mixed      The JSON decoded response
     */
    public function getById($id)
    {
        return $this->sendRequest('/v1/gifs/' . $id);
    }

    /**
     * A multiget version of the get GIF by ID endpoint.
     * In this case the IDs are feqkVgjJpYtjy and 7rzbxdu0ZEXLy.
     * Note the additional user metadata attached to the document that describes the second GIF in the response, 7rzbxdu0ZEXLy.
     * @param  array $ids An array which will be converted to a comma separated list of IDs to fetch GIF size data
     * @return mixed      The JSON decoded response
     */
    public function getByIdList($ids)
    {
        $params = ['ids' => implode(",", $ids)];

        return $this->sendRequest('/v1/gifs', $params);
    }

    /**
     * Search all Giphy GIFs for a word or phrase.
     * Punctuation will be stripped and ignored.
     * Use a plus or url encode for phrases.
     * Example paul+rudd, ryan+gosling or american+psycho.
     * @param  string $q      Search query term or phrase
     * @param  array  $params Optional parameter (limit, offset, rating, lang, fmt, sort)
     * @return mixed          The JSON decoded response
     */
    public function search($q, $params = [])
    {
        $params['q'] = urlencode($q);

        return $this->sendRequest('/v1/gifs/search', $params);
    }

    /**
     * Fetch GIFs currently trending online.
     * Hand curated by the Giphy editorial team.
     * The data returned mirrors the GIFs showcased on the Giphy homepage.
     * Returns 25 results by default.
     * @param  array $params Optional parameter (limit, rating, fmt)
     * @return mixed         The JSON decoded response
     */
    public function trending($params = [])
    {
        return $this->sendRequest('/v1/gifs/trending', $params);
    }

    /**
     * The translate API draws on search, but uses the Giphy "special sauce" to handle translating from one vocabulary to another.
     * In this case, words and phrases to GIFs.
     * Example implementations of translate can be found in the Giphy Slack, Hipchat, Wire, or Dasher integrations.
     * Use a plus or url encode for phrases.
     * @param  string $s      Term or phrase to translate into a GIF
     * @param  array  $params Optional params (rating, lang, fmt)
     * @return mixed          The JSON decoded response
     */
    public function translate($s, $params = [])
    {
        $params['s'] = urlencode($s);

        return $this->sendRequest('/v1/gifs/translate', $params);
    }

    /**
     * Returns a random GIF, limited by tag.
     * Excluding the tag parameter will return a random GIF from the Giphy catalog.
     * @param  string $tag    The GIF tag to limit randomness by
     * @param  array  $params Optional parameter (rating, fmt)
     * @return mixed          The JSON decoded response
     */
    public function random($tag = null, $params = [])
    {
        if($tag)
        {
            $params['tag'] = urlencode($tag);
        }

        return $this->sendRequest('/v1/gifs/random', $params);
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
