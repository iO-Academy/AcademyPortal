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
    public static function pagination($page, $count)
    {
        $next = (strval($page + 1));
        $prev = (strval($page - 1));

        $string = '';

        $string .= '<nav class="mt-5">';
        $string .= '<ul class="pagination justify-content-center">';
        $string .= '<li class="page-item ';
        if ($page <= 1) {
            $string .= 'disabled';
        }
        $string .= '"><a class="page-link" href="';
        if ($page <= 1) {
            $string .= '#';
        } else {
            $string .= '?page=' . $prev;
        }
        $string .= '">Previous</a></li>';

        for ($i = 1; $i <= $count; $i++) {
            $string .= '<li class="page-item ';
            if ($page == $i) {
                $string .= 'active';
            }
            $string .= '">';
            $string .= '<a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
        }

        $string .= '<li class="page-item ';
        if ($page >= $count) {
            $string .= 'disabled';
        }
        $string .= '">';
        $string .= '<a class="page-link" href="';
        if ($page >= $count) {
            $string .= '#';
        } else {
            $string .= '?page=' . ($next);
        }
        $string .= '">Next</a>';
        $string .= '</li></ul></nav>';

        return $string;
    }
}
