<?php
namespace rpi\hardware\disk;

/*
Filesystem     1K-blocks    Used Available Use% Mounted on
/dev/root       15075480 4551608   9866100  32% /
*/
class DiskInfos {
	/**
	 * @return DiskInfo[]
	 */
	public static function getInfos(array $filesystem = null) {
		if ($filesystem == null) {
			return self::data('');
		}
		
		$infos = [];
		
		foreach($filesystem as $fs) {
			$infos[] = self::data($fs);
		}

		return $infos;
	}
	
	/**
	 * @return DiskInfo
	 */
	public static function getInfo($filesystem) {
		return current(self::data($filesystem));
	}
	
	/**
	 * @return DiskInfo[]
	 */
	public static function data($filesystem='') {
		$output = array();
		exec("df ". $filesystem, $output);
		
		next($output); // ignore header
		
		$infos = [];
		foreach($output as $data) {
			$matches = [];
			if (preg_match(
			'#([^\s]+)'.
			'\s*(\d+)'.
			'\s*(\d+)'.
			'\s*(\d+)'.
			'\s*(\d+%)'.
			'\s*([^\s]+)\s*#',
			$data,
			$matches)) {
				$infos[] = new DiskInfo($matches[1], $matches[2], $matches[3], $matches[4], $matches[5], $matches[6]);
			}
		}
		
		return $infos;
	}	
}

class DiskInfo {
	private $filesystem;
	private $size;
	private $used;
	private $available;
	private $use;
	private $mount;
	
	public function __construct($filesystem, $size, $used, $available, $use, $mount) {
		$this->filesystem = $filesystem;
		$this->size = new StorageUnit($size);
		$this->used = new StorageUnit($used);
		$this->available = new StorageUnit($available);
		$this->use = $use;
		$this->mount = $mount;
	}
	
	public function filesystem() {
		return $this->filesystem;
	}
	public function size() {
		return $this->size;
	}
	public function used() {
		return $this->used;
	}
	public function available() {
		return $this->available;
	}
	public function usedPourcentage() {
		return $this->usedPourcentage;
	}
	public function mount() {
		return $this->mount;
	}	
}

class StorageUnit {
	const K = 1024;
	
	private static $UNITS = ['o', 'Ko', 'Mo', 'Go', 'To'];
	
	private $size;
	private $valueForUnit;
	private $unit;
	
	public function __construct($size) {
		$this->size = $size;
		$this->nearestMetric();
	}
	
	public function value() {
		return $this->size;
	}
	
	public function nearestMetric() {
		$v = $this->size;
		$it = 0;
		
		while ($v > self::K && $it < (count(self::$UNITS) - 1)) {
			$v /= self::K;
			$it++;
		}
		
		$this->valueForUnit = round($v, 2);
		$this->unit = self::$UNITS[$it];
	}
	
	public function valueForUnit() {
		return $this->valueForUnit;
	}
	
	public function unit() {
		return $this->unit;
	}
	
	public function __toString() {
		return $this->size;
	}
}