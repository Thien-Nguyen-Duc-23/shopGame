<?php

namespace App\Factories;

use App\Repositories\Admin\ConfigSystemRepository;
use App\Repositories\Admin\HomeRepository;
use App\Repositories\Admin\LibraryRepository;
use App\Repositories\Admin\UserReposiroty;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Admin\AuthRepository;
use App\Repositories\Admin\CardExchangerRateRepository;
use App\Repositories\Admin\CardExchangerRepository;
use App\Repositories\Admin\CardProviderRepository;
use App\Repositories\Admin\CardTransactionRepository;
use App\Repositories\Admin\KolPartnerRepository;
use App\Repositories\Admin\ReferPartnerRepository;
use App\Repositories\Admin\HirePartnerRepository;
use App\Repositories\Admin\PromoCodeRepository;
use App\Repositories\Admin\GroupProductRepository;
use App\Repositories\Admin\FeedbackRepository;
use App\Repositories\Admin\LogActivityRepository;
use App\Repositories\Admin\OrderRepository;
use App\Repositories\Admin\PostRepository;
use App\Repositories\Admin\SliderRepository;
use App\Repositories\Client\SliderRepository as SliderClientRepository;
use App\Repositories\Client\CategoryRepository as CategoryClientRepository;
use App\Repositories\Command\CardProviderRepository as CardProviderCommandRepository;
use App\Repositories\Client\BlogCategoryRepository;
use App\Repositories\Client\UserRepository;
use App\Repositories\Client\CardTransactionRepository as CardTransactionClientRepository;
use App\Repositories\Client\ProductRepository as ProductClientRepository;
use App\Repositories\Client\PromoCodeRepository as PromoCodeClientRepository;
use App\Repositories\Client\OrderRepository as OrderClientRepository;


class AdminFactory
{

    /**
     * Auth Repositories
     */
    public static function authRepository()
    {
        return app(AuthRepository::class);
    }

    /**
     * Home Repositories
     */
    public static function homeRepository()
    {
        return app(HomeRepository::class);
    }

    /**
     * User Repositories
     */
    public static function userReposiroty()
    {
        return app(UserReposiroty::class);
    }

    /**
     * Category Repositories
     */
    public static function categoryRepository()
    {
        return app(CategoryRepository::class);
    }

    /**
     * Product Repositories
     */
    public static function productRepository()
    {
        return app(ProductRepository::class);
    }
    /*
     * Refer Repositories
     */
    public static function referPartnerRepository()
    {
        return app(ReferPartnerRepository::class);
    }

    /**
     * Kol Repositories
     */
    public static function kolPartnerRepository()
    {
        return app(KolPartnerRepository::class);
    }

    /**
     * Hire Repositories
     */
    public static function hirePartnerRepository()
    {
        return app(HirePartnerRepository::class);
    }

    /**
     * Log Activity Repositories
     */
    public static function logActivityRepository()
    {
        return app(LogActivityRepository::class);
    }

    /**
     * Card_provider Repositories
     */
    public static function cardProviderRepository()
    {
        return app(CardProviderRepository::class);
    }

    /**
     * Card_transaction Repositories
     */
    public static function cardTransactionRepository()
    {
        return app(CardTransactionRepository::class);
    }

    /**
     * Card_exchanger Repositories
     */
    public static function cardExchangerRepository()
    {
        return app(CardExchangerRepository::class);
    }

    /**
     * Card_exchanger_rate Repositories
     */
    public static function cardExchangerRateRepository()
    {
        return app(CardExchangerRateRepository::class);
    }
    
    

    /**
     * Promo Code Repositories
     */
    public static function promoCodeRepository()
    {
        return app(PromoCodeRepository::class);
    }

    /**
     * Group Product Repositories
     */
    public static function groupProductRepository()
    {
        return app(GroupProductRepository::class);
    }

    /**
     * ConfigSystem Repository
     */
    public static function configSystemRepository()
    {
        return app(ConfigSystemRepository::class);
    }

    /**
     * ConfigSystem Repository
     */
    public static function libraryRepository()
    {
        return app(LibraryRepository::class);
    }

    /**
     * Order Repository
     */
    public static function orderRepository()
    {
        return app(OrderRepository::class);
    }

    /**
     * Feedback Repository
     */
    public static function feedbackRepository()
    {
        return app(FeedbackRepository::class);
    }

    /**
     * Feedback Repository
     */
    public static function postRepository()
    {
        return app(PostRepository::class);
    }

    /**
     * Slider Repository
     */
    public static function sliderRepository()
    {
        return app(SliderRepository::class);
    }

    /**
     * Slider Client Repository
     */
    public static function sliderClientRepository()
    {
        return app(SliderClientRepository::class);
    }

    /**
     * Category Client Repository
     */
    public static function categoryClientRepository()
    {
        return app(CategoryClientRepository::class);
    }

    /**
     * Card Provider Command Repository
     */
    public static function cardProviderCommandRepository()
    {
        return app(CardProviderCommandRepository::class);
    }

    /**
     * Blog Category Repository
     */
    public static function blogCategoryRepository()
    {
        return app(BlogCategoryRepository::class);
    }

    /**
     * user Repository
     */
    public static function userRepository()
    {
        return app(UserRepository::class);
    }

    /**
     * Card Transaction Client Repository
     */
    public static function cardTransactionClientRepository(){
        return app(CardTransactionClientRepository::class);
    }

    /**
     * Product Client Repository
     */
    public static function productClientRepository(){
        return app(ProductClientRepository::class);
    }

    /**
     * Promo Code Client Repository
     */
    public static function promoCodeClientRepository(){
        return app(PromoCodeClientRepository::class);
    }

    /**
     * Order CLient Repository
     */
    public static function orderClientRepository()
    {
        return app(OrderClientRepository::class);
    }
}
