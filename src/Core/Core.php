<?php

namespace Core;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;

use Core\Commands\SimpleCratesCommand;
use Core\SimpleCrates\SimpleCrates;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->registerCommands();
        $this->registerEvents();
    }
    /**
     * registers Commands
     */
    public function registerCommands(){
        $this->getServer()->getCommandMap()->register("givekey", new Commands\SimpleCratesCommand());
    }
    public function registerEvents(){
        $this->getServer()->getPluginManager()->registerEvents((new SimpleCrates($this)), $this);
    }
}
