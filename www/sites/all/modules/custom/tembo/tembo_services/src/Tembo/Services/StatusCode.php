<?php
/**
 * Created by PhpStorm.
 * User: moe
 * Date: 14/08/2014
 * Time: 08:40
 */

namespace Tembo\Services;


class StatusCode
{

    /**
     * INFORMATION
     *
     * 100 - Attente de la suite de la requête
     * 102 - Traitement en cours
     * 118 - Délai imparti à l'opération dépassé
     */
    const STATUS_CONTINUE           = 100;
    const PROCESSING                = 102;
    const CONNECTION_TIMED_OUT      = 118;

    /**
     * SUCCESS
     *
     * 200 - Requête traitée avec succès
     * 201 - Requête traitée avec succès avec création d’un document
     * 204 - Requête traitée avec succès mais pas d’information à renvoyer
     * 205 - Requête traitée avec succès, la page courante peut être effacée
     * 206 - Une partie seulement de la requête a été transmise
     */
    const OK                        = 200;
    const CREATED                   = 201;
    const NO_CONTENT                = 204;
    const RESET_CONTENT             = 205;
    const PARTIAL_CONTENT           = 206;

    /**
     * REDIRECTION
     *
     * 301 - Document déplacé de façon permanente
     * 304 - Document non modifié depuis la dernière requête
     */
    const MOVED_PERMANENTLY         = 301;
    const NOT_MODIFIED              = 304;

    /**
     * CLIENT ERROR
     *
     * 400 - La syntaxe de la requête est erronée
     * 401 - Une authentification est nécessaire pour accéder à la ressource
     * 403 - Le serveur a compris la requête, mais refuse de l'exécuter. Contrairement
     *       à l'erreur 401, s'authentifier ne fera aucune différence. Sur les serveurs
     *       où l'authentification est requise, cela signifie généralement que l'authentification
     *       a été acceptée mais que les droits d'accès ne permettent pas au client d'accéder à
     *       la ressource
     * 404 - Ressource non trouvée
     */
    const BAD_REQUEST               = 400;
    const UNAUTHORIZED              = 401;
    const FORBIDDEN                 = 403;
    const NOT_FOUND                 = 404;

    /**
     * SERVER ERROR
     *
     * 500 - Erreur interne du serveur
     * 501 - Fonctionnalité réclamée non supportée par le serveur
     * 503 - Service temporairement indisponible ou en maintenance
     * 504 - Temps d’attente d’une réponse d’un serveur à un serveur intermédiaire écoulé
     * 520 - Le serveur renvoie une erreur inconnue
     */
    const INTERNAL_SERVER_ERROR     = 500;
    const NOT_IMPLEMENTED           = 501;
    const SERVICE_UNAVAILABLE       = 503;
    const GATEWAY_TIME_OUT          = 504;
    const UNKNOW_ERROR              = 520;

}