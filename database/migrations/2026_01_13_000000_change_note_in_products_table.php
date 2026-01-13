<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ChangeNoteInProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * This changes the `note` column on `products` from VARCHAR(255)
     * to TEXT with utf8mb4_unicode_ci collation so it can hold 5000+ characters.
     * We use a direct ALTER TABLE statement to avoid requiring doctrine/dbal.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `products` MODIFY `note` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE `products` MODIFY `note` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL");
    }
}
