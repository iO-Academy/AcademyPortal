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
    public static function applicantsPagination($page, $count)
    {
        $next = (strval($page+1));
        $prev = (strval($page-1));

        $applicantPagination = '';

        $applicantPagination .= '<nav aria-label="Page navigation mt-5">';
        $applicantPagination .= '<ul class="pagination justify-content-center">';
        $applicantPagination .= '<li class="page-item ';
        if ($page <= 1) {
            $applicantPagination .= 'disabled';
        }
        $applicantPagination .= '"><a class="page-link" href="';
        if ($page <= 1) {
            $applicantPagination .= '#';
        } else {
            $applicantPagination .= '/applicants?page=' . $prev;
        }
        $applicantPagination .= '">Previous</a></li>';

        for ($i = 1; $i <= $count; $i++) :
            $applicantPagination .= '<li class="page-item ';
            if ($page == $i) {
                $applicantPagination .= 'active';
            }
            $applicantPagination .= '">';
            $applicantPagination .= '<a class="page-link" href="/applicants?page=' . $i . '">' . $i . '</a></li>';
        endfor;

        $applicantPagination .= '<li class="page-item ';
        if ($page >= $count) {
            $applicantPagination .= 'disabled';
        }
        $applicantPagination .= '">';
        $applicantPagination .= '<a class="page-link" href="';
        if ($page >= $count) {
            $applicantPagination .= '#';
        } else {
            $applicantPagination .= '/applicants?page=' . ($next);
        }
        $applicantPagination .= '">Next</a>';
        $applicantPagination .= '</li></ul></nav>';

        return $applicantPagination;
    }
}
