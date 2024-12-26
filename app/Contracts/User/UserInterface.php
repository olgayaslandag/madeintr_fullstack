<?php

namespace App\Contracts\User;

interface UserInterface
{
    public function all(array $where=[]);
}
