<?php
namespace Portal\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class DisplayHiringPartnerContactPageController
{
	private $renderer;

	/**
	 * DisplayHiringPartnerContactPageController constructor.
	 *
	 * @param PhpRenderer $renderer
	 */
	public function __construct(PhpRenderer $renderer)
	{
		$this->renderer = $renderer;
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
		$newHiringPartnerContact = $request->getParsedBody();

		$args['companyId'] = $newHiringPartnerContact['id'];
		$args['companyName'] = $newHiringPartnerContact['name'];

		$this->renderer->render($response, 'hiringPartnerContacts.phtml', $args);
	}
}