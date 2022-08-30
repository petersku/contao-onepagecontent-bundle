<?php

namespace Petersku\ContaoOnePageContentBundle\Contao\Elements;

use Contao\ContentElement;
use Contao\FrontendTemplate;

class OnepageStop extends ContentElement {

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_onepage_stop';

		/**
	 * Generate the content element
	 */
	protected function compile()
	{

		$this->Template = new FrontendTemplate($this->strTemplate);
		//$this->Template->setData("test");

    }
}
