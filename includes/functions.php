<?php
/**
 * Calculate the reading time of the post content.
 *
 * This function calculates the estimated reading time based on an average reading speed of 200 words per minute. It counts the words in the post content, excluding HTML tags, and returns the reading time in minutes.
 *
 * @param string $content The content of the post.
 * @return int The estimated reading time in minutes.
 */
function rtpb_calculate_reading_time($content) {
    // Remove HTML tags and decode HTML entities
    $content = wp_strip_all_tags($content);
    $content = html_entity_decode($content);

    // Count the words
    $word_count = str_word_count($content);

    // Average reading speed (words per minute)
    $reading_speed = 200;

    // Calculate reading time in minutes
    $reading_time = ceil($word_count / $reading_speed);

    return $reading_time;
}
?>
