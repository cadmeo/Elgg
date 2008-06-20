<?php

	/**
	 * Elgg update site action
	 * 
	 * This is an update version of the sitesettings/install action which is used by the admin panel to modify basic settings.
	 * 
	 * @package Elgg
	 * @subpackage Core
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	global $CONFIG;
	
	// block non-admin users
	admin_gatekeeper();
	
	if (get_input('settings') == 'go') {
		
		if (datalist_get('default_site')) {
			
			$site = get_entity(datalist_get('default_site'));
			if (!($site instanceof ElggSite)) 
				throw new InstallationException(elgg_echo('InvalidParameterException:NonElggSite'));
			
			$site->name = get_input('sitename');
			$site->url = get_input('wwwroot');
			
			datalist_set('path',get_input('path'));
			datalist_set('dataroot',get_input('dataroot'));
			
			set_config('language', get_input('language'), $site->getGUID());
			
			set_config('view', get_input('view'), $site->getGUID());
			
			$debug = get_input('debug');
			if ($debug)
				set_config('debug', 1, $site->getGUID());
			else
				unset_config('debug', $site->getGUID());
				
			
			$site->save();
			system_message(elgg_echo("admin:configuration:success"));
			
			header("Location: {$CONFIG->wwwroot}admin/site/");
			exit;
			
		}
		
	}

?>