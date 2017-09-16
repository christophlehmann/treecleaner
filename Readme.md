# TYPO3 Extension: Tree cleaner

* Hides duplicates in page- and category-tree (backend) created by overlapping mounts in backend user groups
* Lighter backend user management
* Uses signals/hooks, no XClass

## Background

An editor is member of multiple backend user groups with overlapping/duplicates Mounts (Pages, Categories, Files) an see their content multiple times.
The ugly default solution is to functional groups like `_PagetreeX` and `_PagetreeY` which makes backend user administration more complex.

## Contribution

This extension is managed on GitHub. Feel free to get in touch at https://github.com/christophlehmann/treecleaner