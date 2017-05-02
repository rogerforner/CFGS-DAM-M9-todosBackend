<?php

namespace RogerForner\TodosBackend\Transformers;

use RogerForner\TodosBackend\Exceptions\IncorrectModelException;

class UserTransformer extends Transformer
{
    public function transform($resource)
    {
        if (!$resource instanceof \RogerForner\TodosBackend\Task) {
            throw new IncorrectModelException();
        }

        return [
            'name'      => $resource['name'],
            'email'     => $resource['email'],
        ];
    }
}
