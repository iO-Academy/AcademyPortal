<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-14
 * Time: 13:50
 */

namespace Portal\Controllers;


use Portal\Models\HiringPartnerModel;

class GetCompanySizeController
{
    private $renderer;
    private $hiringPartnerModel;

    /**
     * DisplayApplicantsController constructor.
     *
     * @param PhpRenderer $renderer
     *
     * @param HiringPartnerModel $hiringPartnerModel
     */
    public function __construct(PhpRenderer $renderer, HiringPartnerModel $hiringPartnerModel)
    {
        $this->renderer = $renderer;
        $this->hiringPartnerModel = $hiringPartnerModel;
    }
}