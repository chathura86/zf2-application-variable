<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace AppVariableBundle\Driver;
/**
 * Description of Memory
 *
 * @author chathura
 */
class Memory implements DriverInterface
{
    public function load($shmKey)
	{
		$memBlobkId = @shmop_open($shmKey, "w", 0644, 1024);
		$appVars = array();

		if ($memBlobkId === false)
		{
			//create new memory block
			$memBlobkId = shmop_open($shmKey, "c", 0644, 1024);

			shmop_write($memBlobkId, serialize($appVars), 0);
		}
		else
		{
			//load app vars to varialbe
			$shm_data = shmop_read($memBlobkId, 0, 1024);

			$appVars = unserialize($shm_data);
		}

		shmop_close($memBlobkId);

		return $appVars;
	}

	public function save($shmKey, $appVars)
	{
		$memBlobkId = @shmop_open($shmKey, "w", 0644, 1024);
		$result =  shmop_write($memBlobkId, serialize($appVars), 0);
		shmop_close($memBlobkId);

		return $result;
	}
}

