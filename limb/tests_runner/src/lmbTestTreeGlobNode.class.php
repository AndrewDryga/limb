<?php
/*
 * Limb PHP Framework
 *
 * @link http://limb-project.com
 * @copyright  Copyright &copy; 2004-2007 BIT(http://bit-creative.com)
 * @license    LGPL http://www.gnu.org/copyleft/lesser.html
 */
require_once(dirname(__FILE__). '/lmbTestTreeNode.class.php');
require_once(dirname(__FILE__). '/lmbTestTreeFilePathNode.class.php');

/**
 * class lmbTestTreeGlobNode.
 *
 * @package tests_runner
 * @version $Id: lmbTestTreeGlobNode.class.php 6023 2007-06-28 14:01:23Z pachanga $
 */
class lmbTestTreeGlobNode extends lmbTestTreeNode
{
  protected $paths;

  function __construct($paths)
  {
    if(!is_array($paths))
      $paths = array($paths);
    $this->paths = $paths;
  }

  protected function _loadChildren()
  {
    $found = false;
    foreach($this->paths as $path)
    {
      foreach(glob($path) as $item)
      {
        $found = true;
        $this->addChild(new lmbTestTreeFilePathNode($item));
      }
    }

    if(!$found)
      throw new Exception("No tests were found for path '" . implode(';', $this->paths) . "'!");
  }

  function getTestLabel()
  {
    return 'All ' . implode(';', $this->paths) . ' tests ';
  }
}

?>
