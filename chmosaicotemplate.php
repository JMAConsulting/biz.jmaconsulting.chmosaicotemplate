<?php

require_once 'chmosaicotemplate.civix.php';
use CRM_Chmosaicotemplate_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function chmosaicotemplate_civicrm_config(&$config) {
  _chmosaicotemplate_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function chmosaicotemplate_civicrm_xmlMenu(&$files) {
  _chmosaicotemplate_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function chmosaicotemplate_civicrm_install() {
  _chmosaicotemplate_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function chmosaicotemplate_civicrm_postInstall() {
  _chmosaicotemplate_civix_civicrm_postInstall();
  $upgrade = new CRM_Chmosaicotemplate_Upgrader(E::LONG_NAME, realpath(__DIR__ . '/'));
  $upgrade->cleanupDatabaseTemplates();
  // Ensure the latest standard template is used.
  $upgrade->fixUpBasicThankYouTemplate();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function chmosaicotemplate_civicrm_uninstall() {
  _chmosaicotemplate_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function chmosaicotemplate_civicrm_enable() {
  _chmosaicotemplate_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function chmosaicotemplate_civicrm_disable() {
  _chmosaicotemplate_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function chmosaicotemplate_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _chmosaicotemplate_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function chmosaicotemplate_civicrm_managed(&$entities) {
  _chmosaicotemplate_civix_civicrm_managed($entities);
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
function chmosaicotemplate_civicrm_caseTypes(&$caseTypes) {
  _chmosaicotemplate_civix_civicrm_caseTypes($caseTypes);
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
function chmosaicotemplate_civicrm_angularModules(&$angularModules) {
  _chmosaicotemplate_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function chmosaicotemplate_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _chmosaicotemplate_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function chmosaicotemplate_civicrm_entityTypes(&$entityTypes) {
  _chmosaicotemplate_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function chmosaicotemplate_civicrm_themes(&$themes) {
  _chmosaicotemplate_civix_civicrm_themes($themes);
}

/**
 * Implements hook_civicrm_mosaicoBaseTemplates().
 *
 * @link https://github.com/veda-consulting/uk.co.vedaconsulting.mosaico/blob/2.x/API.md
 */
function chmosaicotemplate_civicrm_mosaicoBaseTemplates(&$templates) {
  $templates['chtemplate'] = array(
    'name' => 'chtemplate',
    'title' => 'Canada Helps template',
    'path' => E::url('chtemplate/chtemplate.html'),
    'thumbnail' => E::url('chtemplate/edres/_full.png'),
  );
}

function chmosaicotemplate_civicrm_buildForm($formName, &$form) {
  if ('CRM_Contribute_Form_Task_PDFLetter' == $formName) {
    unset($form->_elements[$form->_elementIndex['document_file']], $form->_elements[$form->_duplicateIndex['document_file'][0]]);
    unset($form->_elementIndex['document_file'], $form->_duplicateIndex['document_file']);

    CRM_Core_Resources::singleton()->addScript(
      "CRM.$(function($) {
        $('#template').parent().html($('#template').parent().html().replace('OR', ''));
      });"
    );
  }
}

function chmosaicotemplate_civicrm_apiWrappers(&$wrappers, $apiRequest) {
  if ($apiRequest['entity'] == 'MosaicoTemplate' && $apiRequest['action'] == 'get') {
    $wrappers[] = new CRM_Chmosaicotemplate_TemplateWrapper();
  }
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 *
function chmosaicotemplate_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 *
function chmosaicotemplate_civicrm_navigationMenu(&$menu) {
  _chmosaicotemplate_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _chmosaicotemplate_civix_navigationMenu($menu);
} // */
