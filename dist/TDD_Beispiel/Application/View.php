<?php

/**
 * TDD
 *
 * @category  TDD
 * @copyright Copyright (c) 2015 by hr-interactive. All rights reserved.
 * @author    Ralf Schneider
 */

namespace Application;

/**
 * Class View
 *
 * @package Application
 */
class View
{
    protected $viewScript;

    public function __construct($viewScript)
    {
        $this->viewScript = $viewScript;
    }
}