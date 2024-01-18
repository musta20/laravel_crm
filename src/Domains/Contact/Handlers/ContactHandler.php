<?php


namespace Domains\Contact\Handlers;

use Domains\Contact\Actions\CreateNewContact;
use Domains\Contact\Actions\UpdateContact;
use Domains\Contact\Events\ContactWasCreated;
use Domains\Contact\Events\ContactWasUpdated;
//use spatie\EventSourcing\EventHandlers\Projectors\Projector;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class ContactHandler extends Projector  //extends Projector 
{


    public function onContactWasCreated(ContactWasCreated $event)
    {
        CreateNewContact::handel(
            object: $event->object,
        );
    }

    public function onContactWasUpdated(ContactWasUpdated $event)
    {

        UpdateContact::handel(
            object: $event->object,
            uuid: $event->uuid
        );
    }



}










?>