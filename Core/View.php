<?php

namespace Core;

/**
 * View
 * 
 * PHP version 7.4.20
 */

class View
{
    /**
     * Render a view file
     * 
     * @param string $view       The view file to render
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view";        // Relative to Core directory

        if (is_readable($file)) {
            require $file;
        } else {
            // echo "File '$file' does not exist";
            throw new \Exception("File '$file' does not exist!");
        }
    }

    /**
     * Render a view tenplate using Twig
     * 
     * @param string $template      The template file to render
     * @param array $args           Associative array of data to pass to view template
     * 
     * @return void
     */
    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;
        if ($twig == null) {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/App/Views');
            $twig = new \Twig\Environment($loader);
        }

        echo $twig->render($template, $args);
    }
}
