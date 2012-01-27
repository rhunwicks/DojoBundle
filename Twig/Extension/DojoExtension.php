<?php

/*
 * This file is part of the DojoBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dojo\DojoBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;

/*
 * Twig Extension for Dojo
 */
class DojoExtension extends \Twig_Extension
{
    /*
     * Container
     *
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /*
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }
    
    public function getGlobals()
    {
        return array(
            'dojo_theme' => $this->getContainer()->getParameter('dojo_theme'),
        );
    }
    
    public function getFunctions()
    {
        return array(
            'dojo_config' => new \Twig_Function_Method($this, 'renderDojoConfig', array('is_safe' => array('html'))),
        );
    }
    
    /*
     * Renders Dojo configuration
     */
    public function renderDojoConfig()
    {
        return ($this->getContainer()->get('templating')->render('DojoBundle::config.html.twig', array(
            'dojo_config' => $this->getContainer()->getParameter('dojo_config')
        )));
    }
    
    public function getName()
    {
        return 'dojo';
    }
}
