<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'admin' => [[], ['_controller' => 'App\\Controller\\Admin\\DashboardController::index'], [], [['text', '/admin']], [], [], []],
    'app_home' => [[], ['_controller' => 'App\\Controller\\DataInputController::index'], [], [['text', '/']], [], [], []],
    'app_data_input' => [[], ['_controller' => 'App\\Controller\\DataInputController::invoerReisgegevens'], [], [['text', '/data_input']], [], [], []],
    'app_old_home' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/hh']], [], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\LoginController::index'], [], [['text', '/login']], [], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\LoginController::logout'], [], [['text', '/logout']], [], [], []],
    'app_registration' => [[], ['_controller' => 'App\\Controller\\RegistrationController::reg'], [], [['text', '/registration']], [], [], []],
    'app_weergave_reisgegevens' => [[], ['_controller' => 'App\\Controller\\WeergaveReisgegevensController::index'], [], [['text', '/weergave']], [], [], []],
    'app_weergave_reisgegevens_groupbyvervoer' => [[], ['_controller' => 'App\\Controller\\WeergaveReisgegevensController::groupbyvervoer'], [], [['text', '/weergave/groupbyvervoer']], [], [], []],
    'app_weergave_reisgegevens_groupbydatum' => [[], ['_controller' => 'App\\Controller\\WeergaveReisgegevensController::groupbydatum'], [], [['text', '/weergave/groupbydatum']], [], [], []],
    'app_weergave_reisgegevens_groupby2' => [[], ['_controller' => 'App\\Controller\\WeergaveReisgegevensController::groupbyid2'], [], [['text', '/weergave/groupby2']], [], [], []],
    'app_download_reisgegevens' => [[], ['_controller' => 'App\\Controller\\WeergaveReisgegevensController::exportcsv'], [], [['text', '/weergave/download']], [], [], []],
    'app_download2_reisgegevens' => [[], ['_controller' => 'App\\Controller\\WeergaveReisgegevensController::exportcsv2'], [], [['text', '/weergave/download2']], [], [], []],
    'app_welcome' => [[], ['_controller' => 'App\\Controller\\WelcomeController::index'], [], [['text', '/welcome']], [], [], []],
];
