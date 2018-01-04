<?php

namespace Core;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

use pocketmine\utils\TextFormat as C;

use Core\Commands\SimpleCratesCommand;
use Core\SimpleCrates\SimpleCrates;

use Core\Potions\Potions;
use Core\CustomPotion\CustomPotionEvent;
use Core\Commands\CustomPotion;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->registerCommands();
        $this->registerEvents();
    }
    /**
     * registers Commands
     */
    public function registerCommands(){
        $this->getServer()->getCommandMap()->register("givekey", new Commands\Simple());
        $this->getServer()->getCommandMap()->register("custompotion", new CustomPotion("custompotion", $this));
    }
    public function registerEvents(){
        $this->getServer()->getPluginManager()->registerEvents((new SimpleCrates($this)), $this);
        $this->getServer()->getPluginManager()->registerEvents(new CustomPotionEvent($this), $this);
        $this->getServer()->getPluginManager()->registerEvents(new Potions($this), $this);
    }
}
