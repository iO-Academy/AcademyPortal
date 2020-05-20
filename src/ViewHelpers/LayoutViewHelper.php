<?php


namespace Portal\ViewHelpers;

class LayoutViewHelper
{
    public static function outputTitle(string $title): string
    {
        return '<title>AcademyPortal | ' . $title . '</title>';
    }
}
