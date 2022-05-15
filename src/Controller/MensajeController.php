<?php

namespace App\Controller;

use App\Entity\Mensaje;
use App\Form\MensajeType;
use App\Repository\MensajeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mensaje")
 */
class MensajeController extends AbstractController
{
    /**
     * @Route("/", name="app_mensaje_index", methods={"GET"})
     */
    public function index(MensajeRepository $mensajeRepository): Response
    {
        return $this->render('mensaje/index.html.twig', [
            'mensajes' => $mensajeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_mensaje_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MensajeRepository $mensajeRepository): Response
    {
        $mensaje = new Mensaje();
        $form = $this->createForm(MensajeType::class, $mensaje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mensajeRepository->add($mensaje, true);

            return $this->redirectToRoute('app_mensaje_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mensaje/new.html.twig', [
            'mensaje' => $mensaje,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_mensaje_show", methods={"GET"})
     */
    public function show(Mensaje $mensaje): Response
    {
        return $this->render('mensaje/show.html.twig', [
            'mensaje' => $mensaje,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_mensaje_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Mensaje $mensaje, MensajeRepository $mensajeRepository): Response
    {
        $form = $this->createForm(MensajeType::class, $mensaje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mensajeRepository->add($mensaje, true);

            return $this->redirectToRoute('app_mensaje_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mensaje/edit.html.twig', [
            'mensaje' => $mensaje,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_mensaje_delete", methods={"POST"})
     */
    public function delete(Request $request, Mensaje $mensaje, MensajeRepository $mensajeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mensaje->getId(), $request->request->get('_token'))) {
            $mensajeRepository->remove($mensaje, true);
        }

        return $this->redirectToRoute('app_mensaje_index', [], Response::HTTP_SEE_OTHER);
    }
}
