<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace AppVariableBundle\Driver;
/**
 * Description of Factory
 *
 * @author chathura
 */
class Factory
{
	/**
	 *
	 * @return Utility_Driver_Base
	 */
    public static function get()
	{
		if (function_exists("shmop_open"))
			return new Memory();
		else
			return new File();
	}
}

