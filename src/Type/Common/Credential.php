<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class Credential
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class Credential {

    /**
     * @var string
     */
    protected $userName;

    /**
     * @var string
     */
    protected $password;

    /**
     * Credential constructor.
     *
     * @param string $userName
     * @param string $password
     */
    public function __construct(string $userName, string $password) {
        $this->userName = $userName;
        $this->password = $password;
    }

}
