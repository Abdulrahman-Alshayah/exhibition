<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('user_type')->default(3); // حقل نوع المستخدم
            $table->string('company')->nullable(); // معلومات الشركة
            $table->string('commercial_registration')->nullable(); // رقم السجل التجاري
            $table->string('company_email')->nullable(); // ايميل الشركة
            $table->date('birthdate')->nullable(); // تاريخ الميلاد
            $table->string('gender')->nullable(); // الجنس
            $table->string('city')->nullable(); // المدينة
            $table->string('mobile_number')->nullable(); // رقم الموبايل
            $table->string('landline_number')->nullable(); // رقم الأرضي
            $table->string('website')->nullable(); // عنوان الموقع الإلكتروني
            $table->string('facebook_page')->nullable(); // صفحة الفيسبوك
            $table->string('whatsapp_number')->nullable(); // رقم الواتساب
            $table->string('contact_person')->nullable(); // معلومات شخص للاتصال
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
