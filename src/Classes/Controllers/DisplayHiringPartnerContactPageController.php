<?php
namespace Portal\Controllers;

use Portal\Models\HiringPartnerContactsModel;
use Portal\Models\HiringPartnerModel;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class DisplayHiringPartnerContactPageController
{
	private $renderer;
	private $hiringPartnerModel;
	private $contactsModel;

	/**
	 * DisplayHiringPartnerContactPageController constructor.
	 *
	 * @param PhpRenderer $renderer
	 * @param HiringPartnerModel $hiringPartnerModel
	 */
	public function __construct(PhpRenderer $renderer, HiringPartnerModel $hiringPartnerModel, HiringPartnerContactsModel $contactsModel)
	{
		$this->renderer = $renderer;
		$this->hiringPartnerModel = $hiringPartnerModel;
		$this->contactsModel = $contactsModel;
	}

	/**
	 * Renders hiring partner contact page on the front end in hiringPartnerContactsPage.phtml
	 *
	 * @param Request $request
	 *
	 * @param Response $response
	 *
	 * @param array $args
	 */
	public function __invoke(Request $request, Response $response, array $args)
	{
		$hiringPartnerId = $args['id'];

		$args['companyName'] = $this->hiringPartnerModel->getCompanyName($hiringPartnerId);
		$args['contacts'] = $this->contactsModel->getHiringPartnerContactByCompanyId($hiringPartnerId);

		$this->renderer->render($response, 'hiringPartnerContacts.phtml', $args);
	}
}