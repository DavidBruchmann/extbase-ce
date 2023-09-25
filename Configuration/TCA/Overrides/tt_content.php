<?php

defined('TYPO3') || die();

call_user_func(function()
{
    /**
     * Temporary variables
     */
    $extensionKey = 'extbase_ce';

    $GLOBALS['TCA']['tt_content']['palettes']['basic'] = [
        'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general',
        'showitem' =>
            'CType;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:CType_formlabel, ' .
            'colPos;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:colPos_formlabel, ' .
            'sys_language_uid;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:sys_language_uid_formlabel,l18n_parent ' .
            '',
    ];

    /*****************
     * TEASER ELEMENT
     *****************/
    $GLOBALS['TCA']['tt_content']['types']['extbasece_extbasece'] = [
        'columnsOverrides' => [
            'bodytext' => [
                'config' => [
                    'enableRichtext' => 1,
                ],
            ],
            'layout' => [
                'config' => [
                    'items' => [
                        [
                            'label' => 'Default',
                            'value' => '0'
                        ],
                        [
                            'label' => 'Layout 1',
                            'value' => '1'
                        ],
                        [
                            'label' => 'Layout 2',
                            'value' => '2'
                        ],
                        [
                            'label' => 'Layout 3',
                            'value' => '3'
                        ],
                        [
                            'label' => 'Layout 4',
                            'value' => '4'
                        ],
                        [
                            'label' => 'Layout 5',
                            'value' => '5'
                        ],
                        [
                            'label' => 'Layout 6',
                            'value' => '6'
                        ],
                        [
                            'label' => 'Layout 7',
                            'value' => '7'
                        ],
                        [
                            'label' => 'Layout 8',
                            'value' => '8'
                        ],
                        [
                            'label' => 'Layout 9',
                            'value' => '9'
                        ],
                        [
                            'label' => 'Layout 10',
                            'value' => '10'
                        ],
                        [
                            'label' => 'Layout 11',
                            'value' => '11'
                        ],
                        [
                            'label' => 'Layout 12',
                            'value' => '12'
                        ],
                        [
                            'label' => 'Layout 13',
                            'value' => '13'
                        ],
                        [
                            'label' => 'Layout 14',
                            'value' => '14'
                        ],
                        [
                            'label' => 'Layout 15',
                            'value' => '15'
                        ],
                        [
                            'label' => 'Layout 16',
                            'value' => '16'
                        ],
                        [
                            'label' => 'Layout 17',
                            'value' => '17'
                        ],
                        [
                            'label' => 'Layout 18',
                            'value' => '18'
                        ],
                    ],
                ],
            ],
        ],
        'showitem' =>
            '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, ' .
            '--palette--;;basic, ' .
            'header, ' .
            'subheader, ' .
            'header_link, ' .
            'date, ' .
            'bodytext, ' .
            'image, ' .
            '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance, ' .
            '--palette--;;frames, ' .
            '--palette--;;appearanceLinks, ' .
            '--div--;Access, ' .
            '--palette--;Visibility;hidden, ' .
            '--palette--;Publish Dates and Access Rights;access, ',
    ];

    /** *******************************************************
     *  Add Content Elements fo selection in tt_content records
     *  (sorted alühabetically)
     ** *******************************************************/
    $groupID = 'Extbase CE';
    $cTypes = [
        [
            '0' => 'Demo: Extbase Content Element',
            '1' => 'extbasece_extbasece',
            '2' => 'tx-extbasece-extbasece',
            '3' => $groupID,
        ]
    ];

    $type = 'CType';
    foreach ($cTypes as $count => $itemArray) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin($itemArray, $type, $extensionKey);
    }

});
