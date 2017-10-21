<?php
namespace System\Router;

use Symfony\Component\Routing\Exception\MissingMandatoryParametersException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class Routing
{
    public function Matcher($attributes)
    {
        $this->replicateToQuery($attributes);

        if ($this->isCallable($attributes)) {
            return $attributes['_call']($attributes['parameters'] ?? []);
        }

        if ($this->isController($attributes)) {
            if (! array_key_exists('_action', $attributes)) {
                $attributes['_action'] = 'index';
            }
            $controller = new $attributes['_controller']();

            if (!method_exists($controller, $attributes['_action'])) {
                throw new ResourceNotFoundException(sprintf(
                    'The action "%" for "%s" controller does not exist.',
                    $attributes['_action'],
                    $attributes['_controller']
                ));
            }

            return $controller->{$attributes['_action']}();
        }

        throw new ResourceNotFoundException(sprintf(
            'The action "%" for "%s" controller does not exist.',
            $attributes['_action'],
            $attributes['_controller']
        ));
    }

    public function isController($attributes): bool
    {
        if (! array_key_exists('_controller', $attributes)) {
            return false;
        }

        if (! is_string($attributes['_controller'])) {
            return false;
        }

        return class_exists($attributes['_controller']);
    }

    public function isCallable($attributes): bool
    {
        if (! array_key_exists('_call', $attributes)) {
            return false;
        }

        return ! is_callable($attributes['_call']);
    }

    public function replicateToQuery(array $attributes)
    {
        $request = request();
        foreach ($attributes as $name => $attribute) {

            if (substr($name, 0, 1) !== '_') {
                $request->attributes->set($name, $attribute);
            }
        }
    }
}
