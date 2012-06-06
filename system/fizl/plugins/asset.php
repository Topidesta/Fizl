<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Asset Plugin
 *
 * Create asset links.
 *
 * @package		Fizl
 * @author		Adam Fairholm (@adamfairholm)
 * @copyright	Copyright (c) 2011-2012, Parse19
 * @license		http://parse19.com/fizl/docs/license.html
 * @link		http://parse19.com/fizl
 */
class Plugin_asset extends Plugin {

	function __construct()
	{
		parent::__construct();

		$this->CI->load->helper('html');
	}

	// --------------------------------------------------------------------------

	/**
	 * Image link
	 */
	public function img()
	{
		$image_properties['src'] = $this->CI->config->item('base_url').
					$this->CI->config->item('assets_folder').
					'/img/'.$this->get_param('file');

		$properties = array('alt', 'id', 'class', 'width', 'height', 'title', 'rel');

		foreach($properties as $prop):

			if($this->get_param($prop) != ''):

				$image_properties[$prop] = $this->get_param($prop);

			endif;

		endforeach;

		return img($image_properties);
	}

	// --------------------------------------------------------------------------

	/**
	 * CSS link
	 */
	public function css()
	{
		$src = 		$this->CI->config->item('base_url').
					$this->CI->config->item('assets_folder').
					'/css/'.$this->get_param('file');

		// Get HTML5 param or leave as it is
		$html5 = $this->get_param('html5', 'false');

		// Do it the HTML5 way?
		if ($html5 == 'true') {

			return '<link rel="stylesheet" href="'.$src.'">';

		} else {

			return '<link rel="stylesheet" type="text/css" href="'.$src.'" />';

		}
	}

	// --------------------------------------------------------------------------

	/**
	 * JS link
	 */
	public function js()
	{
		$src = 		$this->CI->config->item('base_url').
					$this->CI->config->item('assets_folder').
					'/js/'.$this->get_param('file');

		// Get HTML5 param or leave as it is
		$html5 = $this->get_param('html5', 'false');

		// Do it the HTML5 way?
		if ($html5 == 'true') {

			return '<script src="'.$src.'"></script>';

		} else {

			return '<script type="text/javascript" src="'.$src.'"></script>';

		}
	}

}

/* End of file asset.php */