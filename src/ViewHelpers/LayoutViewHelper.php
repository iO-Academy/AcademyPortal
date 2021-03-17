<?php

namespace Portal\ViewHelpers;

class LayoutViewHelper
{
    public static function outputTitle(string $title = ''): string
    {
        if (empty($title)) {
            return '<title>Academy Portal</title>';
        }
        return '<title>Academy Portal | ' . $title . '</title>';
    }
}
