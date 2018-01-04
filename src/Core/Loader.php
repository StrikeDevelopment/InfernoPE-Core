<?php

namespace Core;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

use pocketmine\utils\TextFormat as TF;

#Crates
use Core\Commands\SimpleCratesCommand;
use Core\SimpleCrates\SimpleCrates;

#Potions
use Core\Potions\Potions;
use Core\CustomPotion\CustomPotionEvent;
use Core\Commands\CustomPotion;

#Commands
use Core\Commands\Fly;
use Core\Commands\Feed;
use Core\Commands\Heal;
use Core\Commands\Ping;
use Core\Commands\KickAll;
use Core\Commands\Ops;
#Teleport
use Core\Commands\Teleport\Spawn;
use Core\Commands\Teleport\SetSpawn;
use Core\Commands\Teleport\Top;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        
            $this->getServer()->getCommandMap()->register("givekey", new SimpleCratesCommands("givekey", $this));
            $this->getServer()->getCommandMap()->register("custompotion", new CustomPotion("custompotion", $this));
            $this->getServer()->getCommandMap()->register("fly", new Fly("fly", $this));
	    $this->getServer()->getCommandMap()->register("feed", new Feed("feed", $this));
	    $this->getServer()->getCommandMap()->register("heal", new Heal("heal", $this))
	    $this->getServer()->getCommandMap()->register("ping", new Ping("ping", $this));
	    $this->getServer()->getCommandMap()->register("kickall", new KickAll("kickall", $this));
	    $this->getServer()->getCommandMap()->register("ops", new Ops("ops", $this));
            $this->getServer()->getCommandMap()->register("spawn", new Spawn("spawn", $this));
	    $this->getServer()->getCommandMap()->register("setspawn", new SetSpawn("setspawn", $this));
	    $this->getServer()->getCommandMap()->register("top", new Top("top", $this));
	    $this->getServer()->getCommandMap()->register("nick", new Nick($this));
            $this->getServer()->getCommandMap()->register("xyz", new XYZ($this));
        
            $this->getServer()->getPluginManager()->registerEvents((new SimpleCrates($this)), $this);
            $this->getServer()->getPluginManager()->registerEvents(new CustomPotionEvent($this), $this);
            $this->getServer()->getPluginManager()->registerEvents(new Potions($this), $this);
            $this->getServer()->getLogger()->notice("Core Enabled!");
    }
}
