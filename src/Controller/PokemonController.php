<?php

namespace App\Controller;

use ReturnTypeWillChange;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{

  #[Route("/pokemon")]

  public function getPokemon()
  {
    $pokemon = [
      "nombre" => "Pikachu",
      "description" => "amarillo",
      "img" => "https://assets.pokemon.com/assets/cms2/img/pokedex/full/025.png",
      "codigo" => "1"
    ];
    return $this->render("Pokemons/GetPokemon.html.twig", ["pokemon" => $pokemon]);
  }

  #[Route("/pokemons")]
  public function listPokemons()
  {
    $list = [
      [
        "nombre" => "Pikachu",
        "description" => "amarillo",
        "img" => "https://assets.pokemon.com/assets/cms2/img/pokedex/full/025.png",
        "codigo" => "25"
      ],
      [
        "nombre" => "CHarizard",
        "description" => "amarillo",
        "img" => "https://assets.pokemon.com/assets/cms2/img/pokedex/full/006.png",
        "codigo" => "6"
      ], [
        "nombre" => "Bulbasur",
        "description" => "amarillo",
        "img" => "https://assets.pokemon.com/assets/cms2/img/pokedex/full/001.png",
        "codigo" => "1"
      ],
    ];

    return $this->render("Pokemons/listPokemons.html.twig", ["pokemons" => $list]);
  }
}
