<?php

namespace App\Model\Slug;

/**
 * Interface Slugifiable
 * @package App\Model\Slug
 */
interface Slugifiable
{
    /**
     * @return string
     */
    static function Slugify(string $string): string;

    /**
     * @return array
     */
    static function getRules(): array;
}