<?php

namespace App\Controller;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController{
    #[Route('/new/user', name: "newUser")]
  public function newUser(Request $request, EntityManagerInterface $doctrine, UserPasswordHasherInterface $hasher)
  {
    $form = $this->createForm(UserType::class);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form -> isValid()){
        $user = $form ->getData();
        $password = $hasher->hashPassword($user, $user->getPassword());
        $user->setPassword($password);
        $doctrine->persist($user);

        $doctrine->flush();

        $this->addFlash("success", "Usuario insertado correctamente");

        return $this-> redirectToRoute("listpokemons");
    }
    return $this->render("Pokemons/newPokemon.html.twig", ["pokemonForm" => $form]);
  }

  #[Route('/new/admin', name: "newAdmin")]
  public function newAdmin(Request $request, EntityManagerInterface $doctrine, UserPasswordHasherInterface $hasher)
  {
    $form = $this->createForm(UserType::class);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form -> isValid()){
        $user = $form ->getData();
        $password = $hasher->hashPassword($user, $user->getPassword());
        $user->setPassword($password);
        $user->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
        $doctrine->persist($user);

        $doctrine->flush();

        $this->addFlash("success", "Usuario insertado correctamente");

        return $this-> redirectToRoute("listpokemons");
    }
    return $this->render("Pokemons/newPokemon.html.twig", ["pokemonForm" => $form]);
  }
}