<?php

class Sitemap_Core {

	protected $_config = array();

	protected $_generator = NULL;

	public function __construct($config = 'default')
	{
		//Load config using Kohana Config
		$this->_config = Kohana::$config->load('sitemap.'.$config);

		//Initialize new generator file
		$this->_generator = new cXmlSitemapGeneratorWrite($this->_config['filename'], $this->_config['compression'], $this->_config['path']);
	}

	public function delete_current()
	{
		$this->_generator->deleteCurrent();
	}

	public function open()
	{
		$this->_generator->open();
	}

	public function save()
	{
		$this->_generator->save();
	}

	public function add_url($url, $last_modified = NULL, $change_frequency = NULL, $priority = NULL)
	{
		$this->_generator->addUrl($url, $last_modified, $change_frequency, $priority);
	}

	public function update_index($file)
	{
		$this->_generator->updateSitemapIndex($file);
	}
}

//Include the LargeXMLSitemap init file(will include all needed files for LargeXMLSitemap)
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/abstract.xmlSitemapBase');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/abstract.xmlSitemapGeneratorBase');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/class.xmlSitemapConfig');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/class.xmlSitemapGenerator');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/class.xmlSitemapGeneratorWrite');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/class.xmlSitemapIndex');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/class.xmlSitemapMaximumError');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/class.xmlSitemap');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/class.xmlSitemapWrite');