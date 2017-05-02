<?php

namespace RogerForner\TodosBackend\Transformers\Contracts;

interface Transformer
{
    public function transform($resource);

    public function transformCollection($resources);

}
