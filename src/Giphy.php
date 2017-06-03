<?php

namespace xeased\giphy;

use xeased\giphy\types\Gif;
use xeased\giphy\types\Sticker;

/**
 * This class provides the instances of the two giphy types "Gif" and "Sticker".
 */
class Giphy
{
    private $gif;
    private $sticker;

    /**
     * Constructor
     * @param string $apiKey The api key for giphy
     */
    public function __construct($apiKey)
    {
        $this->gif = new Gif($apiKey);
        $this->sticker = new Sticker($apiKey);
    }

    /**
     * Returns an instance of Gif.
     * @return Gif The GIF instance
     */
    public function gif()
    {
        return $this->gif;
    }

    /**
     * Returns an instance of Sticker.
     * @return Sticker The Sticker instance
     */
    public function sticker()
    {
        return $this->sticker;
    }
}
