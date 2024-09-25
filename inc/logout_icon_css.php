<style>
.header_icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px; 
    height: 40px;
    border-radius: 50%; 
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    transition: background-color 0.3s ease, color 0.3s ease; 
    margin-left: 10px; /* مسافة بين الأيقونات */
    padding: 8px;
}

.header_icon:hover {
    background-color: #e9ecef; 
    color: #007bff; 
}

.header_icon i {
    margin: 0; 
}

.order_icon_wrapper,
.mini_cart_wrapper,
.header_wishlist {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-left: 15px; /* ضبط المسافة بين الأيقونات */
}

.middel_right_info {
    display: flex; /* استخدام الفليكس لجعل العناصر في صف واحد */
    align-items: center; /* محاذاة العناصر عموديًا في المنتصف */
}

.order_icon_wrapper,
.mini_cart_wrapper,
.header_wishlist {
    margin-left: 15px; /* مسافة بين الأيقونات */
}

.order_icon_wrapper a,
.mini_cart_wrapper a,
.header_wishlist a {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px; /* حجم الأيقونة */
    color: #fff; /* لون الأيقونة */
}

.order_icon_wrapper a:hover,
.mini_cart_wrapper a:hover,
.header_wishlist a:hover {
    color: #007bff; /* تغيير اللون عند التمرير */
}

.order_icon_wrapper i,
.mini_cart_wrapper img,
.header_wishlist img {
    width: 24px; /* عرض الأيقونة */
    height: 24px; /* ارتفاع الأيقونة */
}

</style>
