<?php

defined('TYPO3') || die();

use WDB\ExtbaseCe\Controller\ExtbaseCeController;
use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

call_user_func(function () {

    /**
     * Temporary variables
     */
    $extensionKey = 'extbase_ce';

    /***************
     * PLUGINS / CONTENT ELEMENTS
     */
    ExtensionUtility::configurePlugin(
        'ExtbaseCe', // $extensionName
        'ExtbaseCe', // $pluginName
        [ // $controllerActions
            ExtbaseCeController::class => 'render',
        ],
        [ // $nonCacheableControllerActions
            ExtbaseCeController::class => '',
        ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT, // $pluginType
    );

    /***************
     * ICONS
     */
    $icons = [
        // -- 'identifier' => 'filename' --
        ['extbasece', 'tx_extbasece_extbasece.svg'],
    ];
    $iconRegistry = GeneralUtility::makeInstance(
        IconRegistry::class
    );
    foreach ($icons as $count => $iconData) {
        $iconRegistry->registerIcon(
            'tx-extbasece-' . $iconData[0],
            BitmapIconProvider::class,
            [
                'source' => 'EXT:' . $extensionKey . '/Resources/Public/Icons/' . $iconData[1],
            ]
        );
    }

    /***************
     * WIZARDS
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.common {
                elements {
                    extbasece {
                        iconIdentifier = tx-extbasece-extbasece
                        title = LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_db.xlf:tx_extbasece_extbasece.name
                        description = LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_db.xlf:tx_extbasece_extbasece.description
                        tt_content_defValues {
                            CType = extbasece_extbasece
                        }
                    }
                }
                show = *
            }
            wizards.newContentElement.wizardItems.extbasece {
                header = LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_db.xlf:tx_extbasece_extbasece.wizardItems.tab.header
                elements {
                    extbasece {
                        iconIdentifier = tx-extbasece-extbasece
                        title = LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_db.xlf:tx_extbasece_extbasece.name
                        description = LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_db.xlf:tx_extbasece_extbasece.description
                        tt_content_defValues {
                            CType = extbasece_extbasece
                        }
                    }
                }
                show = *
            }
       }'
    );

});
