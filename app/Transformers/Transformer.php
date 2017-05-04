<?php

namespace RogerFornerTodosBackend\Transformers;

use \RogerFornerTodosBackend\Transformers\Contracts\Transformer as TransformerContract;

abstract class Transformer implements TransformerContract {
    public function transformCollection($resources) {
        return array_map(function($resource) {
            return $this->transform($resource);
        }, $resources);
    }
}