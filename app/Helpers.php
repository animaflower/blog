<?php
/**
 * Process a URL and make it SEO compliant.
 *
 * @param $url
 * @return string
 */
function seoUrl($url)
{
    // Make the URL lowercase
    $url = strtolower($url);

    // Make the string alphanumeric (removes all other characters)
    $url = preg_replace("/[^a-z0-9_\s-]/", '', $url);

    // Clean up multiple dashes or whitespaces
    $url = preg_replace("/[\s-]+/", ' ', $url);

    // Convert whitespaces and underscores to dashes
    $url = preg_replace("/[\s_]/", '-', $url);

    return $url;
}

/**
 * Return sizes readable by humans.
 *
 * @param $bytes
 * @param int $decimals
 * @return string
 */
function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)).@$size[$factor];
}

/**
 * Check if the mime type is an image.
 *
 * @param $mimeType
 * @return bool
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}

/**
 * Return 'checked' if true.
 *
 * @param $value
 * @return string
 */
function checked($value)
{
    return $value ? 'checked' : '';
}

/**
 * Return the img url for headers.
 *
 * @param null $value
 * @return mixed|null|string
 */
function page_image($value = null)
{
    if (empty($value)) {
        $value = config('blog.page_image');
    }
    if (! starts_with($value, 'http') && $value[0] !== '/') {
        $value = config('blog.uploads.webpath').'/'.$value;
    }

    return $value;
}
