<?php

class PageController extends BaseController
{
	protected $layout = 'layouts.default';

    public function getFAQ()
    {
    	$this->setContent('pages/faq');
    }

    public function getChat()
    {
    	$this->setContent('pages/chat');
    }
}