<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace eZ\Publish\Core\MVC\Legacy\Templating\Twig;

use Twig\Environment;
use Twig\Source;
use Twig\Template as BaseTemplate;
use eZ\Publish\Core\MVC\Legacy\Templating\LegacyEngine;

/**
 * Twig Template class representation for a legacy template.
 */
class Template extends BaseTemplate
{
    private $templateName;

    /**
     * @var \eZ\Publish\Core\MVC\Legacy\Templating\LegacyEngine
     */
    private $legacyEngine;

    public function __construct($templateName, Environment $env, LegacyEngine $legacyEngine)
    {
        parent::__construct($env);

        $this->templateName = $templateName;
        $this->legacyEngine = $legacyEngine;
    }

    public function render(array $context): string
    {
        return $this->legacyEngine->render($this->templateName, $context);
    }

    public function display(array $context, array $blocks = []): void
    {
        echo $this->render($context);
    }

    public function getTemplateName()
    {
        return $this->templateName;
    }

    public function getDebugInfo()
    {
        return [];
    }

    public function getSourceContext()
    {
        return new Source('', '');
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
    }
}
