<?php

namespace Drupal\sagres\Theme;

use Drupal\Core\Theme\ThemeNegotiatorInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Logger\RfcLogLevel;

/**
 * Classe responsável por definir o tema Olivero apenas para as rotas do módulo sagres.
 */
class sagresThemeNegotiator implements ThemeNegotiatorInterface {

  /**
   * Verifica se este negociador deve ser aplicado à rota atual.
   */
  public function applies(RouteMatchInterface $route_match) {
    //\Drupal::logger('sagres')->log(RfcLogLevel::INFO, 'MeuThemeNegotiator => applies() chamado');
    // Obtenha o nome da rota para decidir.
    $route_name = $route_match->getRouteName();

    // Nesse exemplo, verificamos se a rota inicia com "sagres."
    // Ou seja, todas as rotas definidas no sagres.routing.yml serão afetadas.
    if (strpos($route_name, 'sagres.landing_page') === 0) {
      return TRUE;
    }

    return FALSE;
  }

  /**
   * Define qual tema deve ser carregado quando applies() retornar TRUE.
   */
  public function determineActiveTheme(RouteMatchInterface $route_match) {
    // Retorne o machine name do tema. Para o Olivero, é "olivero".
    return 'hasco_barrio';
  }

}
