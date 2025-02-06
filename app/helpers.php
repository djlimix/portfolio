<?php

if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
}

/* * * * * * * * * * * * * * * * * * * * * * * * * * *  *
 * Get images uploaded with texteditor in base64 format *
 * Store this images in disk and replace src value with *
 * the url returing the image from the disk             *
 * * * * * * * * * * * * * * * * * * * * * * * * * * */

use App\Http\Requests\Admin\StoreArticleRequest;

/**
 * @return string
 */
function b64toUrl($data)
{
    // Create blank dom object
    $dom = new \DOMDocument;

    // Load data in the dom object
    $dom->loadHTML($data);

    // Searching for the img tag
    $images = $dom->getElementsByTagName('img');

    foreach ($images as $image) {

        // Getting the value of src attribuite of img
        $raw = $image->getAttribute('src');

        /* If src tag has value data:image
         * than it is upload from device in
         * base64 format
         */
        if (preg_match('/data:image/', $raw)) {
            $name = uniqid();

            preg_match('/data:image\/(?<mime>.*?)\;/', $raw, $groups);
            $mimetype = $groups['mime'];
            $filepath = '/articles/'.$name.'.'.$mimetype;

            // Convert base64 data to the image again
            $img = Image::configure(['driver' => 'imagick'])
                ->make($raw)
                ->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode($mimetype, 100);

            // Store the image in disk
            Storage::put($filepath, $img);

            // Remove old src attribute value
            $image->removeAttribute('src');

            // Set new src attribute value as a url that gives image in response.
            $image->setAttribute('src', '/img'.$filepath);

            // add class img
            $image->setAttribute('class', 'img');
        }
    }

    // Return the dom html
    return $dom->saveHTML();
}

/**
 * @return string[]
 */
function uploadBg(StoreArticleRequest $request)
{
    $image = $request->file('bg');
    $path = storage_path('app/temp/');
    $temp = $path.$image->getClientOriginalName();
    $image->move($path, $image->getClientOriginalName());
    $id = uniqid();

    $name = $id.'.'.$image->clientExtension();
    $thumb_name = $id.'_thumb.'.$image->clientExtension();

    $img = Image::configure(['driver' => 'imagick'])
        ->make($temp)->resize(2000, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode($image->getClientMimeType(), 100);

    $thumb = Image::configure(['driver' => 'imagick'])
        ->make($temp)->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode($image->getClientMimeType(), 100);

    Storage::put('/articles/'.$name, $img);
    Storage::put('/articles/'.$thumb_name, $thumb);
    Storage::delete('/temp/'.$image->getClientOriginalName());

    return ['bg' => '/img/articles/'.$name, 'thumb' => '/img/articles/'.$thumb_name];
}

/**
 * @param  bool  $strict
 * @return bool
 */
function in_array_r($needle, $haystack, $strict = false)
{
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}

function checkForCode($body)
{
    return str_replace('<pre>', '<pre class="prettyprint">', $body);
}
