<?php

namespace App\DataFixtures;

use App\Entity\Services;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $service = new Services();
        $service->setNom("Salle de Bains");
        $service->setDescription("Ensemble complet comprenant meuble sous vasque, miroir avec éclairage LED et colonne de rangement.
                                    Façades en MDF laqué hydrofuge, résistantes à l’humidité et faciles à entretenir.
                                    Plan vasque en céramique ou résine, finition brillante, résistant aux rayures et aux taches.
                                    Système de fermeture amortie (soft-close) sur les portes et tiroirs pour un confort optimal.
                                    Éclairage LED intégré basse consommation, conforme aux normes IP44 pour pièces humides.
                                    Rangement optimisé avec étagères réglables et tiroirs à grande capacité.
                                    Compatible avec toutes les arrivées standard – Installation simple et rapide.
                                    Conforme aux normes européennes EN 14688 (lavabos) et EN 14749 (meubles de salle de bains).");
        $service->setImage("image/salle de bains.jpg");
        $manager->persist($service);


        $service = new Services();
        $service->setNom("Cuisine");
        $service->setDescription("Cuisine fonctionnelle et contemporaine conçue pour un usage quotidien intensif.
                                    Meubles en panneaux mélaminés haute densité, résistants à l’humidité et aux rayures.
                                    Façades finition mate avec charnières amorties (soft-close) pour un confort d’utilisation optimal.
                                    Plan de travail stratifié épaisseur 38 mm, résistant à la chaleur et aux taches.
                                    Coulisses à sortie totale pour un accès facilité aux tiroirs et rangements.
                                    Éléments modulables, compatibles avec électroménager encastré.
                                    Livrée prête à poser – Conforme aux normes EN 14749 (mobilier de cuisine domestique).");
        $service->setImage("image/cuisine.webp");
        $manager->persist($service);


        $service = new Services();
        $service->setNom("Carrelage");
        $service->setDescription("Carrelage hautement résistant, conçu pour un usage intensif en intérieur comme en extérieur.
                                    Fabriqué en grès cérame pleine masse, il offre une excellente durabilité face à l’usure, aux chocs et au gel.
                                    Surface rectifiée pour une pose avec joints fins, compatible avec chauffage au sol.
                                    Finition mate antidérapante (R10), adaptée aux pièces humides telles que cuisines ou salles de bains.
                                    Entretien facile grâce à une surface imperméable et résistante aux taches et agents chimiques.
                                    Conforme aux normes EN ISO 10545 (absorption < 0,5 %, résistance mécanique > 35 N/mm²).");
        $service->setImage("image/carrelage.jpg");
        $manager->persist($service);


        $service = new Services();
        $service->setNom("Extension de maison");
        $service->setDescription("Réalisation d’extensions adaptées à tous types de constructions (traditionnelle ou contemporaine).
                                    Structure en ossature bois, parpaing ou métal, selon vos besoins et les contraintes du terrain.
                                    Isolation thermique renforcée (RT 2012 ou RE 2020 selon projet) avec menuiseries double ou triple vitrage.
                                    Toiture plate ou inclinée, étanchéité bitume ou membrane PVC selon configuration.
                                    Revêtements extérieurs au choix : enduit, bardage bois, zinc ou composite.
                                    Intégration complète aux réseaux existants (électricité, plomberie, chauffage).
                                    Livraison clé en main avec finitions intérieures : cloisonnement, sol, peinture, équipements sanitaires si besoin.
                                    Démarches administratives incluses (permis de construire ou déclaration préalable).
                                    Garantie décennale – Conformes aux normes en vigueur (DTU, RE 2020, etc.).");
        $service->setImage("image/extension-toit-zinc.jpg");
        $manager->persist($service);


        $service = new Services();
        $service->setNom("Chape fluide");
        $service->setDescription("Chape fluide à base d’anhydrite ou de ciment, idéale pour sols intérieurs neufs ou en rénovation.
                                    Application rapide par pompage, avec mise en œuvre jusqu’à 1 000 m²/jour sans joints de fractionnement (selon type).
                                    Parfaitement compatible avec planchers chauffants hydrauliques ou électriques (chauffage au sol).
                                    Épaisseur recommandée : 3 à 6 cm selon usage – excellente planéité sans ragréage complémentaire.
                                    Haute conductivité thermique (λ ≈ 1,4 à 2,0 W/m·K selon formulation) pour optimiser le rendement énergétique.
                                    Résistance mécanique élevée (≥ 25 MPa) – convient pour tous types de revêtements : carrelage, parquet, PVC, etc.
                                    Séchage rapide (variable selon hygrométrie) – délais adaptés aux contraintes de chantier.
                                    Conforme aux normes NF EN 13813 – Produit sous avis technique CSTB.");
        $service->setImage("image/chape-liquide.jpg");
        $manager->persist($service);


        $service = new Services();
        $service->setNom("Terrasse");
        $service->setDescription("Terrasse conçue pour un usage extérieur intensif, avec matériaux résistants aux intempéries et aux UV.
                                    Structure en bois massif traité classe 4 ou en composite haute performance, sans entretien.
                                    Lames larges et antidérapantes, posées sur plots réglables pour assurer la stabilité et faciliter le drainage.
                                    Compatible avec différents types de sols (terre, dalle béton, carrelage) grâce à un système de fixation adapté.
                                    Isolation phonique et thermique optimisée pour un confort maximal en toute saison.
                                    Résistance accrue à l’humidité, aux insectes et aux variations climatiques.
                                    Installation rapide, finitions soignées et possibilité de personnalisation (coloris, forme, éclairage intégré).
                                    Conforme aux normes en vigueur pour les espaces extérieurs (sécurité et accessibilité).");
        $service->setImage("image/terrasse.webp");
        $manager->persist($service);


        $user = new User();
        $user->setEmail('toto@exemple.com');
        $plaintextPassword = 'azerty';
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
        $user->setRoles(['ROLE_ADMIN' , 'ROLE_USER']);
        $user->setPseudo('toto');
        $user->setIsVerified(true);
        $manager->persist($user);

        $manager->flush();
    }
}
