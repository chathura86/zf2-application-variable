<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppVariableBundle\Driver;

/**
 * Description of File
 *
 * @author chathura
 */
class File implements DriverInterface
{
	protected $path;
	
	/**
	 * 
	 * @return string
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * 
	 * @param string $path
	 */
	public function setPath($path)
	{
		$this->path = $path;
	}

		
	public function load($shmKey)
	{
		$path = ROOT . $this->path . DIRECTORY_SEPARATOR . $shmKey;
		$appVars = array();

		if (file_exists($path))
			$appVars = unserialize(file_get_contents($path));

		return $appVars;
	}

	public function save($shmKey, $appVars)
	{
		$path = ROOT . $this->path . DIRECTORY_SEPARATOR . $shmKey;
		$result = file_put_contents($path, serialize($appVars));
		return ($result !== false);
	}
}

