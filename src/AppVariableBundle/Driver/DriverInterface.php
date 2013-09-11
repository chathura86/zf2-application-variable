<?php

namespace AppVariableBundle\Driver;

interface DriverInterface {
	/**
	 *
	 * @param int $shmKey
	 *
	 * @return array
	 */
    abstract public function load($shmKey);

	/**
	 *
	 * @param int $shmKey
	 * @param array $appVars
	 *
	 * @return bool
	 */
	abstract public function save($shmKey, $appVars);
}