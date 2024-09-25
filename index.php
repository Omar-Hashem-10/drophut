<?php

require_once 'src/config.php';
require_once ROOT_PATH . 'core/functions.php'; 

if(isset($_GET['page']))
{
    switch($_GET['page']) {
        case 'home':
            require_once 'views/home.php';
            break;
        case 'about':
            require_once 'views/about.php';
            break;
        case 'blog-details':
            require_once 'views/blog-details.php';
            break;
        case 'blog':
            require_once 'views/blog.php';
            break;
        case 'checkout':
            require_once 'views/checkout.php';
            break;
        case 'contact':
            require_once 'views/contact.php';
            break;
        case 'faq':
            require_once 'views/faq.php';
            break;
        case 'forget-password':
            require_once 'views/forget-password.php';
            break;
        case 'login':
            require_once 'views/login.php';
            break;
        case 'logout':
            require_once 'views/logout.php';
            break;
        case 'register':
            require_once 'views/register.php';
            break;
        case 'my-account':
            require_once 'views/my-account.php';
            break;
        case 'products':
            require_once 'views/products.php';
            break;
        case 'product-details':
            require_once 'views/product-details.php';
            break;
        case 'cart':
            require_once 'views/cart.php';
            break;
        case 'tracking':
            require_once 'views/tracking.php';
            break;
        case 'wishlist':
            require_once 'views/wishlist.php';
            break;
        case 'privacy-policy':
            require_once 'views/privacy-policy.php';
            break;
        case 'order':
            require_once 'views/order.php';
            break;
        case 'order-details':
            require_once 'views/order-details.php';
            break;
        case 'feedback':
            require_once 'views/feedback.php';
            break;
        case 'edit-profile':
            require_once 'views/edit-profile.php';
            break;
        default:
        require_once 'views/404.php';
        break;
    }
}else{
    require_once 'views/home.php';
}