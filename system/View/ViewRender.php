<?php
namespace System\View;

use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use System\Config\Config;

class ViewRender
{
    public static function render(string $viewName, array $data = [])
    {
        $viewDir = Config::getConfig('view')['dir'];

        if (! file_exists($viewDir . '/' . $viewName)) {
            throw new ResourceNotFoundException(
                sprintf(
                    'The view "%s" does not exist in %s/%s',
                    $viewName,
                    $viewDir,
                    $viewName
                )
            );
        }

        $content = self::getIncludedContents($viewDir . '/' . $viewName, $data);

        if (! is_string($content)) {
            throw new ResourceNotFoundException(
                sprintf(
                    'The view "%s" does not exist in %s/%s',
                    $viewName,
                    $viewDir,
                    $viewName
                )
            );
        }

        response()->setContent($content);
    }

    public static function getIncludedContents($filename, $data) {
        if (is_file($filename)) {
            ob_start();
            if (count($data)) {
                extract($data);
            }
            include $filename;
            return ob_get_clean();
        }
        return '';
    }
}
