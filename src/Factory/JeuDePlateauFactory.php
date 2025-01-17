<?php

namespace App\Factory;

use App\Entity\JeuDePlateau;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<JeuDePlateau>
 */
final class JeuDePlateauFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return JeuDePlateau::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'name' => self::faker()->text(255),
            'nbDee' => self::faker()->randomNumber(),
            'nbPion' => self::faker()->randomNumber(),
            'nbPlateau' => self::faker()->randomNumber(),
            'nbPlayers' => self::faker()->randomNumber(),
            'regle' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(JeuDePlateau $jeuDePlateau): void {})
        ;
    }
}
