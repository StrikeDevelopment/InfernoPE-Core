<?php

namespace Core\Commands;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\PluginCommand;

use pocketmine\utils\TextFormat as C;

use Core\Main;

class Ops extends PluginCommand{

    public function __construct($name, Main $plugin){
        parent::__construct($name, $plugin);
        $this->setDescription("Show If Ops Online.");
        $this->setAliases(["Ops"]);
        $this->setPermission("core.ops");
    }
     
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
                    if (!$sender->hasPermission("core.ops")) {
                        $sender->sendMessage(C::RED . "You are not allow to do that.");
                        return false;
                    }
                        $ops = "";
                         foreach($this->getPlugin()->getServer()->getOnlinePlayers() as $p){
                    if($p->isOnline() && $p->isOp()){
                        $ops = $p->getName()." , ";
                        $sender->sendMessage(C::BLUE . "Server Ops :\n" . C::RED . substr($ops, 0, -2));		
						return true;
					}else{
						$sender->sendMessage(C::BLUE . "Server Ops: \n" . C::RED);
						return true;
					}
				}
            return true;
    }
}
