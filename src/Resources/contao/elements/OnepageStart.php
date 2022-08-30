<?php

namespace Petersku\ContaoOnePageContentBundle\Contao\Elements;

use Contao\ContentElement;
use Contao\FrontendTemplate;
use Contao\ArticleModel;
use Contao\Controller;

class OnepageStart extends ContentElement {

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_onepage_start';

		/**
	 * Generate the content element
	 */
	protected function compile()
	{
 	    $items = $this->getOnepageNavigation($this->pid);     

		$this->Template = new FrontendTemplate($this->strTemplate);
		
        $this->Template->cssclass = $this->cssID[1];
        $this->Template->cssid = $this->cssID[0];  
 		$this->Template->items = $items;		

    }
    
	protected function getOnepageNavigation($pid) {    
		$objContents = \ContentModel::findPublishedByPidAndTable($this->pid, 'tl_article');
	       
		$items = array();

		$sort_start = 0;
		$sort_end = 0;

		/* Get the Sorting of the Wrapper Elements */
		foreach($objContents as $objContent) {
			 if ( $objContent->type == "onepage_start" ) { 
				 $sort_start = $objContent->sorting;
			 }
			 if ( $objContent->type == "onepage_stop" ) { 
				 $sort_end = $objContent->sorting;
			 }	 
		}
		
		foreach($objContents as $objContent) {
		   
		   //Get the Content Elements only between the start and stop Wrapper
		    if ( $objContent->type != "onepage_start" && $objContent->type != "onepage_stop"  && ($objContent->sorting > $sort_start && $objContent->sorting < $sort_end) ) {
		
				$row = $objContent->row();
				
			    $headline = unserialize($objContent->headline);
			    $row['headline'] = $headline['value'];
			    			
			    $anker = unserialize($objContent->cssID);
				$row['cssID'] = $anker[0];	    

				$items[] = $row;
			}  
		    
		}
		
		// Add classes first and last
		if (!empty($items))
		{
			$last = count($items) - 1;
			
			$items[0]['class'] = trim($items[0]['class'] . ' first');
			$items[$last]['class'] = trim($items[$last]['class'] . ' last');
		}			
        
		return $items;
	}
}
