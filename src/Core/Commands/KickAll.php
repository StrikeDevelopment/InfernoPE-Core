<?php

namespace Core\Commands;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\PluginCommand;

use pocketmine\utils\TextFormat as C;

use Core\Main;

class KickAll extends PluginCommand{

    public function __construct($name, Main $plugin){
        parent::__construct($name, $plugin);
        $this->setDescription("Kick All Players.");
        $this->setAliases(["KickAll"]);
        $this->setPermission("core.kickall");
    }
     
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
                    if (!$sender->hasPermission("core.kickall")) {
                        $sender->sendMessage(C::RED . "You are not allow to do that.");
                        return false;
                    }
                    if (($count = count($this->getPlugin()->getServer()->getOnlinePlayers())) < 1 || ($sender instanceof Player && $count < 2)){
                        $sender->sendMessage(C::RED . "There atleast need 2 players online.");
                        return false;
                    }
                    if (count($args) < 1){
                        $reason = "No Reason.";
            }else{
                        $reason = implode(" ", $args);
                    }
        foreach($this->getPlugin()->getServer()->getOnlinePlayers() as $p){
            if($p !== $sender){
                $p->kick($reason, false);
            }
        }
        $sender->sendMessage(C::AQUA . "All Players has been Kicked for " . C::GREEN . $reason);
          return true;
    }
}
