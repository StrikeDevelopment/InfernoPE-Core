<?php

namespace Core\Commands\Teleport;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\PluginCommand;

use pocketmine\level\Level;

use pocketmine\utils\TextFormat as C;

use Core\Loader;

class SetSpawn extends PluginCommand{

    public function __construct($name, Main $plugin){
        parent::__construct($name, $plugin);
        $this->setDescription("Change Server Spawn.");
        $this->setAliases(["SetSpawn"]);
        $this->setPermission("core.setspawn");
    }
     
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
                    if($sender instanceof Player){
                    if (!$sender->hasPermission("core.setspawn")) {
                        $sender->sendMessage(Core::PERM_STAFF);
                        return false;
                    }
                        $sender->getLevel()->setSpawnLocation($sender);
                        $sender->getServer()->setDefaultLevel($sender->getLevel());
                        $sender->sendMessage(C::GREEN . "Success! CowCraftPE Spawn Set!");
        }else{
          $sender->sendMessage(Core::USE_IN_GAME);
        }
            return true;
    }
}
