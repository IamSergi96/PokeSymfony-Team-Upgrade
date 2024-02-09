<?php

namespace App\Controller;

use App\Entity\Debilidad;
use App\Entity\Pokemon;
use Doctrine\ORM\EntityManagerInterface;
use ReturnTypeWillChange;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{

  #[Route("/pokemon/{id}", name: "getpokemon")]

  public function getPokemon(EntityManagerInterface $doctrine, $id)
  {
    $repositorio = $doctrine->getRepository(Pokemon::class);
    $pokemon = $repositorio->find($id);
    return $this->render("Pokemons/GetPokemon.html.twig", ["pokemon" => $pokemon]);
  }

  #[Route("/pokemons", name: "listpokemons")]
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

    //  Creamos las debilidades, y les damos las propiedades que queremos
    $debilidad = new Debilidad();
    $debilidad->setNombre('Fuego');

    $debilidad2 = new Debilidad();
    $debilidad2->setNombre('Tierra');

    $debilidad3 = new Debilidad();
    $debilidad3->setNombre('Agua');

    $pokemon->addDebilidade($debilidad);
    $pokemon->addDebilidade($debilidad3);

    $pokemon2->addDebilidade($debilidad2);


    // El persis es para que doctrine sepa que queremos instertar ese objeto en base de datos
    // El flush es el que realmente hace la insercion o sea en plan lo registra

    $doctrine->persist($pokemon);
    $doctrine->persist($pokemon2);
    $doctrine->persist($pokemon3);
    $doctrine->persist($debilidad);
    $doctrine->persist($debilidad2);
    $doctrine->persist($debilidad3);



    $doctrine->flush();

    return new Response("Pokemons insertados correctamente");
  }
}
