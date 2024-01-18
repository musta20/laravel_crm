<?php

namespace Domains\Contact\Events;

use Domains\Contact\ValueObjects\ContactValueObject;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class ContactWasUpdated extends ShouldBeStored
{

    public function __construct(
        public ContactValueObject $object,
        public  $uuid
    ) {
    }
}
