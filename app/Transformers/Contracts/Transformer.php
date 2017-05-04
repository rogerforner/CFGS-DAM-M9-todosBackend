<?php

namespace RogerFornerTodosBackend\Transformers\Contracts;

interface Transformer
{
    public function transform($resource);

    public function transformCollection($resources);

}
