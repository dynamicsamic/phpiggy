<?php

declare(strict_types=1);

namespace Framework;

class TemplateEngine
{
    public function __construct(private string $basePath)
    {
        $this->basePath = $basePath;
    }

    public function render(string $template, array $data = [])
    {
        ob_start();
        extract($data, EXTR_SKIP);

        include "{$this->basePath}/{$template}";

        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}
