<?php
$target = '/home/toconcep/public_html/test.toconcepts.com/storage/app/public';
$link = '/home/toconcep/public_html/test.toconcepts.com/public/storage';

if (symlink($target, $link)) {
echo 'Storage linked successfully!';
} else {
echo 'Failed to link storage.';
}
?>
