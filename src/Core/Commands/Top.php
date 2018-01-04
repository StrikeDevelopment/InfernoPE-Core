<?php

namespace Core\Commands\Teleport;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\PluginCommand;

use pocketmine\level\Level;

use pocketmine\math\Vector3;

use pocketmine\utils\TextFormat as C;

use Core\Main;

class Top extends PluginCommand{

    public function __construct($name, Main $plugin){
        parent::__construct($name, $plugin);
        $this->setDescription("Teleport you to heigh block.");
        $this->setAliases(["Top"]);
        $this->setPermission("core.top");
    }
     
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
                    if($sender instanceof Player){
                    if (!$sender->hasPermission("core.top")) {
                        $sender->sendMessage(C::RED . "You are not allow to do that.");
                        return false;
                    }
                        $title = "§aTeleporting To";
                        $subtitle = "§bHeigh Block!";
                        $sender->addTitle($title, $subtitle);
                        $sender->sendMessage(C::GREEN . "Teleporting To " . C::AQUA . "Heigh Block!");
                        $sender->teleport(new Vector3($sender->getX(), $sender->getLevel()->getHighestBlockAt($sender->getFloorX(), $sender->getFloorZ()) + 1, $sender->getZ())); 
        }else{
          $sender->sendMessage(C::RED . "You are not In-Game.");
        }
            return true;
    }
}
