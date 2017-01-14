<?php

namespace KatZoektThuis\MapBundle\EventListener;

use SumoCoders\FrameworkCoreBundle\Event\ConfigureMenuEvent;
use SumoCoders\FrameworkCoreBundle\EventListener\DefaultMenuListener;

class MenuListener extends DefaultMenuListener
{
    public function onConfigureMenu(ConfigureMenuEvent $event)
    {
        $menu = $event->getMenu();
        $menuItem = $event->getFactory()->createItem(
            'kzt.map.menu',
            [
                'route' => 'kzt_map',
            ]
        );

        $menu->addChild($menuItem);
    }
}
