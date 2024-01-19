<?php

namespace Domains\Interaction\ValueObjects;

use Domains\Interaction\Contracts\ValueObjectContract;

class InteractionValueObject implements ValueObjectContract
{
    public function __construct(
        public string $type,
        public int $contact,
        public int $user,
        public null|string $content = null,
        public null|int $project = null
    ) { }

    public function toArray(): array{
        return [
            'type'=>$this->type,
            'user_id'=>$this->user,
            'content'=>$this->content,
            'contact_id'=>$this->contact,
            'project_id' =>$this->project
        ];
    }
}
