<?php

namespace Modules\Posts\Helpers;

class PostHelper
{
    /**
     * Truncate the post content to a given length.
     */
    public static function truncateContent(string $content, int $length = 100, string $suffix = '...'): string
    {
        return mb_strlen($content) > $length
            ? mb_substr($content, 0, $length) . $suffix
            : $content;
    }

    /**
     * Format a post creation date for display.
     */
    public static function formatDate(\DateTimeInterface $date): string
    {
        return $date->format('F j, Y, g:i a');
    }

    /**
     * Generate a summary for a post.
     */
    public static function generateSummary(string $content, int $length = 150): string
    {
        return strip_tags(self::truncateContent($content, $length));
    }

    /**
     * Check if a post contains specific keywords.
     */
    public static function containsKeyword(string $content, string $keyword): bool
    {
        return stripos($content, $keyword) !== false;
    }
}
