<?php
namespace Lemming\TreeCleaner\Hooks;

use Lemming\TreeCleaner\NodeUtility;

class PageTree implements \TYPO3\CMS\Backend\Tree\Pagetree\CollectionProcessorInterface {

    /**
     * Remove duplicate pages/mountpoints from page tree
     *
     * @param \TYPO3\CMS\Backend\Tree\Pagetree\PagetreeNode $node
     * @param int $mountPoint
     * @param int $level
     * @param \TYPO3\CMS\Backend\Tree\Pagetree\PagetreeNodeCollection $nodeCollection
     */
    public function postProcessGetNodes($node, $mountPoint, $level, $nodeCollection) {

        if ($GLOBALS['BE_USER']->isAdmin()) {
            return;
        }

        // Check if end of tree building is reached
        if ($level != 0) {
            return;
        }

        $nodeCollection = NodeUtility::removeDuplicateNodes($nodeCollection);
    }

    public function postProcessGetTreeMounts($searchFilter, $nodeCollection) {
    }

    public function postProcessFilteredNodes($node, $searchFilter, $mountPoint, $nodeCollection) {
    }

}