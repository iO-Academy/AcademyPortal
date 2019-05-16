<?php

namespace Portal\Factories;

use Portal\Controllers\DisplayHiringPartnerContactPageController;
use Psr\Container\ContainerInterface;

class DisplayHiringPartnerContactPageControllerFactory
{
	/**
	 * Instantiates DisplayHiringPartnerPageController with dependencies.
	 *
	 * @param ContainerInterface $container
	 *
	 * @return DisplayHiringPartnerContactPageController
	 */

	public function __invoke(ContainerInterface $container) : DisplayHiringPartnerContactPageController
	{
		$renderer = $container->get('renderer');
		$hiringPartnerModel = $container->get('HiringPartnerModel');
		return new DisplayHiringPartnerContactPageController($renderer, $hiringPartnerModel);
	}
}