<?php

namespace Domains\Contact\Aggregates;

use Domains\Contact\Events\ContactWasCreated;
use Domains\Contact\Events\ContactWasUpdated;
use Domains\Contact\ValueObjects\ContactValueObject;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class ContactAggregates extends AggregateRoot
{
    public function createContact(ContactValueObject $object): self
    {
        $this->recordThat(
            domainEvent: new ContactWasCreated(
                $object
            )
        );
        return $this;
    }


    public function UpdateContact(ContactValueObject $object,  $uuid): self
    {
        $this->recordThat(
            domainEvent: new ContactWasUpdated(
                $object,
                $uuid
            )
        );
        return $this;
    }
}
