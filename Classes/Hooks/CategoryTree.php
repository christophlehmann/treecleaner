<?php
namespace Lemming\TreeCleaner\Hooks;

use Lemming\TreeCleaner\NodeUtility;

class CategoryTree {

    /**
     * Remove duplicate categories from category tree
     *
     * @param \TYPO3\CMS\Core\Tree\TableConfiguration\DatabaseTreeDataProvider $treeDataProvider
     * @param \TYPO3\CMS\Backend\Tree\TreeNode $treeNode
     */
    public function postProcessTreeData($treeDataProvider, $treeNode) {

        if ($GLOBALS['BE_USER']->isAdmin()) {
            return;
        }

        if ($treeDataProvider->getTableName() !== 'sys_category') {
            return;
        }

        $treeNode->setChildNodes(NodeUtility::removeDuplicateNodes($treeNode->getChildNodes()));
    }
}