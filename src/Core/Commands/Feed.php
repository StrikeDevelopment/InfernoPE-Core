<?php

namespace Core\Commands;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\PluginCommand;

use pocketmine\utils\TextFormat as C;

use Core\Main;

class Feed extends PluginCommand{

    public function __construct($name, Main $plugin){
        parent::__construct($name, $plugin);
        $this->setDescription("Make your hunger full.");
        $this->setAliases(["Feed"]);
        $this->setPermission("core.feed");
    }
     
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
                    if($sender instanceof Player){
                    if (!$sender->hasPermission("core.feed")) {
                        $sender->sendMessage(C::RED . "You are not allow to do that.");
                        return false;
                    }
                        $sender->setFood(20);
                        $sender->sendMessage(C::GREEN . "You have been fed.");
        }else{
          $sender->sendMessage(C::RED . "You are not In-Game.");
        }
            return true;
    }
}
