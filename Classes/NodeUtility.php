<?php
namespace Lemming\TreeCleaner;

class NodeUtility {

    /**
     * Remove duplicate nodes
     *
     * @param \TYPO3\CMS\Backend\Tree\TreeNodeCollection $nodeCollection
     * @return \TYPO3\CMS\Backend\Tree\TreeNodeCollection
     */
    public static function removeDuplicateNodes($nodeCollection) {
        /** @var \TYPO3\CMS\Backend\Tree\TreeNode $nodeA */
        foreach ($nodeCollection as $index => $nodeA) {

            /** @var \TYPO3\CMS\Backend\Tree\TreeNode $nodeB */
            foreach ($nodeCollection as $nodeB) {

                if ($nodeA->getId() != $nodeB->getId()) {
                    if (self::nodeIsChildOfNode($nodeA, $nodeB)) {
                        unset($nodeCollection[$index]);
                    }
                }
            }
        }

        return $nodeCollection;
    }

    /**
     * Lookup for a node in a node tree
     *
     * @param \TYPO3\CMS\Backend\Tree\TreeNode $node
     * @param \TYPO3\CMS\Backend\Tree\TreeNode $tree
     * @return bool
     */
    public static function nodeIsChildOfNode($node, $tree) {
        if ($tree->getId() == $node->getId()) {
            return true;
        }

        $childNodes = $tree->getChildNodes();
        if ($childNodes !== null) {
            foreach ($tree->getChildNodes() as $childNode) {
                if (self::nodeIsChildOfNode($node, $childNode) === true) {
                    return true;
                }
            }
        }

        return false;
    }
}