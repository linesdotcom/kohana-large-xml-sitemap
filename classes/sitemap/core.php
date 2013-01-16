<?php

class Sitemap_Core {

	protected $_config = array();

	protected $_generator = NULL;

	public function __construct($config = 'default')
	{
		//Load config using Kohana Config
		$this->_config = Kohana::$config->load('sitemap.'.$config);

		//Initialize new generator file
		$this->_generator = new cXmlSitemapGeneratorWrite($this->_config['filename'], $this->_config['compress'], $this->_config['path']);
	}

	public function delete_current()
	{

	}

	public function open()
	{

	}

	public function save()
	{

	}

	public function update_index()
	{

	}
}