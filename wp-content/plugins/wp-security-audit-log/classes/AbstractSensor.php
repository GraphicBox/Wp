<?php

abstract class WSAL_AbstractSensor {
	/**
	 * @var WpSecurityAuditLog
	 */
	protected $plugin;

	public function __construct(WpSecurityAuditLog $plugin){
		$this->plugin = $plugin;
	}
	
	abstract function HookEvents();
	
	protected function Log($type, $message, $args){
		$this->plugin->alerts->Trigger($type, array(
			'Message' => $message,
			'Context' => $args,
			'Trace'   => debug_backtrace(),
		));
	}
	
	protected function LogError($message, $args){
		$this->Log(0001, $message, $args);
	}
	
	protected function LogWarn($message, $args){
		$this->Log(0002, $message, $args);
	}
	
	protected function LogInfo($message, $args){
		$this->Log(0003, $message, $args);
	}

}