<?php

require_once 'chmosaicotempate.civix.php';
use CRM_Chmosaicotempate_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/ 
 */
function chmosaicotempate_civicrm_config(&$config) {
  _chmosaicotempate_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function chmosaicotempate_civicrm_xmlMenu(&$files) {
  _chmosaicotempate_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function chmosaicotempate_civicrm_install() {
  _chmosaicotempate_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function chmosaicotempate_civicrm_postInstall() {
  _chmosaicotempate_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function chmosaicotempate_civicrm_uninstall() {
  _chmosaicotempate_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function chmosaicotempate_civicrm_enable() {
  _chmosaicotempate_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function chmosaicotempate_civicrm_disable() {
  _chmosaicotempate_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function chmosaicotempate_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _chmosaicotempate_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function chmosaicotempate_civicrm_managed(&$entities) {
  _chmosaicotempate_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function chmosaicotempate_civicrm_caseTypes(&$caseTypes) {
  _chmosaicotempate_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function chmosaicotempate_civicrm_angularModules(&$angularModules) {
  _chmosaicotempate_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function chmosaicotempate_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _chmosaicotempate_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function chmosaicotempate_civicrm_entityTypes(&$entityTypes) {
  _chmosaicotempate_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function chmosaicotempate_civicrm_themes(&$themes) {
  _chmosaicotempate_civix_civicrm_themes($themes);
}

/**
 * Implements hook_civicrm_mosaicoBaseTemplates().
 *
 * @link https://github.com/veda-consulting/uk.co.vedaconsulting.mosaico/blob/2.x/API.md
 */
function chmosaicotempate_civicrm_mosaicoBaseTemplates(&$templates) {
  $templates['chtemplate'] = array(
    'name' => 'chtemplate',
    'title' => 'Mosaico Agora',
    'path' => E::url('chtemplate/chtemplate.html'),
    'thumbnail' => E::url('chtemplate/edres/_full.png'),
  );
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 *
function chmosaicotempate_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 *
function chmosaicotempate_civicrm_navigationMenu(&$menu) {
  _chmosaicotempate_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _chmosaicotempate_civix_navigationMenu($menu);
} // */
