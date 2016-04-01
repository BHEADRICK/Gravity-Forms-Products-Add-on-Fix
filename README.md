Gravity Forms Product Add-on Fix
==========================

## Synopsis
At some point after Gravity Forms v1.9.10.2, WooCommerce GF Product Forms Add-on stopped working, in that the price did not display on product pages.

The issue is that with newer versions, a Total field is required to be on the form, but there was no conversion in the upgrade path to add this or notify the user that this is missing.

If you have several forms, this can be a pain to have to do manually, so I created this plugin to update all product forms, adding a total field if one is missing.

All forms will be checked for woocommerce-related fields, and if a total field is missing from the form, it will be added at the end.

This will happen when the plugin is activated. You can deactivate it immediately afterwards.
