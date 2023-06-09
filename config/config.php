<?php
namespace MyImouto;

/**
 * Place your custom configuration here, instead
 * of modifying the default_config.php file.
 *
 * Values placed here will overwrite the values in the parent class.
 * List the properties you want to overwrite.
 */
class LocalConfig extends DefaultConfig
{
    # The name of this booru.
    public $app_name    = 'siribooru';

    # Host name. Must not include scheme (http(s)://) nor trailing slash.
    public $server_host = '127.0.0.1:80';

    # This is the same as $server_host but includes scheme.
    public $url_base    = 'http://127.0.0.1:80';

    public $admin_contact = 'siri1999kira@yahoo.co.jp';

    public $starting_level = 20;
}
