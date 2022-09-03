<?php

use Analyzen\Auth\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->getTable(), function (Blueprint $table) {
            $table->string('phone', 30)->nullable()->after('email_verified_at');
            $table->tinyInteger('status')->default(1)->nullable()->comment('0=inactive, 1=active')->after('email_verified_at');
            $table->text('cv_link')->nullable()->after('email_verified_at');
            $table->text('role')->nullable()->after('email_verified_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->getTable(), function (Blueprint $table) {
            $table->dropColumn(
                [
                    'phone',
                    'status',
                    'cv_link',
                    'role'
                ]
            );
        });
    }

    /**
     * Get the table name to add and drop fields
     *
     * @return string
     */
    private function getTable(): string
    {
        $userModel = new User();

        return $userModel->getTable();
    }
};
