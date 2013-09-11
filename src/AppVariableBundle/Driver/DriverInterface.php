<?php

namespace AppVariableBundle\Driver;

interface DriverInterface {
	/**
	 *
	 * @param int $shmKey
	 *
	 * @return array
	 */
    public function load($shmKey);

	/**
	 *
	 * @param int $shmKey
	 * @param array $appVars
	 *
	 * @return bool
	 */
	public function save($shmKey, $appVars);
}