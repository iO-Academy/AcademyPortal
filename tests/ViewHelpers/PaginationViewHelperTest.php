<?php

namespace Tests\ViewHelpers;

use Portal\ViewHelpers\PaginationViewHelper;
use Tests\TestCase;

class PaginationViewHelperTest extends TestCase
{
    public function testSuccessPaginationViewHelper()
    {
        $expected = '<nav class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="?page=1">1</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                        </ul>
                     </nav>';
        $expected = preg_replace('/\s+/', '', $expected);
        $page = 1;
        $count = 1;
        $actual = PaginationViewHelper::pagination($page, $count);
        $actual = preg_replace('/\s+/', '', $actual);
        $this->assertEquals($expected, $actual);
    }

    public function testMalformedPaginationViewHelper()
    {
        $page = [];
        $count = [];
        $this->expectException(\Error::class);
        $actual = PaginationViewHelper::pagination($page, $count);
    }
}
