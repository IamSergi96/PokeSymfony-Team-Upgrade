<?php

namespace App\Controller;

use App\Entity\Pokemon;
use Doctrine\ORM\EntityManagerInterface;
use ReturnTypeWillChange;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
  public function listPokemons(EntityManagerInterface $doctrine)
  {
    $repositorio = $doctrine->getRepository(Pokemon::class);
    $pokemons = $repositorio->findAll();
    return $this->render("Pokemons/listPokemons.html.twig", ["pokemons" => $pokemons]);
  }

  #[Route("/insertPokemons")]
  public function insertPokemons(EntityManagerInterface $doctrine)
  {
    $pokemon = new Pokemon();

    $pokemon->setNombre('Charmander');
    $pokemon->setDescription('Lorem ipsummmmsdfasdñfhañl');
    $pokemon->setImage('https://assets.pokemon.com/assets/cms2/img/pokedex/full/004.png');
    $pokemon->setCodigo(4);

    $pokemon2 = new Pokemon();

    $pokemon2->setNombre('Pikachu');
    $pokemon2->setDescription('Lorem ipsummmmsdfasdñfhañl');
    $pokemon2->setImage('https://assets.pokemon.com/assets/cms2/img/pokedex/full/001.png');
    $pokemon2->setCodigo(6);

    $pokemon3 = new Pokemon();

    $pokemon3->setNombre('Charizar');
    $pokemon3->setDescription('Lorem ipsummmmsdfasdñfhañl');
    $pokemon3->setImage('https://assets.pokemon.com/assets/cms2/img/pokedex/full/010.png');
    $pokemon3->setCodigo(9);

    $doctrine->persist($pokemon);
    $doctrine->persist($pokemon2);
    $doctrine->persist($pokemon3);

    $doctrine->flush();

    return new Response("Pokemons insertados correctamente");
  }
}
