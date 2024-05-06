<p align="center">
    <u>Choisir une langue</u> : 
    <a href="README_fr.md">Français</a>
    ·
    <a href="README.md">English</a>
</p>

## Description du projet
L'objectif est de développer un chatbot conversationnel en utilisant la modèle GPT-2 de la bibliothèque Keras NLP comme une base.

Il sera capable d'engager des conversations naturelles avec les utilisateurs, répondre à leur questions dans un domaine spécifique (voir partie Jeu de données) and proposer des informations utiles.

Le chatbot répondra en **Anglais**.

Vous pouvez vous référer au sujet <a href="SAE-IA.pdf">SAE-IA.pdf</a>.

## Membres de l'équipe
Pour chaque livrable, un manager est désigné.

Voici la liste des membres de l'équipe et les managers.
Il n'y pas de manager pour le **Livrable 1** puisque la tâche constituait seulement à la constition des équipes.

* Yassine BELLAGRAA (Livrable 6)
* Amadou DIA
* Salma BOUSSERHANE (Livrable 5)
* Walid OUBELLA
* Maxime NGUYEN (Livrable 3)
* Selma MAZGAR (Livrable 2)
* Chrinovic KIBANGU TSIMBA (Livrable 4)

Quand un étudiant est manager, il a certaines tâches à effectuer : 
* (Re)planification des tâches
* Communication des livrables à l'équipe et à l'équipe pédagogique
* Evaluation des tâches complétées
* Créer un rapport de management

## Ressources
* Modèe GPT-2 de la bibliothèque Keras NLP pour le fine-tuning et la génération de texte: https://keras.io/keras_nlp/
* Gradio pour l'UI, le front end du chatbot: https://www.gradio.app/
* Les notebooks Python Jupyter et Google pour tester le chatbot

## Jeu de données
Le jeu de données que nous utiliserons vient du site Kaggle et concerne les témoignages atteintes de cancer: https://www.kaggle.com/datasets/falgunipatel19/biomedical-text-publication-classification 

## Déploiement
Le code et l'application Gradio application seront déposées sur un répertoire Hugging Face que l'on peut trouver ici: 

## Tâches du projet et livrables (et leur dossiers relatifs)

* **(20 octobre 2023) - Livrable 1/** 
    * Composition de l'équipe, choix des managers, création du dépot Git accessible par les membres de l'équipe et l'équipe pédagogique  
* **(17 novembre 2023) - Livrable 2/**
    * Comprendre le fonctionnement du modèle GPT-2 and poser quelques questions pour le modèle pré-entrainé
    * Analyse des conditions juridiques d’utilisation des données initiales
* **(18 décembre 2023) - Livrable 3/**
    * Analyse des données avec un wordcloud and récupération des données
* **(19 janvier 2024) - Livrable 4/**
    * Prototype de l'application Gradio et fine-tuning du modèle pré-entrainé
* **(16 février 2024) - Livrable 5/**
    * Rapport sur la comparaison entre le modèle pré-entrainé (générique) et le modèle entrainé (premier fine-tuning)
* **(4 mars 2024) - Livrable 6/**
    * Optimiser les performances du modèle entrainé par rapport aux résultats du **Livrable 5** (deuxième fine-tuning)

## Objectifs d'apprentissage
* Comprendre les concepts de chatbots conversationnels et les modèles de langages
* Compétences en préparation des données,fine-tuning du modèle, et évaluation des performances de l'évaluation du chatbot 
* Compétences en développement d'interfaces pour une bonne expérience utilisateur 
* Capacité à documenter et à présenter un projet de chatbot complet
* Créer un chatbot conversationnel personnalisé, comprendre les défis liés à la génération de texte cohérent et de développer des compétences pratiques en matière de développement de chatbots
interactifs