<?php

namespace Core\Commands;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\PluginCommand;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerMoveEvent;

use pocketmine\utils\TextFormat as C;

use Core\Loader;

class Fly extends PluginCommand{

    public function __construct($name, Main $plugin){
        parent::__construct($name, $plugin);
        $this->setDescription("Let you fly");
        $this->setAliases(["Fly"]);
        $this->setPermission("core.fly");
    }
     
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
        if($sender instanceof Player){
        if (count($args) < 1) {
            $sender->sendMessage("§l§7(§d!§7)§r §3Usage: §b/fly §aon§7|§coff");
            return false;
        }
        switch ($args[0]){
            case "on":
                    if (!$sender->hasPermission("core.fly")) {
                        $sender->sendMessage(Core::PERM_RANK);
                        return false;
                    }
                        $sender->setAllowFlight(true);
                        $sender->sendMessage(C::YELLOW . "§l§7(§a!§7)§r§a Fly mode:" . C::GREEN . " §7Enabled.");
            break;
            case "off":
                    if (!$sender->hasPermission("core.fly")) {
                        $sender->sendMessage(Core::PERM_RANK);
                        return false;
                    }
                        $sender->setAllowFlight(false);
                        $sender->sendMessage(C::YELLOW . "§l§7(§a!§7)§r§a Fly mode:" . C::RED . " §7Disabled.");
            break;
            default:
            $sender->sendMessage("§7§l(§d!§7)§r§3 Usage: §b/fly §aon§7|§aoff");
            break;
            }
        }else{
          $sender->sendMessage(Core::USE_IN_GAME);
        }
            return true;
    }
}
