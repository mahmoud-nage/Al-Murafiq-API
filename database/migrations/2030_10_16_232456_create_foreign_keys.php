<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('countries', function(Blueprint $table) {
			$table->foreign('currency_id')->references('id')->on('currencies')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('countries')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('areas', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('zones', function(Blueprint $table) {
			$table->foreign('area_id')->references('id')->on('areas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ticket_replies', function(Blueprint $table) {
			$table->foreign('ticket_id')->references('id')->on('tickets')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ticket_replies', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('wishlists', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('wishlists', function(Blueprint $table) {
			$table->foreign('company_id')->references('id')->on('companies')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('area_id')->references('id')->on('areas')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('zone_id')->references('id')->on('zones')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('reviews', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('reviews', function(Blueprint $table) {
			$table->foreign('company_id')->references('id')->on('companies')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('comment_likes', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('comment_likes', function(Blueprint $table) {
			$table->foreign('review_id')->references('id')->on('reviews')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('notification_users', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('notification_users', function(Blueprint $table) {
			$table->foreign('notification_id')->references('id')->on('notifications')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('addresses', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('addresses', function(Blueprint $table) {
			$table->foreign('area_id')->references('id')->on('areas')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('contacts', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('affilate_companies', function(Blueprint $table) {
			$table->foreign('company_id')->references('id')->on('companies')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('affilate_companies', function(Blueprint $table) {
			$table->foreign('affilate_id')->references('id')->on('affilates')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('company_subsriptions', function(Blueprint $table) {
			$table->foreign('company_id')->references('id')->on('companies')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('company_subsriptions', function(Blueprint $table) {
			$table->foreign('subscription_id')->references('id')->on('subscriptions')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('company_subsriptions', function(Blueprint $table) {
			$table->foreign('payment_id')->references('id')->on('payments')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('compay_categories', function(Blueprint $table) {
			$table->foreign('company_id')->references('id')->on('companies')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('compay_categories', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ads', function(Blueprint $table) {
			$table->foreign('company_id')->references('id')->on('companies')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ads', function(Blueprint $table) {
			$table->foreign('subscription_id')->references('id')->on('subscriptions')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('payments', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('payments', function(Blueprint $table) {
			$table->foreign('payment_method_id')->references('id')->on('payment_methods')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('countries', function(Blueprint $table) {
			$table->dropForeign('countries_currency_id_foreign');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->dropForeign('cities_country_id_foreign');
		});
		Schema::table('areas', function(Blueprint $table) {
			$table->dropForeign('areas_city_id_foreign');
		});
		Schema::table('zones', function(Blueprint $table) {
			$table->dropForeign('zones_area_id_foreign');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->dropForeign('tickets_user_id_foreign');
		});
		Schema::table('ticket_replies', function(Blueprint $table) {
			$table->dropForeign('ticket_replies_ticket_id_foreign');
		});
		Schema::table('ticket_replies', function(Blueprint $table) {
			$table->dropForeign('ticket_replies_user_id_foreign');
		});
		Schema::table('wishlists', function(Blueprint $table) {
			$table->dropForeign('wishlists_user_id_foreign');
		});
		Schema::table('wishlists', function(Blueprint $table) {
			$table->dropForeign('wishlists_company_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_city_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_area_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_zone_id_foreign');
		});
		Schema::table('reviews', function(Blueprint $table) {
			$table->dropForeign('reviews_user_id_foreign');
		});
		Schema::table('reviews', function(Blueprint $table) {
			$table->dropForeign('reviews_company_id_foreign');
		});
		Schema::table('comment_likes', function(Blueprint $table) {
			$table->dropForeign('comment_likes_user_id_foreign');
		});
		Schema::table('comment_likes', function(Blueprint $table) {
			$table->dropForeign('comment_likes_review_id_foreign');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->dropForeign('notifications_user_id_foreign');
		});
		Schema::table('notification_users', function(Blueprint $table) {
			$table->dropForeign('notification_users_user_id_foreign');
		});
		Schema::table('notification_users', function(Blueprint $table) {
			$table->dropForeign('notification_users_notification_id_foreign');
		});
		Schema::table('addresses', function(Blueprint $table) {
			$table->dropForeign('addresses_user_id_foreign');
		});
		Schema::table('addresses', function(Blueprint $table) {
			$table->dropForeign('addresses_area_id_foreign');
		});
		Schema::table('contacts', function(Blueprint $table) {
			$table->dropForeign('contacts_user_id_foreign');
		});
		Schema::table('affilate_companies', function(Blueprint $table) {
			$table->dropForeign('affilate_companies_company_id_foreign');
		});
		Schema::table('affilate_companies', function(Blueprint $table) {
			$table->dropForeign('affilate_companies_affilate_id_foreign');
		});
		Schema::table('company_subsriptions', function(Blueprint $table) {
			$table->dropForeign('company_subsriptions_company_id_foreign');
		});
		Schema::table('company_subsriptions', function(Blueprint $table) {
			$table->dropForeign('company_subsriptions_subscription_id_foreign');
		});
		Schema::table('company_subsriptions', function(Blueprint $table) {
			$table->dropForeign('company_subsriptions_payment_id_foreign');
		});
		Schema::table('compay_categories', function(Blueprint $table) {
			$table->dropForeign('compay_categories_company_id_foreign');
		});
		Schema::table('compay_categories', function(Blueprint $table) {
			$table->dropForeign('compay_categories_category_id_foreign');
		});
		Schema::table('ads', function(Blueprint $table) {
			$table->dropForeign('ads_company_id_foreign');
		});
		Schema::table('ads', function(Blueprint $table) {
			$table->dropForeign('ads_subscription_id_foreign');
		});
		Schema::table('payments', function(Blueprint $table) {
			$table->dropForeign('payments_user_id_foreign');
		});
		Schema::table('payments', function(Blueprint $table) {
			$table->dropForeign('payments_payment_method_id_foreign');
		});
	}
}
