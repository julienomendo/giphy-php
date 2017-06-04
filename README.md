# PHP interface to the Giphy API
> Gif, a word that will cause the next civil war over how it's pronounced.

The library provides an easy-to-use PHP interface to the [Giphy API](https://github.com/giphy/GiphyAPI), which can be used to retrieve gifs or sticker.

# Installation
Simply add to your composer:

    composer require xeased/giphy-php

That's it, you're ready to have fun!

# Usage
## Giphy Usage
The general **Giphy** class provides an instance of the two classes **Gif** and **Sticker**. You probably want to use this class if you want to retrieve both, gifs and stickers, from giphy.

```php
<?php
    $giphy = new \xeased\giphy\Giphy($api_key);
    $randomGif = $giphy->gif()->random();
    $randomSticker = $giphy->sticker()->roulette();
?>
```

**Notice:** If you don't have any api key the library will automatically use the current public beta key of the giphy api.

### Example Response
The following is an example response of the random gif request:
```json
{
    "data": {
        "type": "gif",
        "id": "Atv5MK8v97GbS",
        "url": "http://giphy.com/gifs/mma-Atv5MK8v97GbS",
        "image_original_url": "http://media2.giphy.com/media/Atv5MK8v97GbS/giphy.gif",
        "image_url": "http://media2.giphy.com/media/Atv5MK8v97GbS/giphy.gif",
        "image_mp4_url": "http://media2.giphy.com/media/Atv5MK8v97GbS/giphy.mp4",
        "image_frames": "7",
        "image_width": "972",
        "image_height": "648",
        "fixed_height_downsampled_url": "http://media2.giphy.com/media/Atv5MK8v97GbS/200_d.gif",
        "fixed_height_downsampled_width": "300",
        "fixed_height_downsampled_height": "200",
        "fixed_width_downsampled_url": "http://media2.giphy.com/media/Atv5MK8v97GbS/200w_d.gif",
        "fixed_width_downsampled_width": "200",
        "fixed_width_downsampled_height": "133",
        "fixed_height_small_url": "http://media2.giphy.com/media/Atv5MK8v97GbS/100.gif",
        "fixed_height_small_still_url": "http://media2.giphy.com/media/Atv5MK8v97GbS/100_s.gif",
        "fixed_height_small_width": "150",
        "fixed_height_small_height": "100",
        "fixed_width_small_url": "http://media2.giphy.com/media/Atv5MK8v97GbS/100w.gif",
        "fixed_width_small_still_url": "http://media2.giphy.com/media/Atv5MK8v97GbS/100w_s.gif",
        "fixed_width_small_width": "100",
        "fixed_width_small_height": "67",
        "username": "",
        "caption": ""
    },
    "meta": {
        "status": 200,
        "msg": "OK",
        "response_id": "593348db13475f9bcbdd4782"
    }
}
```

## GIF Usage
If you don't want to use the general **Giphy** class, you can directly use the **Gif** class. The usage is simple:

```php
<?php
    $gif = new \xeased\giphy\types\Gif($api_key);
    $randomGif = $gif->search('keyboard+cat', ['limit' => 15]);
?>
```

### Endpoints
* GIF by id
* GIFs by ids
* Search
* Trending
* Translate
* Random

#### GIF by id
Get GIFs by an id.

**Signature:** `getById($id)`


| Parameter | Type   | Description       | Required |
|-----------|--------|-------------------|----------|
| $ids      | string | The id of the gif | true     |

#### GIFs by ids
Get GIFs by a list of ids.

**Signature:** `getByIdList($ids)`

| Parameter | Type  | Description                                           | Required |
|-----------|-------|-------------------------------------------------------|----------|
| $ids      | array | A comma separated list of IDs. | true     |

#### Search
Search all GIFs on Giphy for a word or phrase. Example cat+keyboard.

**Signature:** `search($q, $params)`

| Parameter | Type   | Description                                           | Required |
|-----------|--------|-------------------------------------------------------|----------|
| $q        | string | Search query term or phrase                           | true     |
| $params   | array  | Optional parameter <ul><li>limit - Number of results (maximum 100, default 25).</li><li>offset - Results offset (default 0).</li><li>rating - Limit response by rating (y,g, pg, pg-13 or r).</li><li>lang - Default country for regional content (2-letter ISO 639-1).</li><li>fmt - Response in html or json</li><li>sort - The sort order of the results returned (recent or relevant)</li></ul>  | false    |  |

#### Trending
Get a list of trending GIFs.

**Signature:** `trending($params)`

| Parameter | Type   | Description                                            | Required |
|-----------|--------|--------------------------------------------------------|----------|
| $params   | array  | <ul><li>limit - Number of results (maximum 100, default 25).</li><li>rating - Limit response by rating (y,g, pg, pg-13 or r).</li><li>fmt - Response in html or json</li><ul> | false    |


#### Translate
Translates a query to a matching GIF.

**Signature:** `translate($s, $params)`

| Parameter | Type   | Description                                            | Required |
|-----------|--------|--------------------------------------------------------|----------|
| $s        | string | Term or phrase to translate into a GIF                 | true     |
| $params   | array  | <ul><li>rating - Limit response by rating (y,g, pg, pg-13 or r).</li><li>lang - Default country for regional content (2-letter ISO 639-1).</li><li>fmt - Response in html or json</li></ul> | false    |

#### Random
Get a random GIF.

**Signature:** `random($tag, $params)`

| Parameter | Type   | Description                                            | Required |
|-----------|--------|--------------------------------------------------------|----------|
| $tag        | string | A tag to limit randomness                 | false     |
| $params   | array  | <ul><li>rating - Limit response by rating (y,g, pg, pg-13 or r).</li><li>fmt - Response in html or json</li></ul> | false    |

## Sticker Usage
Like the usage of the **Gif** class above, you can also directly use the **Sticker** class:

```php
<?php
    $sticker = new \xeased\giphy\types\Sticker($api_key);
    $randomSticker = $sticker->roulette();
?>
```

### Endpoints
* Search
* Trending
* Translate
* Random

#### Search
Search all sticker on Giphy for a word or phrase. Example dog.

**Signature:** `search($q, $params)`

| Parameter | Type   | Description                                            | Required |
|-----------|--------|--------------------------------------------------------|----------|
| $q        | string | Search query term or phrase                 | true     |
| $params   | array  | <ul><li>limit - Number of results (maximum 100, default 25).</li><li>offset - Results offset (default 0).</li><li>rating - Limit response by rating (y,g, pg, pg-13 or r).</li><li>lang - Default country for regional content (2-letter ISO 639-1).</li><li>fmt - Response in html or json</li><li>sort - The sort order of the results returned (recent or relevant)</li></ul> | false    |

#### Trending
Get a list of trending GIFs.

**Signature:** `trending($params)`

| Parameter | Type   | Description                                            | Required |
|-----------|--------|--------------------------------------------------------|----------|
| $params   | array  | <ul><li>limit - Number of results (maximum 100, default 25).</li><li>offset - Results offset (default 0).</li><li>rating - Limit response by rating (y,g, pg, pg-13 or r).</li><li>fmt - Response in html or json</li><ul> | false    |

#### Translate
Translates a query to a matching GIF.

**Signature:** `translate($s, $params)`

| Parameter | Type   | Description                                            | Required |
|-----------|--------|--------------------------------------------------------|----------|
| $s        | string | Term or phrase to translate into a sticker                 | true     |
| $params   | array  | <ul><li>rating - Limit response by rating (y,g, pg, pg-13 or r).</li><li>lang - Default country for regional content (2-letter ISO 639-1).</li><li>fmt - Response in html or json</li></ul> | false    |

#### Random
Get a random sticker.

**Signature:** `roulette($tag, $params)`

| Parameter | Type   | Description                                            | Required |
|-----------|--------|--------------------------------------------------------|----------|
| $tag        | string | A tag to limit randomness                 | false     |
| $params   | array  | <ul><li>rating - Limit response by rating (y,g, pg, pg-13 or r).</li><li>fmt - Response in html or json</li></ul> | false    |

# Need help?
If you have questions related to this library, feel free to write an email or create an issue and we'll try to help find a solution.

**Notice:** We are only able to provide assistance for this library in its *vanilla* version. We can't assist with problems you have due to custom modifications.

# Contribution
Contributions are welcomed and appreciated!

# License
This library is licensed under the [MIT License (MIT)](https://github.com/xeased/giphy-php/blob/master/LICENSE.MD).

# Credits
This library was created by Niklas Grau.
