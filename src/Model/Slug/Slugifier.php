<?php

namespace App\Model\Slug;

class Slugifier implements Slugifiable
{
    use FrenchRuleset;

    const LOWERCASE_NUMBERS_DASHES = '/([^A-Za-z0-9]|-)+/';

    /**
     * @var array<string,string>
     */
    protected static $rules = [];

    /**
     * @var array<string,mixed>
     */
    protected static $options = [
        'regexp'    => self::LOWERCASE_NUMBERS_DASHES,
        'separator' => '-',
        'lowercase' => true,
        'trim' => true,
        'strip_tags' => false
    ];

    /**
     * @return string
     */
    static function Slugify(string $string): string
    {
        $options = self::$options;
        $rules = self::$rules;
        $string = ($options['strip_tags'])
            ? strip_tags($string)
            : $string;
        $string = strtr($string, $rules);
        unset($rules);
        if ($options['lowercase']) {
            $string = mb_strtolower($string);
        }
        $string = preg_replace($options['regexp'], $options['separator'], $string);
        return ($options['trim'])
            ? trim($string, $options['separator'])
            : $string;
    }

    /**
     * @return array
     */
    static function getRules(): array
    {
        return [
            self::french()
        ];
    }
}