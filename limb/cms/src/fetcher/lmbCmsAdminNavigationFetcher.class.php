<?php
lmb_require('limb/web_app/src/fetcher/lmbFetcher.class.php');
lmb_require('limb/core/src/lmbCollection.class.php');
lmb_require('limb/core/src/lmbEmptyIterator.class.php');

class lmbCmsAdminNavigationFetcher extends lmbFetcher
{
  function _createDataSet()
  {
    $toolkit = lmbToolkit :: instance();
    $conf = $toolkit->getConf('navigation');

    $data = $conf->get($toolkit->getUser()->getCurrentRole()->getId());
    if(is_array($data))
      return new lmbCollection($data);
    else
      return new lmbCollection();
  }
}

?>