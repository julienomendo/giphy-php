<?php

use PHPUnit\Framework\TestCase;

use xeased\giphy\Client;
use xeased\giphy\Giphy;
use xeased\giphy\types\Gif;
use xeased\giphy\types\Sticker;

/**
 * UnitTest for the "Gif" class.
 */
class ClientTest extends TestCase
{
    protected $apiKey;
    protected $giphy;
    protected $gif;
    protected $sticker;

    protected function setUp()
    {
        $this->apiKey = 'dc6zaTOxFJmzC'; // public beta key
        $this->giphy = new Giphy($this->apiKey);
        $this->gif = new Gif($this->apiKey);
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
     * Returns a random GIF, limited by tag. Excluding the tag parameter will return a random GIF from the Giphy catalog.s
     * @test
     */
    public function giphy_random()
    {
        $result = $this->giphy->gif()->random();

        //print var_export($result, true);

        $this->assertEquals('200', $result->meta->status);
    }

    /* The following tests uses the xeased/giphy/types/Gif class for the calls. */

    /**
     * Returns meta data about a GIF, by GIF id.
     * @test
     */
    public function getById()
    {
        $id = 'feqkVgjJpYtjy';

        $result = $this->gif->getById($id);

        //print var_export($result, true);

        $this->assertEquals('200', $result->meta->status);
    }

    /**
     * A multiget version of the get GIF by ID endpoint.
     * @test
     */
    public function getByIdList()
    {
        $ids = ['feqkVgjJpYtjy', '7rzbxdu0ZEXLy'];

        $result = $this->gif->getByIdList($ids);

        //print var_export($result, true);

        $this->assertEquals('200', $result->meta->status);
    }

    /**
     * Search all Giphy GIFs for a word or phrase.
     * @test
     */
    public function search()
    {
        $q = 'test';
        $params = [
            'limit' => 2,
        ];

        $result = $this->gif->search($q, $params);

        //print var_export($result, true);

        $this->assertEquals('200', $result->meta->status);
    }

    /**
     * Fetch GIFs currently trending online.
     * @test
     */
    public function trending()
    {
        $params = [
            'limit' => 2,
        ];

        $result = $this->gif->trending($params);

        //print var_export($result, true);

        $this->assertEquals('200', $result->meta->status);
    }

    /**
     * The translate API draws on search, but uses the Giphy "special sauce" to handle translating from one vocabulary to another.
     * @test
     */
    public function translate()
    {
        $s = 'test';
        $params = [
            'limit' => 2,
        ];

        $result = $this->gif->translate($s, $params);

        //print var_export($result, true);

        $this->assertEquals('200', $result->meta->status);
    }

    /**
     * Returns a random GIF, limited by tag. Excluding the tag parameter will return a random GIF from the Giphy catalog.s
     * @test
     */
    public function random()
    {
        $result = $this->gif->random();

        //print var_export($result, true);

        $this->assertEquals('200', $result->meta->status);
    }
}
