<?php

namespace Core\Commands;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\PluginCommand;

use pocketmine\utils\TextFormat as C;

use Core\Loader;

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
                        $sender->sendMessage(Core::PERM_RANK);
                        return false;
                    }
                        $sender->setFood(20);
                        $sender->sendMessage(C::GREEN . "§l§7(§a!§7) §r§2Your Hunger Has Been Restored!");
        }else{
          $sender->sendMessage(Core::USE_IN_GAME);
        }
            return true;
    }
}
