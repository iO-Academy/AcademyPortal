<?php

namespace Portal\ViewHelpers;

class PaginationViewHelper
{
    /**
     * Takes in count of pages required and current page, and returns pagination for applicants list.
     *
     * @param $page
     * @param $count
     *
     * @return string
     */
    public static function pagination($page, $count, $applicantType = ''): string
    {
        $next = (strval($page + 1));
        $prev = (strval($page - 1));

        $tabUrlParams = '';
        if ($applicantType !== '') {$tabUrlParams = '&tab='.$applicantType;}


        $paginationHtml = '
        <nav class="mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item ' . ($page > 1 ?: "disabled") . '">
                <a class="page-link" href="' . ($page <= 1 ? "#" : "?page=" . $prev) . $tabUrlParams . '">Previous</a></li>';
        for ($i = 1; $i <= $count; $i++) {
            $paginationHtml .= '
                <li class="page-item ' . ($page != $i ?: 'active') . '">
                    <a class="page-link" href="?page=' . $i . $tabUrlParams . '">' . $i . '</a>
                </li>';
        }
        $paginationHtml .= '
                <li class="page-item'. ($page < $count ?: ' disabled') .'">
                    <a class="page-link" href="' . ($page >= $count ? '#' : '?page=' . ($next)) . $tabUrlParams . '">Next</a>
                </li>
            </ul>
        </nav>';

        return $paginationHtml;
    }
}
