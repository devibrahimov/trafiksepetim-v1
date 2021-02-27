<?php 


mkdir("/home/trafiksepetim/public_html/public/storage/uploads/thumbnail/malls/30/productimages/small", 0777, true);
file_put_contents("/home/trafiksepetim/public_html/public/storage/uploads/thumbnail/malls/30/productimages/small/211604763737.jpg", "test data");



echo file_get_contents("/home/trafiksepetim/public_html/public/storage/uploads/thumbnail/malls/30/productimages/small/211604763737.jpg");