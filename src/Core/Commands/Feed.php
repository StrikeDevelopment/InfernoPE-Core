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
                        $sender->sendMessage(C::RED . "§l§7(§c!§7) §r§4Buy A Rank To Use This Command!");
                        return false;
                    }
                        $sender->setFood(20);
                        $sender->sendMessage(C::GREEN . "§l§7(§a!§7) §r§2Your Hunger Has Been Restored!");
        }else{
          $sender->sendMessage(C::RED . "You are not In-Game.");
        }
            return true;
    }
}
