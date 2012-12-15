<?php

	namespace Thymely\LazyData;

	class Timing extends AbstractThymely {
		
		// Table Info
		
		protected $_table = 'thymely_timings';
		protected $_order;
		
		// Fields
		
		public $timing_id;
		public $parent_timing_id;
    	public $user_id;
    	public $title;
    	
    	/**
    	 * Start timing a new title.
    	 * @param unknown $title
    	 * @return \Thymely\LazyData\Timing
    	 */
    	public static function startTiming($title) {
    		$timing = new self();
    		$timing->title = $title;
    		$timing->save();
    		return $timing;
    	}
		
	}