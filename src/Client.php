<?php

namespace xeased\giphy;

/**
 * The Client sends the request to the giphy api. If no "api_key" is set, the public beta key will be used.
 */
class Client
{
    const GIPHY_API_URL = 'http://api.giphy.com';
    const API_KEY = 'dc6zaTOxFJmzC'; // public beta key

    /**
     * Performs a call to giphy.
     * @param  string $endpoint The api endpoint
     * @param  array  $params   Request parameter
     * @return mixed            JSON decoded response
     */
    public function call($endpoint, $params)
    {
        try
        {
            // set public beta api_key if none is set
            if(!isset($params['api_key']) || strlen($params['api_key']) <= 0)
            {
                $params['api_key'] = self::API_KEY;
            }

            $query = http_build_query($params);
            $url = self::GIPHY_API_URL . $endpoint . ($query ? "?$query" : '');
            $result = file_get_contents($url);

            if(!isset($params['fmt']) || $params['fmt'] == 'json')
            {
                return json_decode($result);
            }

            return $result;
        }
        catch (Exception $e)
        {
            // TODO: Implement exception handling
            return $e;
        }
    }
}
