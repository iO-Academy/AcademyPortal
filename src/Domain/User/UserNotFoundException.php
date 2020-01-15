<?php
declare(strict_types=1);

namespace Portal\Domain\User;

use Portal\Domain\DomainException\DomainRecordNotFoundException;

class UserNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The user you requested does not exist.';
}
