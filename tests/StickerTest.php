<?php

use PHPUnit\Framework\TestCase;

use xeased\giphy\Client;
use xeased\giphy\Giphy;
use xeased\giphy\types\Sticker;

/**
 * UnitTest for the "Sticker" class.
 */
class StickerTest extends TestCase
{
    protected $apiKey;
    protected $giphy;
    protected $sticker;

    protected function setUp()
    {
        $this->apiKey = 'dc6zaTOxFJmzC'; // public beta key
        $this->giphy = new Giphy($this->apiKey);
        $this->sticker = new Sticker($this->apiKey);
    }

    /**
     * PHPUnit functionality test.
     * @test
     */
    public function test()
    {
        $this->assertTrue(true);
    }

    /**
     * This test uses the general xeased/giphy/Giphy class for the calls.
     * Returns a spotaneously selected sticker from Giphy's sticker collection. Optionally limit scope of result to a specific tag.
     * @test
     */
    public function giphy_roulette()
    {
        $result = $this->giphy->sticker()->roulette();

        //print var_export($result, true);

        $this->assertEquals('200', $result->meta->status);
    }

    /* The following tests uses the xeased/giphy/types/Sticker class for the calls. */

    /**
     * Replicates the functionality and requirements of the classic Giphy search, but returns animated stickers rather than gifs. Example cat.
     * @test
     */
    public function search()
    {
        $s = 'test';
        $params = [
            'limit' => 2
        ];

        $result = $this->sticker->search($s, $params);

        //print var_export($result, true);

        $this->assertEquals('200', $result->meta->status);
    }

    /**
     * Get the latest stickers trending on Giphy with this endpoint.
     * @test
     */
    public function trending()
    {
        $params = [
            'limit' => 2
        ];

        $result = $this->sticker->trending($params);

        //print var_export($result, true);

        $this->assertEquals('200', $result->meta->status);
    }

    /**
     * Using the same alogirithm as the GIF translate endpoint, the sticker translate endpoint turns words into sticke
     * @test
     */
    public function translate()
    {
        $s = 'test';
        $params = [
            'limit' => 2
        ];

        $result = $this->sticker->translate($s, $params);

        //print var_export($result, true);

        $this->assertEquals('200', $result->meta->status);
    }

    /**
     * Returns a spotaneously selected sticker from Giphy's sticker collection. Optionally limit scope of result to a specific tag.
     * @test
     */
    public function sticker_roulette()
    {
        $result = $this->sticker->roulette();

        //print var_export($result, true);

        $this->assertEquals('200', $result->meta->status);
    }
}
