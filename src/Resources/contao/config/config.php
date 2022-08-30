<?php

// Frontend modules
$GLOBALS['TL_CTE']['onpagecontent']['onepage_start'] = \Petersku\ContaoOnePageContentBundle\Contao\Elements\OnepageStart::class;
$GLOBALS['TL_CTE']['onpagecontent']['onepage_stop'] = \Petersku\ContaoOnePageContentBundle\Contao\Elements\OnepageStop::class;

$GLOBALS['TL_WRAPPERS']['start'][] = 'onepage_start';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'onepage_stop';