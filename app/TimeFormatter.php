<?php

namespace App;

use Illuminate\Support\Carbon;

trait TimeFormatter
{
    public function time_format(string $attribute, string $format = 'Y-m-d H:i:s', ?string $locale = null)
    {
        $value = $this->$attribute ?? null;

        if (!$value) {
            return null;
        }
        return Carbon::parse($value)
            ->locale($locale ?? app()->getLocale())
            ->translatedFormat($format);
    }
}
