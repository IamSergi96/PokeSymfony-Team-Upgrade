<?php

namespace App\Controller;

use ReturnTypeWillChange;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController {

    #[Route("/pokemon")]

    public function getPokemon(){
      $pokemon=[
        "nombre"=> "Pikachu",
        "description"=> "amarillo",
        "img"=>"https://assets.pokemon.com/assets/cms2/img/pokedex/full/025.png",
        "codigo"=>"1"
      ];
 return $this->render("Pokemons/GetPokemon.html.twig",["pokemon"=>$pokemon]);   
    }
}