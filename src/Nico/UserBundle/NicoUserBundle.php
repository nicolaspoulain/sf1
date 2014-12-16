<?php

namespace Nico\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class NicoUserBundle extends Bundle
{
  public function getParent()
  {
    return 'FOSUserBundle';
  }
}
