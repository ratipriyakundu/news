<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ReelController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\LocationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[FrontController::class,'home'])->name('home');
//Route::get('/',[CategoryController::class,'home']);
Route::get('news-details',[FrontController::class,'news_details'])->name('news-details');

Route::get('news-categories',[FrontController::class,'news_categories'])->name('news-categories');

Route::get('/page-details',[FrontController::class,'pageDetails'])->name('page-details');

Route::get('/about-us',[FrontController::class,'about_us'])->name('about-us');
Route::get('/contact-us',[FrontController::class,'contact_us'])->name('contact-us');





//Admin
Route::get('AddCategory',[CategoryController::class,'AddCategory']);


Route::post('update-category',[AdminController::class,'update_category'])->name('update-category');
Route::get('EditCategory',[CategoryController::class,'EditCategory']);

Route::get('admin',[AdminController::class,'login'])->name('login');
Route::post('login-auth',[AdminController::class,'loginAuth'])->name('login-auth');
Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('logout',[AdminController::class,'logout'])->name('logout');

Route::get('category-list',[AdminController::class,'category_list'])->name('category-list');

Route::post('add-category',[AdminController::class,'category_add'])->name('add-category');
Route::post('delete-category',[AdminController::class,'delete_category'])->name('delete-category');

Route::get('delete-subcategory',[AdminController::class,'delete_subcategory'])->name('delete-subcategory');

Route::get('subcategory-list',[AdminController::class,'subcategory_list'])->name('subcategory-list');
Route::post('add-subcategory',[AdminController::class,'subcategory_add'])->name('add-subcategory');
Route::post('update-subcategory',[AdminController::class,'update_subcategory'])->name('update-subcategory');
Route::get('edit-subadmin',[AdminController::class,'edit_subadmin'])->name('edit-subadmin');
Route::get('subadmin-list',[AdminController::class,'subadmin_list'])->name('subadmin-list');

Route::post('add-subadmin',[AdminController::class,'add_subadmin'])->name('add-subadmin');
Route::post('update-subadmin',[AdminController::class,'update_subadmin'])->name('update-subadmin');
Route::post('delete-subadmin',[AdminController::class,'delete_subadmin'])->name('delete-subadmin');
Route::get('post-news',[AdminController::class,'post_news'])->name('post-news');
Route::get('news-list',[AdminController::class,'news_list'])->name('news-list');
Route::post('GetSubcategoryByCategory',[AdminController::class,'GetSubcategoryByCategory'])->name('GetSubcategoryByCategory');
Route::post('add-news',[AdminController::class,'add_news'])->name('add-news');
Route::get('edit-news',[AdminController::class,'edit_news'])->name('edit-news');
Route::post('update-news',[AdminController::class,'update_news'])->name('update-news');
Route::post('delete-news',[AdminController::class,'delete_news'])->name('delete-news');
Route::get('বাংলাদেশের-বুকে-ঘটে-চলেছে-এক-অদ্ভুত-ঘটনা',[FrontController::class,'test_news_details'])->name('বাংলাদেশের-বুকে-ঘটে-চলেছে-এক-অদ্ভুত-ঘটনা');

Route::post('ChangeLatestStatus',[AdminController::class,'ChangeLatestStatus'])->name('ChangeLatestStatus');
Route::post('ChangePopular',[AdminController::class,'ChangePopular'])->name('ChangePopular');
Route::get('menu-list',[AdminController::class,'menu_list'])->name('menu-list');
Route::get('menu-category',[AdminController::class,'menu_category'])->name('menu-category');
Route::post('delete-menucategory',[AdminController::class,'delete_menu_category'])->name('delete-menucategory');
Route::post('add-menucategory',[AdminController::class,'menu_category_add'])->name('add-menucategory');
Route::get('manage-pages',[AdminController::class,'manage_pages'])->name('manage-pages');
Route::get('edit-page',[AdminController::class,'edit_page'])->name('edit-page');
Route::get('delete-page',[AdminController::class,'delete_page'])->name('delete-page');

Route::get('manage-about-us',[AdminController::class,'manage_about_us'])->name('manage-about-us');
Route::post('add-about',[AdminController::class,'add_about'])->name('add-about');
Route::post('delete-about',[AdminController::class,'delete_about'])->name('delete-about');

Route::get('manage-contact-us',[AdminController::class,'manage_contact_us'])->name('manage-contact-us');
Route::post('update-contact',[AdminController::class,'update_contact'])->name('update-contact');

Route::post('add-page',[AdminController::class,'add_page'])->name('add-page');
Route::post('update-page',[AdminController::class,'update_page'])->name('update-page');
Route::get('social-links',[AdminController::class,'social_links'])->name('social-links');
Route::post('update-social',[AdminController::class,'update_social'])->name('update-social');
Route::get('manage-home',[AdminController::class,'manage_home'])->name('manage-home');
Route::get('home-template',[AdminController::class,'home_template'])->name('home-template');
Route::post('update-home-section',[AdminController::class,'update_home_section'])->name('update-home-section');
Route::get('manage-logo',[AdminController::class,'manage_logo'])->name('manage-logo');
Route::post('update-logo',[AdminController::class,'update_logo'])->name('update-logo');

Route::get('manage-ads',[AdminController::class,'manage_ads'])->name('manage-ads');
Route::post('add-ads',[AdminController::class,'add_ads'])->name('add-ads');
Route::post('update-ads',[AdminController::class,'update_ads'])->name('update-ads');
Route::get('/delete-ad',[AdminController::class,'deleteAd'])->name('delete-ad');
Route::get('manage-header-banner',[AdminController::class,'manage_header_banner'])->name('manage-header-banner');
Route::post('update-header-banner',[AdminController::class,'update_header_banner'])->name('update-header-banner');
Route::get('/home-page-builder',[AdminController::class,'homePageBuilder'])->name('home-page-builder');
Route::get('/forgot-password',[AdminController::class,'forgotPassword'])->name('forgot-password');
Route::post('/send-email-code',[AdminController::class,'sendEmailCode'])->name('send-email-code');
Route::get('/email-verification',[AdminController::class,'emailVerification'])->name('email-verification');
Route::post('/verify-email',[AdminController::class,'verifyEmail'])->name('verify-email');
Route::get('/reset-password',[AdminController::class,'resetPassword'])->name('reset-password');
Route::post('/save-new-password',[AdminController::class,'saveNewPassword'])->name('save-new-password');

//Template Routes
Route::get('/templates',[TemplateController::class,'templates'])->name('templates');
Route::post('/add-templaate',[TemplateController::class,'addTemplaate'])->name('add-templaate');
Route::post('/insert-template',[PageController::class,'insertTemplate'])->name('insert-template');
Route::post('/delete-template',[PageController::class,'deleteTemplate'])->name('delete-template');
Route::get('/move-up-template',[PageController::class,'moveUpTemplate'])->name('move-up-template');
Route::get('/move-down-template',[PageController::class,'moveDownTemplate'])->name('move-down-template');
Route::post('/edit-template',[AttributeController::class,'editTemplate'])->name('edit-template');

//Stories Route
Route::get('/stories',[StoryController::class,'stories'])->name('stories');
Route::get('/story',[StoryController::class,'story'])->name('story');
Route::get('/all-story',[StoryController::class,'allStory'])->name('all-story');
Route::get('/add-story',[StoryController::class,'addStory'])->name('add-story');
Route::post('/add-story-store',[StoryController::class,'addStoryStore'])->name('add-story-store');
Route::get('/edit-story',[StoryController::class,'editStory'])->name('edit-story');
Route::post('/edit-story-store',[StoryController::class,'editStoryStore'])->name('edit-story-store');
Route::get('/delete-story',[StoryController::class,'deleteStory'])->name('delete-story');
Route::post('/publish-story',[StoryController::class,'publishStory'])->name('publish-story');

//Slides Route
Route::get('/add-slide',[SlideController::class,'addSlide'])->name('add-slide');
Route::post('/add-slide-store',[SlideController::class,'addSlideStore'])->name('add-slide-store');
Route::post('/edit-store-slide',[SlideController::class,'editStoreSlide'])->name('edit-store-slide');
Route::post('/delete-slide',[SlideController::class,'deleteSlide'])->name('delete-slide');

//Reels Route
Route::get('/reels',[ReelController::class,'reels'])->name('reels');
Route::get('/all-reel',[ReelController::class,'allReel'])->name('all-reel');
Route::get('/add-reel',[ReelController::class,'addReel'])->name('add-reel');
Route::post('/add-reel-store',[ReelController::class,'addReelStore'])->name('add-reel-store');
Route::get('/delete-reel',[ReelController::class,'deleteReel'])->name('delete-reel');

//Style Route
Route::get('/styles',[StyleController::class,'styles'])->name('styles');
Route::post('/add-header-style',[StyleController::class,'addHeaderStyle'])->name('add-header-style');
Route::post('/add-nav-menu-style',[StyleController::class,'addNavMenuStyle'])->name('add-nav-menu-style');
Route::post('/add-footer-style',[StyleController::class,'addFooterStyle'])->name('add-footer-style');

//Location Route
Route::post('location',[LocationController::class,'location'])->name('location');