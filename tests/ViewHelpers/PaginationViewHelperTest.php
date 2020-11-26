<?php

namespace Tests\ViewHelpers;

use Portal\ViewHelpers\PaginationViewHelper;
use Tests\TestCase;

class PaginationViewHelperTest extends TestCase
{
    public function testSuccessPaginationViewHelper()
    {
        $expected = '<nav aria-label="Page navigation mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="/applicants?page=1">1</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                        </ul>
                     </nav>';
        $page = 1;
        $count = 1;
        $actual = PaginationViewHelper::applicantsPagination($page,$count);
        $this->assertEquals($expected,$actual);
    }

    public function testMalformedPaginationViewHelper()
    {
        $page = [];
        $count = [];
        $this->expectException(\Error::class);
        $actual = PaginationViewHelper::applicantsPagination($page,$count);
    }
}
