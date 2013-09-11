<?php

namespace AppVariableBundle;

class VariableManager
{

	private $appVars = array();
	private $driver;

	public function __construct($config)
	{
		//starting application
		switch (strtolower($config['driver'])) {
			case 'memory':
				$this->driver = new \AppVariableBundle\Driver\Memory();
				break;
			default:
				$this->driver = new \AppVariableBundle\Driver\File();
				$this->driver->setPath($config['path']);
				break;
		}
		
		$this->loadAppVars();
	}

	/**
	 * generates a key for memory access baesd on the file path
	 * @return int
	 */
	private function getBlockKey()
	{
		if (function_exists("ftok"))
			return ftok(__FILE__, 't');
		else
			return 1946559754;
	}

	/**
	 * loads application variables from the memory
	 * creates a new memory block if the block is not available
	 */
	private function loadAppVars()
	{
		$this->appVars = array_merge(
				$this->appVars, $this->driver->load($this->getBlockKey())
		);
	}

	/**
	 * write the pplication variables to a memory block and
	 * returns the memory block size
	 *
	 * @return boolean
	 */
	private function saveAppVars()
	{
		return $this->driver->save($this->getBlockKey(), $this->appVars);
	}

	/**
	 * 
	 * @param string $name
	 * @return mixed
	 * @throws Exception
	 */
	public function __get($name)
	{
		if (!isset($this->appVars[$name]))
			throw new Exception('Undefined application variable');

		return $this->appVars[$name];
	}

	/**
	 * 
	 * @param string $name
	 * @param mixed $value
	 */
	public function __set($name, $value)
	{
		$this->appVars[$name] = $value;
		$this->saveAppVars();
	}

	/**
	 * 
	 * @param string $name
	 * @return boolean
	 */
	public function __isset($name)
	{
		return isset($this->appVars[$name]);
	}

}
