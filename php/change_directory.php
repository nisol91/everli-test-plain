<?php
class DirectoryChange
{

	public $root = '/';
	public $separator = '/';
	public $parent = '..';
	public $regex = "/^([A-Za-z\/]*)$/";

	function __construct($path)
	{
		if ($this->regexMatch($path) == 1) {
			$this->currentPath = $path;
		} else {
			$this->currentPath = 'error in path pattern';
		}
	}

	public function regexMatch(string $pathString): int
	{
		$match = preg_match($this->regex, $pathString);
		return $match;
	}

	public function cd($command): string
	{
		if ($command == '') {
			$this->currentPath = $this->root;

			return $this->currentPath;
		}

		if ($command == '..') {
			$currentPathArray = explode($this->separator, $this->currentPath);
			array_pop($currentPathArray);
			$newPath = implode($this->separator, $currentPathArray);

			$this->currentPath = $newPath;

			return $this->currentPath;
		}


		$newDirectoryName = end(explode($this->separator, $command));
		$currentPathArray = explode($this->separator, $this->currentPath);
		$currentPathArray[count($currentPathArray) - 1] = $newDirectoryName;
		$newPath = implode($this->separator, $currentPathArray);

		$this->currentPath = $newPath;

		return $this->currentPath;
	}
};


$directoryChange = new DirectoryChange('/a/b/c/d');
var_dump($directoryChange->currentPath);

$changingPath = $directoryChange->cd('../new');
var_dump($directoryChange->currentPath);
