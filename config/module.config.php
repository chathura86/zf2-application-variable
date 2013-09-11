<?php
return array(

    /*
     * Is not required IF 'di->instance->facebook' config section is set.
     * User configuration layout will be propagated to 'di->instance->facebook' IF 'di->instance->facebook->config' is not set.
     */
    'AppVariableBundle' => array(
        'driver' => 'memory',			// available drivers memory|file
		'path' => sys_get_temp_dir()	// requred only for file based driver
    )
);
