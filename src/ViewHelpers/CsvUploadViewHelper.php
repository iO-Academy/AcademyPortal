<?php

namespace Portal\ViewHelpers;

class CsvUploadViewHelper
{
    public static function csvUploadResults(string $successes, array $failures, string $error): string
    {
        $string = '';

        if ($error !== null) {
            $string = '<p>' . $error . '</p>';
        }

        if ($successes !== null) {
            $string = '<p>' . $successes . ' successfully uploaded record(s).</p>';
        }

        if ($failures !== null) {
            if (count($failures) > 0) {
                $string .= '<p>' . count($failures) . ' unsuccessfully uploaded record(s): </p>'
                    . '<table class="table">'
                    . '<thead>'
                    . '<tr>'
                    . '<th>Name</th>'
                    . '<th>Row Number</th>'
                    . '</tr>'
                    . '</thead>'
                    . '<tbody>';
                foreach ($failures as $failure) {
                    $string .= '<tr>'
                        . '<td>' . $failure['name'] . '</td>'
                        . '<td>' . $failure['row'] . '</td>'
                        . '</tr>';
                }
                $string .= '</tbody>'
                    . '</table>';
            }
        }

        return $string;
    }
}
