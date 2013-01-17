<?php
/**
 * Wrapper class for LargeXMLSitemap
 *
 * @author Craig Sparks <craig@lines.com>
 */

class Sitemap_Core {

	/**
	 * @var array|Kohana_Config_Group Array of config values as defined in the configuration file
	 */
	protected $_config = array();

	/**
	 * @var cXmlSitemapGeneratorWrite|null Holds the instance of teh Sitemap Generator
	 */
	protected $_generator = NULL;

	/**
	 * Initializes a new Sitemap_Core instance
	 * @param string $config Name of the kohana config group as defined in sitemap.php config file
	 */
	public function __construct($config = 'default')
	{
		//Load config using Kohana Config
		$this->_config = Kohana::$config->load('sitemap.'.$config);

		//Initialize new generator file
		$this->_generator = new cXmlSitemapGeneratorWrite($this->_config['filename'], $this->_config['compression'], $this->_config['path']);
	}

	/**
	 * Wraps the cXmlSitemapGeneratorWrite::deleteCurrent() method
	 */
	public function delete_current()
	{
		$this->_generator->deleteCurrent();
	}

	/**
	 * Wraps the cXmlSitemapGeneratorWrite::open() method
	 */
	public function open()
	{
		$this->_generator->open();
	}

	/**
	 * Wraps the cXmlSitemapGeneratorWrite::save() method
	 */
	public function save()
	{
		$this->_generator->save();
	}

	/**
	 * Wraps the cXmlSitemapGeneratorWrite::add_url() method
	 */
	public function add_url($url, $last_modified = NULL, $change_frequency = NULL, $priority = NULL)
	{
		$this->_generator->addUrl($url, $last_modified, $change_frequency, $priority);
	}

	/**
	 * Wraps the cXmlSitemapGeneratorWrite::update_index() method
	 */
	public function update_index($file)
	{
		$this->_generator->updateSitemapIndex($file);
	}
}

//Include the LargeXMLSitemap files
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/abstract.xmlSitemapBase');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/abstract.xmlSitemapGeneratorBase');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/class.xmlSitemapConfig');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/class.xmlSitemapGenerator');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/class.xmlSitemapGeneratorWrite');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/class.xmlSitemapIndex');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/class.xmlSitemapMaximumError');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/class.xmlSitemap');
require Kohana::find_file('vendor/LargeXMLSitemap', 'src/classes/class.xmlSitemapWrite');