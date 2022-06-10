<?php

namespace zZPROGAMERZz423\NoDeathScreen;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;

class Main extends PluginBase implements Listener{
    
    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }
    
    public function onDamage(EntityDamageEvent $event) : void {
        $player = $event->getEntity();
        if($event->getFinalDamage() >= $player->getHealth()) {
            $event->cancel();
            $player->teleport($this->getServer()->getDefaultWorld()->getSafeSpawn());
            $player->setHealth($player->getMaxHealth());
            $player->sendTitle("§l§cYOU DIED!", "§r§eTeleporting to spawn", 1, 100, 50);
            }
    }


    public function onDisable(): void {
    }
}
