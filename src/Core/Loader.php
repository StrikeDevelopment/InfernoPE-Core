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
	
    const PERM_RANK = C::BOLD . C::BLUE . "» " . C::RESET . C::GRAY . "Buy a rank from shopccpe.buycraft.net to access this command!";
    const PERM_STAFF = C::BOLD . C::BLUE . "» " . C::RESET . C::GRAY . "You do not have the correct permisions to acccess this command!";
    const USE_IN_GAME = C::BOLD . C::BLUE . "» " . C::RESET . C::GRAY . "Use Command In Game";	
    
    public function onEnable(){
        
            $this->getServer()->getCommandMap()->register("givekey", new SimpleCratesCommands("givekey", $this));
            $this->getServer()->getCommandMap()->register("givescroll", new CustomPotion("givescroll", $this));
            $this->getServer()->getCommandMap()->register("ccfly", new Fly("ccfly", $this));
	    $this->getServer()->getCommandMap()->register("ccfeed", new Feed("ccfeed", $this));
	    $this->getServer()->getCommandMap()->register("ccheal", new Heal("ccheal", $this))
	    $this->getServer()->getCommandMap()->register("ccping", new Ping("ccping", $this));
	    $this->getServer()->getCommandMap()->register("cckickall", new KickAll("cckickall", $this));
	    $this->getServer()->getCommandMap()->register("ccops", new Ops("ccops", $this));
            $this->getServer()->getCommandMap()->register("ccspawn", new Spawn("ccspawn", $this));
	    $this->getServer()->getCommandMap()->register("ccsetspawn", new SetSpawn("ccsetspawn", $this));
	    $this->getServer()->getCommandMap()->register("cctop", new Top("cctop", $this));
	    $this->getServer()->getCommandMap()->register("ccnick", new Nick($this));
            $this->getServer()->getCommandMap()->register("ccxyz", new XYZ($this));
        
            $this->getServer()->getPluginManager()->registerEvents((new SimpleCrates($this)), $this);
            $this->getServer()->getPluginManager()->registerEvents(new CustomPotionEvent($this), $this);
            $this->getServer()->getPluginManager()->registerEvents(new Potions($this), $this);
            $this->getServer()->getLogger()->notice("[CowCraft] Core Enabled, Installing SuperCow v1.0.0 for Scrolls Support!");
    }
}
