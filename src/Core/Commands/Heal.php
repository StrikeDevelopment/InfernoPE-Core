<?php

namespace Core\Commands;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\PluginCommand;

use pocketmine\utils\TextFormat as C;

use Core\Loader;

class Heal extends PluginCommand{

    public function __construct($name, Main $plugin){
        parent::__construct($name, $plugin);
        $this->setDescription("Make your health full.");
        $this->setAliases(["Heal"]);
        $this->setPermission("core.heal");
    }
     
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
                    if($sender instanceof Player){
                    if (!$sender->hasPermission("core.heal")) {
                        $sender->sendMessage(Core::PERM_RANK);
                        return false;
                    }
                        $sender->setHealth(20);
                        $sender->sendMessage(C::GREEN . "You have been healed.");
        }else{
          $sender->sendMessage(Core::USE_IN_GAME);
        }
            return true;
    }
}
