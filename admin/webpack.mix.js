const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")

    .js('resources/js/admin/category.js', 'public/js/admin')
    .js('resources/js/admin/product.js', 'public/js/admin')
    .js('resources/js/admin/promoCode.js', 'public/js/admin')
    .js('resources/js/admin/feedback.js', 'public/js/admin')
    .js('resources/js/admin/cardProvider.js', 'public/js/admin')
    .js('resources/js/admin/cardTransaction.js', 'public/js/admin')
    .js('resources/js/admin/cardExchanger.js', 'public/js/admin')
    .js('resources/js/admin/cardExchangerRate.js', 'public/js/admin')
    .js('resources/js/admin/order.js', 'public/js/admin')
    .js('resources/js/admin/group_product.js', 'public/js/admin')
    .js('resources/js/admin/slider.js', 'public/js/admin')
    .js('resources/js/user/home.js', 'public/js/user')
    
    .js("resources/js/admin/user.js", "public/js/admin")
    .js("resources/js/admin/global.js", "public/js/admin")
    .js("resources/js/admin/post_cateogry.js", "public/js/admin")
    .js("resources/js/admin/post_tab.js", "public/js/admin")
    .js("resources/js/admin/post_blog.js", "public/js/admin")
    .js("resources/js/admin/post_blog_write.js", "public/js/admin")
    .js("resources/js/admin/config_system.js", "public/js/admin")
    .js("resources/js/admin/referPartner.js", "public/js/admin")
    .js("resources/js/admin/hirePartner.js", "public/js/admin")
    .js("resources/js/admin/kolPartner.js", "public/js/admin")
    .js("resources/js/admin/log_activity.js", "public/js/admin")

    .sass("resources/sass/admin.scss", "public/css")
    .sass("resources/sass/client.scss", "public/css")
    .sass("resources/sass/app.scss", "public/css");

mix.copy("resources/images", "public/images");
mix.copy("resources/css", "public/css");
mix.copy("resources/libraries", "public/libraries");
mix.copy("resources/fonts", "public/fonts");
mix.copy("resources/js/library", "public/js/library");
mix.copy('node_modules/bootstrap/dist', 'public/bootstrap5');
mix.copy('node_modules/jquery/dist', 'public/jquery');
mix.copy('node_modules/@fortawesome/fontawesome-free', 'public/fontawesome');