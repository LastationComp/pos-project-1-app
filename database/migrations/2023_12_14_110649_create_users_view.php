<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
      CREATE VIEW test AS
      (
        select `a`.`id` AS `id`,`a`.`name` AS `name`,`a`.`username` AS `username`,`a`.`password` AS `password`,NULL AS `avatar`,1 AS `is_active`,NULL AS `license_key`,'super_admin' AS `roles` from `db_pos`.`super_admins` `a` union select `b`.`id` AS `id`,`b`.`name` AS `name`,`b`.`username` AS `username`,`b`.`pin` AS `password`,NULL AS `avatar`,`d`.`is_active` AS `is_active`,`d`.`license_key` AS `license_key`,'admin' AS `roles` from (`db_pos`.`admins` `b` join `db_pos`.`clients` `d` on(`d`.`id` = `b`.`client_id`)) union select `c`.`id` AS `id`,`c`.`name` AS `name`,`c`.`employee_code` AS `username`,`c`.`pin` AS `password`,`c`.`avatar_url` AS `avatar`,`c`.`is_active` AS `is_active`,`f`.`license_key` AS `license_key`,'employee' AS `roles` from ((`db_pos`.`employees` `c` join `db_pos`.`admins` `e` on(`e`.`id` = `c`.`admin_id`)) join `db_pos`.`clients` `f` on(`f`.`id` = `e`.`client_id`))
      )
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS test');
    }
};
