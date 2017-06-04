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
    $randomGif = $gif->random();
?>
```

## Sticker Usage
Like the usage of the **Gif** class above, you can also directly use the **Sticker** class:

```php
<?php
    $sticker = new \xeased\giphy\types\Sticker($api_key);
    $randomSticker = $sticker->roulette();
?>
```

# Need help?
If you have questions related to this library, feel free to write an email or create an issue and we'll try to help find a solution.

**Notice:** We are only able to provide assistance for this library in its *vanilla* version. We can't assist with problems you have due to custom modifications.

# Contribution
Contributions are welcomed and appreciated!

# License
